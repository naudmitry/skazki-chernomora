<?php

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            Role::create([
                'super' => $company->super ? 1 : 0,
                'company_id' => $company->id,
                'title' => $company->super ? 'Super-administrator' : 'Administrator',
                'enable' => true,
            ]);
        }
    }
}
