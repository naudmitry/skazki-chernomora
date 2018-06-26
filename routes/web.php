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
            'as' => 'admin.blog.article.index',
        ]);
    Route::post('/blog/articles/save/{blog?}',
        [
            'uses' => 'Admin\BlogController@save',
            'as' => 'admin.blog.article.save',
        ])
        ->where('blog', '[0-9]+');
    Route::post('/blog/articles/save/content/{blog}',
        [
            'uses' => 'Admin\BlogController@saveContent',
            'as' => 'admin.blog.article.save.content',
        ])
        ->where('blog', '[0-9]+');
    Route::get('/blog/articles/edit/{blog}',
        [
            'uses' => 'Admin\BlogController@edit',
            'as' => 'admin.blog.article.edit',
        ])
        ->where('blog', '[0-9]+');
    Route::delete('/blog/articles/{blog}',
        [
            'uses' => 'Admin\BlogController@delete',
            'as' => 'admin.blog.article.delete',
        ])
        ->where('blog', '[0-9]+');
    Route::post('/blog/articles/enable/{blog}',
        [
            'uses' => 'Admin\BlogController@enable',
            'as' => 'admin.blog.article.enable',
        ])
        ->where('blog', '[0-9]+');

    /**
     * BLOG CATEGORIES
     */
    Route::get('/blog/categories',
        [
            'uses' => 'Admin\BlogCategoryController@index',
            'as' => 'admin.blog.category.index',
        ]);
    Route::get('/blog/categories/create',
        [
            'uses' => 'Admin\BlogCategoryController@create',
            'as' => 'admin.blog.category.create',
        ]);
    Route::post('/blog/categories/save/{category?}',
        [
            'uses' => 'Admin\BlogCategoryController@save',
            'as' => 'admin.blog.category.save',
        ])
        ->where('category', '[0-9]+');
    Route::get('/blog/categories/{category}/edit',
        [
            'uses' => 'Admin\BlogCategoryController@edit',
            'as' => 'admin.blog.category.edit',
        ])
        ->where('category', '[0-9]+');
    Route::delete('/blog/categories/{category}',
        [
            'uses' => 'Admin\BlogCategoryController@delete',
            'as' => 'admin.blog.category.delete',
        ])
        ->where('category', '[0-9]+');
    Route::post('/blog/categories/sequence',
        [
            'uses' => 'Admin\BlogCategoryController@sequence',
            'as' => 'admin.blog.category.sequence',
        ]);
    Route::post('/blog/categories/{category}/enable',
        [
            'uses' => 'Admin\BlogCategoryController@enable',
            'as' => 'admin.blog.category.enable',
        ])
        ->where('category', '[0-9]+');
});
