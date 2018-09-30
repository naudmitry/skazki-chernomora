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

        $superAdmin = Admin::create(
            [
                'company_id' => $superCompany->id,
                'super' => true,
                'name' => 'Olga',
                'surname' => 'Egorova',
                'email' => 'boss@mail.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
            ]);

        $superCompany->admin()->associate($superAdmin);
        $superCompany->save();
    }

    protected function seedCompany1()
    {
        $faker = Faker\Factory::create();

        /** @var Company $company */
        $company = Company::create(
            [
                'title' => 'Skazki Chernomora',
                'enable' => true,
                'created_at' => $faker->dateTimeBetween('-10 month', '-9 month'),
                'slug' => 'admin1.skazki-chernomora.test'
            ]);

        foreach ([
                     [
                         'company_id' => $company->id,
                         'name' => 'Dmitry',
                         'surname' => 'Naumov',
                         'email' => 'dmitrynaumov@mail.ru',
                         'password' => bcrypt('123456'),
                         'remember_token' => str_random(10),
                     ],
                     [
                         'company_id' => $company->id,
                         'name' => 'Luda',
                         'surname' => 'Boss',
                         'email' => 'luda@mail.ru',
                         'password' => bcrypt('123456'),
                         'remember_token' => str_random(10),
                     ],
                 ] as $adminData) {
            $admin = Admin::create($adminData);

            if (empty($company->admin)) {
                $company->admin()->associate($admin);
                $company->save();
            }
        }
    }
}
