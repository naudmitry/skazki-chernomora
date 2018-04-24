<?php

namespace App\Http\Middleware\Site;

use App\Classes\GeoIpConditionsEnum;
use App\Models\Showcase;
use Closure;

class RedirectIfMatchesGeoIpSettings
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $geoIpData = $request->ip();
        $isGeo = $request->input('geo', 'true');

        if ($isGeo == 'true' && $geoIpData) {
            $countryFromIp = array_get($geoIpData, 'country_name', null);
            $regionFromIp = array_get($geoIpData, 'region', null);
            $cityFromIp = array_get($geoIpData, 'city', null);

            /** @var Showcase $showcase */
            $showcase = config('front.showcase');

            if ($showcase->config('general:is-use-geo-ip')) {
                $geoIpSettings = $showcase->config('general:geo-ip');

                if (!empty($geoIpSettings)) {
                    foreach ($geoIpSettings['items'] as $geoIpItem) {
                        $condition = array_get($geoIpItem, 'condition', null);
                        $country = array_get($geoIpItem, 'country', null);
                        $region = array_get($geoIpItem, 'region', null);
                        $city = array_get($geoIpItem, 'city', null);
                        $redirect = array_get($geoIpItem, 'redirect', null);

                        $isAllCountries = empty($country);
                        $isAllRegions = empty($region);
                        $isAllCities = empty($city);

                        if ($isAllCountries) {
                            if ($condition == GeoIpConditionsEnum::INCLUDE) {
                                return redirect($redirect)->with('geo', false);
                            }
                        } else {
                            if (($country == $countryFromIp && $isAllRegions)
                                || ($country == $countryFromIp && $region == $regionFromIp && $isAllCities)
                                || ($country == $countryFromIp && $region == $regionFromIp && $city == $cityFromIp)
                            ) {
                                if ($condition == GeoIpConditionsEnum::INCLUDE) {
                                    return redirect($redirect)->with('geo', false);
                                }
                            } else {
                                if ($condition == GeoIpConditionsEnum::EXCLUDE) {
                                    return redirect($redirect)->with('geo', false);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $next($request);
    }
}
