<?php

namespace App\Http\Controllers\Admin;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Showcase;
use App\Models\ShowcaseWidget;
use App\Repositories\Slug\SlugRepository;
use App\Repositories\Widgets\WidgetRepository;
use App\WidgetContainer;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    protected $widgetRepository;
    protected $slugRepository;

    public function __construct(WidgetRepository $widgetRepository, SlugRepository $slugRepository)
    {
        $this->widgetRepository = $widgetRepository;
        $this->slugRepository = $slugRepository;

        parent::__construct();
    }

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
    public function store(Request $request)
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
                    'text' => trans('admin/widgets.' . $item['class_name'] . '.title')
                ];
            })
            ->values();

        return response()->json([
            'success' => 'Виджет успешно удален.',
            'availableWidgets' => $availableWidgets,
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
}
