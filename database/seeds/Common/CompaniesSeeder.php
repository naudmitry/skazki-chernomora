<?php

use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
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
            ]);

        /** @var Role $superAdminRole */
        $superAdminRole = $superCompany->roles()->where('enable', true)->firstOrFail();

        $superAdmin = Admin::create(
            [
                'company_id' => $superCompany->id,
                'super' => true,
                'role_id' => $superAdminRole->id,
                'name' => 'Olga',
                'surname' => 'Egorova',
                'position' => $superAdminRole->title,
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

        $company = Company::create(
            [
                'title' => 'Skazki Chernomora',
                'enable' => true,
                'created_at' => $faker->dateTimeBetween('-10 month', '-9 month'),
            ]);

        /** @var Role $companyAdminRole */
        $companyAdminRole = $company->roles()->where('enable', true)->first();

        foreach (
            [
                [
                    'company_id' => $company->id,
                    'role_id' => $companyAdminRole->id,
                    'name' => 'Dmitry',
                    'surname' => 'Naumov',
                    'position' => $companyAdminRole->title,
                    'email' => 'd.naumov@mail.com',
                    'password' => bcrypt('123456'),
                    'remember_token' => str_random(10),
                ],
                [
                    'company_id' => $company->id,
                    'role_id' => $companyAdminRole->id,
                    'name' => 'Ludmila',
                    'surname' => 'Rakovich',
                    'position' => $companyAdminRole->title,
                    'email' => 'l.rakovich@mail.com',
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
