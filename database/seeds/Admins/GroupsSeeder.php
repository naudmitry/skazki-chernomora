<?php

use App\Models\Company;
use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::query()->get();

        foreach ($companies as $company) {
            $admins = $company->admins;

            factory(Group::class, 5)
                ->create(
                    [
                        'company_id' => $company->id,
                    ])
                ->each(
                    function (Group $group) use ($admins) {
                        $group->admins()->saveMany($admins->shuffle()->take(rand(0, $admins->count())));
                    });
        }
    }
}
