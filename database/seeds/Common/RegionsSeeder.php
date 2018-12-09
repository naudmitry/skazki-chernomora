<?php

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * @throws Exception
     * @throws Throwable
     */
    public function run()
    {
        $countries = Country::all()->keyBy('iso2');
        $regionByCountryAndName = Region::all()->keyBy(function (Region $region) {
            return $region->country_id . '-' . $region->name;
        });

        $path = base_path('database/seeds/Common/csv/regions.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file, $countries, &$regionByCountryAndName) {
            while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
                /** @var Country $country */
                $country = array_get($countries, $data[0], null);
                if (!isset($country)) continue;

                $keyForRegion = $country->id . '-' . $data[2];
                $region = array_get($regionByCountryAndName, $keyForRegion, null);
                if (isset($region)) continue;

                $newRegion = Region::create([
                    'country_id' => $country->id,
                    'code' => $data[1],
                    'name' => $data[2],
                ]);

                $regionByCountryAndName[$keyForRegion] = $newRegion;
            }
        });

        fclose($file);
    }
}
