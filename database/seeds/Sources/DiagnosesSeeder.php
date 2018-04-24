<?php

use App\Models\Company;
use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class DiagnosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        Diagnosis::truncate();

        $path = base_path('database/seeds/Sources/csv/diagnoses.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file) {
            $superCompany = Company::query()->where('super', true)->first();
            $superAdmin = $superCompany->admins()->where('super', true)->first();

            while (($data = fgetcsv($file, 200, ",")) !== false) {
                $diagnosis = new Diagnosis();
                $diagnosis->title = $data[0];
                $diagnosis->is_enabled = true;
                $diagnosis->author_id = $superAdmin->id;
                $diagnosis->save();
            }
        });

        fclose($file);
    }
}
