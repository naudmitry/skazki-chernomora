<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ADMINS
         */
        $this->call(AdminsSeeder::class);

        /**
         * BLOGS
         */
        $this->call(BlogCategoriesSeeder::class);
        $this->call(BlogsSeeder::class);
    }
}
