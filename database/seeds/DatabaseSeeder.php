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
        $this->call(CompaniesSeeder::class);
        $this->call(ShowcasesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(GroupsSeeder::class);

        $this->call(BlogCategoriesSeeder::class);
        $this->call(BlogsSeeder::class);

        $this->call(FaqCategoriesSeeder::class);
        $this->call(FaqsSeeder::class);

        $this->call(PageCategoriesSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(StaticPagesSeeder::class);

        $this->call(SlugsSeeder::class);
    }
}
