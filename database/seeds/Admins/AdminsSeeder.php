<?php

use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
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
        /** @var Company $superCompany */
        $superCompany = Company::query()
            ->where('super', true)
            ->firstOrFail();

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

        $faker = Faker\Factory::create();

        /** @var Company $companies */
        $companies = Company::query()
            ->where('super', false)
            ->get();

        /** @var Company $company */
        foreach ($companies as $company) {
            /** @var Role $companyAdminRole */
            $companyAdminRole = $company->roles()->where('enable', true)->first();

            for ($i = 0; $i < 10; $i++) {
                /** @var Admin $admin */
                $admin = Admin::create([
                    'surname' => $faker->lastName,
                    'name' => $faker->firstName,
                    'middle_name' => $faker->lastName,
                    'position' => 'admin',
                    'email' => $faker->email,
                    'password' => bcrypt('123456'),
                    'phone' => $faker->phoneNumber,
                    'ip' => $faker->ipv4,
                    'last_ip' => $faker->ipv4,
                    'company_id' => $company->id,
                    'role_id' => $companyAdminRole->id,
                ]);

                $company->admin()->associate($admin);
                $company->save();

                foreach ($admin->company->showcases as $showcase)
                {
                    $admin->showcases()->attach($showcase->id);
                }
            }
        }
    }
}
