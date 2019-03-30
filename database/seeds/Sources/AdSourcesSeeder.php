<?php

use App\Models\AdSource;
use Illuminate\Database\Seeder;

class AdSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        AdSource::truncate();
        $path = base_path('database/seeds/Sources/csv/sources.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file) {
            while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
                $source = new AdSource();
                $source->title = $data[0];
                $source->is_enabled = true;
                $source->save();
            }
        });

        fclose($file);
    }
}
