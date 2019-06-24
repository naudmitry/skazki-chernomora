<?php

namespace App\Http\Controllers\Admin;

use App\Models\Showcase;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;

class SettingsSeoIntegrationsController extends Controller
{
    /**
     * @param SettingsRepository $settingsRepository
     * @param Showcase $administeredShowcase
     * @param null $tab
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SettingsRepository $settingsRepository, Showcase $administeredShowcase, $tab = null)
    {
        $settingsRepository->setObject($administeredShowcase);

        return view('main_admin.seo_integrations.index', compact(
            'tab', 'administeredShowcase'
        ));
    }

    /**
     * @param Request $request
     * @param SettingsRepository $settingsRepository
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function save(Request $request, SettingsRepository $settingsRepository, Showcase $administeredShowcase)
    {
        $this->validate($request,
            [
                'seo-integration:robots-text' => 'required|string',
            ]);

        $settingsRepository->setObject($administeredShowcase);

        $data = array_filter(
            $request->all(),
            function ($key) {
                return starts_with($key, 'seo-integration:');
            },
            ARRAY_FILTER_USE_KEY);

        $settingsRepository->saveMany($data);

        return response([
            'message' => 'Данные успешно сохранены',
            'data' => $data,
        ]);
    }
}