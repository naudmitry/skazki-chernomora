<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Admin::create([
                'name' => $faker->word,
                'firstname' => $faker->word,
                'surname' => $faker->word,
                'position' => $faker->word,
                'email' => $faker->email,
            ]);
        }
    }
}
