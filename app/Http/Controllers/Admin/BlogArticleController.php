<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    public function index()
    {
        return view('admin.blog.articles.index');
    }
}
