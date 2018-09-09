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
                'surname' => $faker->lastName,
                'name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'position' => 'admin',
                'email' => $faker->email,
                'password' => \Hash::make('123456'),
                'phone' => $faker->phoneNumber,
                'ip' => $faker->ipv4,
                'last_ip' => $faker->ipv4,
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            \App\User::create([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => \Hash::make('123456'),
            ]);
        }
    }
}
