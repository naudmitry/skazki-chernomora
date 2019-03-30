<?php

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
            while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
                $diagnosis = new Diagnosis();
                $diagnosis->title = $data[0];
                $diagnosis->is_enabled = true;
                $diagnosis->save();
            }
        });

        fclose($file);
    }
}
