<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blog.categories.index');
    }
}
