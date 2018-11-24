<?php

use App\Models\Admin;
use App\Models\Company;
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

        /** @var Company[] $companies */
        $companies = Company::query()->get();

        foreach ($companies as $company) {
            $companyAdminRole = $company->roles()->where('enable', true)->first();

            factory(Admin::class, 10)
                ->create(
                    [
                        'company_id' => $company->id,
                        'role_id' => $companyAdminRole->id,
                    ])
                ->each(
                    function (Admin $admin) use ($faker, $company) {
                        $admin->created_at = $faker->dateTimeBetween($company->created_at);
                        $admin->registered_at = $faker->dateTimeBetween($company->created_at);
                        $admin->registered_from = $faker->ipv4;
                        $admin->save();

                        foreach ($admin->company->showcases as $showcase) {
                            $admin->showcases()->attach($showcase->id);
                        }
                    });
        }
    }
}
