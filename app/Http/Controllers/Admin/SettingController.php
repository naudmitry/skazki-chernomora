<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Region;
use App\Models\Showcase;
use App\Repositories\SettingsRepository;
use App\Repositories\ShowcaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Showcase $administeredShowcase
     * @param null $tab
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Showcase $administeredShowcase, $tab = 'general')
    {
        return view('main_admin.settings.index', compact(
            'administeredShowcase'
        ));
    }

    /**
     * @param Request $request
     * @param ShowcaseRepository $showcaseRepository
     * @param SettingsRepository $settingsRepository
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param $tab
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function update(Request $request, ShowcaseRepository $showcaseRepository, SettingsRepository $settingsRepository, Company $administeredCompany, Showcase $administeredShowcase, $tab)
    {
        if (!$administeredShowcase->company->is($administeredCompany)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        if (!config('admin.administerableShowcases')->where('id', $administeredShowcase->id)->count()) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $showcaseRepository->setShowcase($administeredShowcase);
        $settingsRepository->setObject($administeredShowcase);

        $validateRules =
            [
                'general' => [
                    'general:display-site-name' => 'required|string'
                ],
                'geo-ip' => [
                    'general:is-use-geo-ip' => '',
                ],
            ];

        $this->validate($request, array_get($validateRules, $tab));

        $data = $request->all();

        $prefix = 'general:';

        $generalSettingsData = array_filter($data, function ($key) use ($prefix) {
            return starts_with($key, $prefix);
        }, ARRAY_FILTER_USE_KEY);

        switch ($tab) {
            case 'geo-ip':
                $generalSettingsData['general:is-use-geo-ip'] = array_has($data, 'general:is-use-geo-ip') && array_get($data, 'general:is-use-geo-ip');
                $conditions = array_get($data, 'condition', []);

                $setting = [
                    'items' => [],
                ];

                if (isset($conditions)) {
                    $countries = array_get($data, 'country', []);
                    $regions = array_get($data, 'region', []);
                    $cities = array_get($data, 'city', []);
                    $redirects = array_get($data, 'redirect', []);

                    foreach ($conditions as $key => $condition) {
                        $setting['items'][] = [
                            'condition' => $condition,
                            'region' => $regions[$key],
                            'country' => $countries[$key],
                            'city' => $cities[$key],
                            'redirect' => $redirects[$key],
                        ];
                    }
                }

                $generalSettingsData['general:geo-ip'] = $setting;

                break;
        }

        $settingsRepository->saveMany($generalSettingsData);

        return response([
            'message' => 'Настройки успешно сохранены.',
            'data' => $generalSettingsData,
            'showcase' => $administeredShowcase,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createGeoIpRule(Request $request)
    {
        $position = $request->position + 1;

        return view('main_admin.settings.geo-ip.item', compact(
            'position'
        ));
    }

    /**
     * @param $countryName
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getListRegionsByCountry($countryName)
    {
        $country = Country::query()
            ->where('name', $countryName)
            ->first();

        if (isset($country)) {
            $regions = Region::query()
                ->where('country_id', $country->id)
                ->get();
        }

        return $regions ?? collect();
    }

    /**
     * @param $countryName
     * @param $regionCode
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getListCitiesByCountryAndRegion($countryName = null, $regionCode = null)
    {
        $country = Country::query()
            ->where('name', $countryName)
            ->first();

        if (isset($country)) {
            $region = Region::query()
                ->where('country_id', $country->id)
                ->where('code', $regionCode)
                ->first();

            if (isset($region)) {
                $cities = City::query()
                    ->where('region_id', $region->id)
                    ->get();
            }
        }

        return $cities ?? collect();
    }

    /**
     * @param Country|null $country
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function regionsByCountry(Country $country = null)
    {
        $regions = $country->regions ?? collect();
        $cities = collect();

        return response()->json([
            'region' => view('main_admin.settings.geo-ip.select.region', compact(
                'regions'
            ))->render(),
            'city' => view('main_admin.settings.geo-ip.select.city', compact(
                'cities'
            ))->render()
        ]);
    }

    /**
     * @param Region|null $region
     * @return string
     * @throws \Throwable
     */
    public function citiesByRegion(Region $region = null)
    {
        $cities = $region->cities ?? collect();

        return view('main_admin.settings.geo-ip.select.city', compact(
            'cities'
        ))->render();
    }
}
