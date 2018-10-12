<?php

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedSuperCompany();
        $this->seedCompany1();
    }

    protected function seedSuperCompany()
    {
        $faker = Faker\Factory::create();

        /** @var Company $superCompany */
        $superCompany = Company::create(
            [
                'super' => true,
                'title' => 'Super company',
                'enable' => true,
                'created_at' => $faker->dateTimeBetween('-12 month', '-11 month'),
                'slug' => 'admin.skazki-chernomora.test'
            ]);

        $superCompany->save();
    }

    protected function seedCompany1()
    {
        $faker = Faker\Factory::create();

        Company::create(
            [
                'title' => 'Skazki Chernomora',
                'enable' => true,
                'created_at' => $faker->dateTimeBetween('-10 month', '-9 month'),
                'slug' => 'admin1.skazki-chernomora.test'
            ]);
    }
}
