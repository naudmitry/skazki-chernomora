<?php

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        Complaint::truncate();
        $path = base_path('database/seeds/Sources/csv/complaints.csv');
        $file = fopen($path, "r");

        \DB::transaction(function () use ($file) {
            while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
                $complaint = new Complaint();
                $complaint->title = $data[0];
                $complaint->is_enabled = true;
                $complaint->save();
            }
        });

        fclose($file);
    }
}
