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
                'company_id' => $company->id,
                'title' => 'admin',
                'enable' => true,
            ]);
        }
    }
}
