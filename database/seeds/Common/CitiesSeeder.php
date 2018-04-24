<?php

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * @throws Exception
     * @throws Throwable
     */
    public function run()
    {
        $regionsByCountry = Region::all()->keyBy(function (Region $region) {
            return $region->country->iso2 . '-' . $region->code;
        })->toArray();

        $citiesByCountryAndRegionAndName = City::all()->keyBy(function (City $city) {
            return $city->country_id . '-' . $city->region_id . '-' . $city->name;
        })->toArray();

        $path = base_path('database/seeds/Common/csv/cities.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file, $regionsByCountry, $citiesByCountryAndRegionAndName) {
            while (($data = fgetcsv($file, 200, ",")) !== false) {
                $region = array_get($regionsByCountry, $data[1] . '-' . $data[2], null);
                if (!isset($region)) {
                    continue;
                }

                if (!empty($data[3])) {
                    $keyForCity = $region['country_id'] . '-' . $region['id'] . '-' . $data[3];

                    $city = array_get($citiesByCountryAndRegionAndName, $keyForCity, null);
                    if (isset($city)) {
                        continue;
                    }

                    $newCity = City::create([
                        'country_id' => $region['country_id'],
                        'region_id' => $region['id'],
                        'name' => mb_convert_encoding($data[3], "UTF-8"),
                    ]);

                    $citiesByCountryAndRegionAndName[$keyForCity] = $newCity->toArray();
                }
            }
        });

        fclose($file);
    }
}
