<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * @throws Throwable
     */
    public function run()
    {
        $path = base_path('database/seeds/Common/csv/countries.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file) {
            while (($data = fgetcsv($file, 200, ";")) !== false) {
                Country::create([
                    'name' => $data[0],
                    'iso2' => $data[1],
                    'iso3' => $data[2],
                ]);
            }
        });

        fclose($file);
    }
}
