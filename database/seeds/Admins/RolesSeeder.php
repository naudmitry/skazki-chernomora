<?php

use App\Classes\AdminComponentEnum;
use App\Models\Role;
use Carbon\Carbon;
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
        Role::query()
            ->where('enable', true)
            ->update([
                'components' => \DB::raw('IF(`super`, "' . addslashes(json_encode(array_values(AdminComponentEnum::listsSuper()))) . '", "' . addslashes(json_encode(array_values(AdminComponentEnum::listsCompany()))) . '")'),
                'updated_at' => Carbon::now(),
            ]);
    }
}
