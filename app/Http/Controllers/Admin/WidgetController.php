<?php

namespace App\Http\Controllers\Admin;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Showcase;
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

    /**
     * @param Showcase $administeredShowcase
     * @return Response
     */
    public function header(Showcase $administeredShowcase)
    {
        $widgetContainer = $this->widgetRepository->getContainerByType($administeredShowcase, WidgetsContainerTypesEnum::HEADER);
        $allContainerWidgets = $this->widgetRepository->getWidgetsForContainer($widgetContainer);
        $activeWidgets = $this->widgetRepository->getContainerItemsMap($widgetContainer);

        return view('main_admin.header.index', compact('widgetContainer', 'allContainerWidgets', 'activeWidgets'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function addWidget(Request $request)
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
                'success' => 'success',
                'html' => view('main_admin.widget.add_widget', compact('widget'))->render(),
                'type' => $widget->location,
                'availableWidgets' => $availableWidgets,
            ]);
    }
}
