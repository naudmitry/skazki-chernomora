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

    /*
     * BLOG
     */
    Route::get('/blog/articles',
        [
            'uses' => 'Admin\BlogController@index',
            'as' => 'admin.blog.articles.index',
        ]);
    Route::get('/blog/article/edit/{blog}',
        [
            'uses' => 'Admin\BlogController@edit',
            'as' => 'admin.blog.article.edit',
        ])
        ->where('blog', '[0-9]+');
    Route::post('/blog/change/availability/{blog}',
        [
            'uses' => 'Admin\BlogController@changeAvailability',
            'as' => 'admin.blog.change.availability',
        ])
        ->where('blog', '[0-9]+');

    /**
     * BLOG CATEGORIES
     */
    Route::get('/blog/categories',
        [
            'uses' => 'Admin\BlogCategoryController@index',
            'as' => 'admin.blog.categories.index',
        ]);
    Route::get('/blog/categories/create',
        [
            'uses' => 'Admin\BlogCategoryController@create',
            'as' => 'admin.blog.categories.create',
        ]);
    Route::post('/blog/categories/save/{category?}',
        [
            'uses' => 'Admin\BlogCategoryController@save',
            'as' => 'admin.blog.categories.save',
        ])
        ->where('category', '[0-9]+');
    Route::get('/blog/categories/edit/{category}',
        [
            'uses' => 'Admin\BlogCategoryController@edit',
            'as' => 'admin.blog.categories.edit',
        ])
        ->where('category', '[0-9]+');
    Route::delete('/blog/categories/delete/{category}',
        [
            'uses' => 'Admin\BlogCategoryController@delete',
            'as' => 'admin.blog.categories.delete',
        ])
        ->where('category', '[0-9]+');
});
