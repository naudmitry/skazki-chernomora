<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveStaticPage(Request $request, Page $staticPage)
    {


    }
}
