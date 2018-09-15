<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsStaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Admin::create([
            'surname' => 'boss',
            'name' => 'boss',
            'middle_name' => 'boss',
            'position' => 'admin',
            'email' => 'boss@mail.com',
            'password' => \Hash::make('123456'),
            'phone' => $faker->phoneNumber,
            'ip' => $faker->ipv4,
            'last_ip' => $faker->ipv4,
        ]);
    }
}
