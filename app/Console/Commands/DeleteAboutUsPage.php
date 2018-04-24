<?php

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;

class DeleteAboutUsPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'page:delete-about-us-page';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаляет из таблицы "Page" все записи "About Us"';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $aboutUsPages = Page::query()
            ->where('static_page_type', 'about')
            ->get();

        foreach ($aboutUsPages as $aboutUsPage) {
            $aboutUsPage->delete();
        }
    }
}
