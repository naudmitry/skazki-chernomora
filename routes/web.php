<?php

Route::get('/',
    [
        'uses' => 'Front\IndexController@index',
        'as' => 'front.index',
    ]);

Route::get('/blog',
    [
        'uses' => 'Front\IndexController@blog',
        'as' => 'front.blog.index',
    ]);

Route::get('/contact',
    [
        'uses' => 'Front\IndexController@contact',
        'as' => 'front.contact.index',
    ]);

Route::get('/about',
    [
        'uses' => 'Front\IndexController@about',
        'as' => 'front.about.index',
    ]);

Route::get('/service',
    [
        'uses' => 'Front\IndexController@service',
        'as' => 'front.service.index',
    ]);

Route::get('/gallery',
    [
        'uses' => 'Front\IndexController@gallery',
        'as' => 'front.gallery.index',
    ]);

Route::get('/team',
    [
        'uses' => 'Front\IndexController@team',
        'as' => 'front.team.index',
    ]);

Route::get('/appointment',
    [
        'uses' => 'Front\IndexController@appointment',
        'as' => 'front.appointment.index',
    ]);





Route::prefix('admin')->group(function () {
    Route::get('/',
        [
            'uses' => 'Admin\IndexController@index',
            'as' => 'admin.index',
        ]);

    Route::get('/blog/articles',
        [
            'uses' => 'Admin\BlogArticleController@index',
            'as' => 'admin.blog.articles.index',
        ]);

    Route::get('/blog/categories',
        [
            'uses' => 'Admin\BlogCategoryController@index',
            'as' => 'admin.blog.categories.index',
        ]);
});
