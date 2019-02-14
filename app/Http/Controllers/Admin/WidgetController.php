<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticPageTypesEnum;
use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Showcase;
use App\Models\ShowcaseWidget;
use App\Models\ShowcaseWidgetDescription;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use App\Repositories\Widgets\WidgetRepository;
use App\WidgetContainer;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    protected $widgetRepository;
    protected $slugRepository;

    /**
     * WidgetController constructor.
     * @param WidgetRepository $widgetRepository
     * @param SlugRepository $slugRepository
     */
    public function __construct(WidgetRepository $widgetRepository, SlugRepository $slugRepository)
    {
        $this->widgetRepository = $widgetRepository;
        $this->slugRepository = $slugRepository;

        parent::__construct();
    }

    /**
     * @param PageRepository $pageRepository
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * @throws \Throwable
     */
    public function main(PageRepository $pageRepository, Showcase $administeredShowcase)
    {
        $staticPage = $pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::MAIN_PAGE
        );

        $widgetContainer = $this->widgetRepository->getOrCreateWidgetContainer(
            $staticPage,
            WidgetsContainerTypesEnum::MAIN_PAGE,
            $administeredShowcase
        );

        $allContainerWidgets = $this->widgetRepository->getWidgetsForContainer($widgetContainer);
        $activeWidgets = $this->widgetRepository->getContainerItemsMap($widgetContainer);

        return view('main_admin.main.index', compact(
            'staticPage', 'allContainerWidgets', 'activeWidgets', 'widgetContainer'
        ));
    }

    /**
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function header(Showcase $administeredShowcase)
    {
        $widgetContainer = $this->widgetRepository->getContainerByType($administeredShowcase, WidgetsContainerTypesEnum::HEADER);
        $allContainerWidgets = $this->widgetRepository->getWidgetsForContainer($widgetContainer);
        $activeWidgets = $this->widgetRepository->getContainerItemsMap($widgetContainer);

        return view('main_admin.header.index', compact(
            'widgetContainer',
            'allContainerWidgets',
            'activeWidgets'
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function create(Request $request)
    {
        $container = WidgetContainer::find($request->get('container'));

        try {
            $widget = $this->widgetRepository->addWidgetToContainer($container, $request->get('class_name'));
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        $widget->location = 'middle';

        $availableWidgets = collect($this->widgetRepository->getWidgetsForContainer($container))
            ->map(function ($item, $key) {
                return ['id' => $item['class_name'], 'text' => $item['class_name']];
            })
            ->values();

        return response()
            ->json([
                'success' => 'Виджет успешно добавлен.',
                'html' => view('main_admin.widget.item', compact('widget'))->render(),
                'type' => $widget->location,
                'availableWidgets' => $availableWidgets,
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sequence(Request $request)
    {
        $positionArray = $request->position;

        foreach ($positionArray as $index => $id) {
            $this->widgetRepository->setWidgetIdParameter($id, 'position', $index);
        }

        return response()->json([
            'success' => 'Позиция виджетов сохранена.'
        ]);
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(ShowcaseWidget $showcaseWidget)
    {
        $container = $showcaseWidget->container;

        $showcaseWidget->delete();

        $availableWidgets = collect($this->widgetRepository->getWidgetsForContainer($container))
            ->map(function ($item, $key) {
                return [
                    'id' => $item['class_name'],
                    'text' => $item['class_name']
                ];
            })
            ->values();

        return response()->json([
            'message' => 'Виджет успешно удален.',
            'availableWidgets' => $availableWidgets,
            'showcaseWidget' => $showcaseWidget
        ]);
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(ShowcaseWidget $showcaseWidget)
    {
        $showcaseWidget->action = !$showcaseWidget->action;
        $showcaseWidget->update();

        return response()->json([
            'message' => 'Доступность виджета изменена.',
        ]);
    }

    /**
     * @param ShowcaseWidget $widget
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function settings(ShowcaseWidget $widget)
    {
        $widget_container = $widget->container;

        $showcase = $widget_container->showcase;

        $viewWidgetObj = $this->widgetRepository->getViewWidgetObj($widget);
        $widget_setting = $this->widgetRepository->getWidgetSetting($widget->id);

        $viewData = compact('widget', 'widget_setting', 'widget_container', 'showcase');

        return response()->json([
            'view' => view($viewWidgetObj->getSettingsTmpl(), $viewData)->render()
        ]);
    }

    /**
     * @param Request $request
     * @param ShowcaseWidget $widget
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function save(Request $request, ShowcaseWidget $widget)
    {
        $setting = json_decode($request->setting, true);

        $viewWidgetObj = $this->widgetRepository->getViewWidgetObj($widget);
        $validator = $viewWidgetObj->getSettingsValidator($setting);

        if (!is_null($validator) && $validator->fails()) {
            return response([
                'message' => 'Ошибка валидации.'
            ], 400);
        }

        /** @var ShowcaseWidgetDescription $widgetSetting */
        $widgetSetting = $widget->showcaseWidgetSettings()->first();
        $widgetSetting->setting = $setting;
        $widgetSetting->save();

        $widget_setting = $this->widgetRepository->mutateSettings($widget, $widgetSetting);
        $widget_container = $widget->container;
        $showcase = $widget_container->showcase;

        $viewData = compact('widget', 'widget_setting', 'widget_container', 'showcase');

        return response()->json([
            'message' => 'Данные успешно сохранены.',
            'view' => view($viewWidgetObj->getSettingsTmpl(), $viewData)->render(),
        ]);
    }

    /**
     * @param Request $request
     * @param ShowcaseWidget $widget
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function addBlock(Request $request, ShowcaseWidget $widget)
    {
        $position = $request->position + 1;

        if ($blockTmpl = $this->widgetRepository->getWidgetBlockTmpl($widget)) {
            $widget_container = $widget->container;
            $showcase = $widget_container->showcase;

            return response()->json([
                'success' => view($blockTmpl, compact('position', 'widget_id', 'widget_container', 'showcase'))->render()
            ]);
        } else {
            abort(404);
        }
    }
}
