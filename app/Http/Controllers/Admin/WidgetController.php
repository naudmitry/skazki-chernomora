<?php

namespace App\Http\Controllers\Admin;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Showcase;
use App\Repositories\Slug\SlugRepository;
use App\Repositories\Widgets\WidgetRepository;
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
        $widgetContainer = $this->widgetRepository->getContainerByType($administeredShowcase,WidgetsContainerTypesEnum::HEADER);
        $allContainerWidgets = $this->widgetRepository->getWidgetsForContainer($widgetContainer);
        $activeWidgets = $this->widgetRepository->getContainerItemsMap($widgetContainer);

        return view('main_admin.header.index', compact('widgetContainer', 'allContainerWidgets', 'activeWidgets'));
    }
}
