<?php

use App\Models\AdSource;
use App\Models\Company;
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
            $superCompany = Company::query()->where('super', true)->first();
            $superAdmin = $superCompany->admins()->where('super', true)->first();

            while (($data = fgetcsv($file, 200, ",")) !== false) {
                $source = new AdSource();
                $source->title = $data[0];
                $source->is_enabled = true;
                $source->author_id = $superAdmin->id;
                $source->save();
            }
        });

        fclose($file);
    }
}
