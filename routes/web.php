<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'front.index',
    ]);

Route::get('/blog',
    [
        'uses' => 'Site\BlogController@index',
        'as' => 'front.blog.index',
    ]);

//Route::get('/blog/{blog}',
//    [
//        'uses' => 'Site\BlogController@show',
//        'as' => 'site.blog.show',
//    ]);

Route::get('/contact',
    [
        'uses' => 'Site\IndexController@contact',
        'as' => 'front.contact.index',
    ]);

Route::get('/about',
    [
        'uses' => 'Site\IndexController@about',
        'as' => 'front.about.index',
    ]);

Route::get('/service',
    [
        'uses' => 'Site\IndexController@service',
        'as' => 'front.service.index',
    ]);

Route::get('/gallery',
    [
        'uses' => 'Site\IndexController@gallery',
        'as' => 'front.gallery.index',
    ]);

Route::get('/team',
    [
        'uses' => 'Site\IndexController@team',
        'as' => 'front.team.index',
    ]);

Route::get('/appointment',
    [
        'uses' => 'Site\IndexController@appointment',
        'as' => 'front.appointment.index',
    ]);

Route::get('{slug}',
    [
        'uses' => 'Front\SlugController@index',
        'as' => 'slug.index',
    ]);


Route::prefix('admin')->group(function () {
    Route::get('/',
        [
            'uses' => 'Admin\IndexController@index',
            'as' => 'admin.index',
        ]);

    Route::get('404',
        [
            'as' => '404',
            'uses' => 'Admin\ErrorHandlerController@errorCode404'
        ]);

    Route::get('405',
        [
            'as' => '405',
            'uses' => 'Admin\ErrorHandlerController@errorCode405'
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


    // FAQ CATEGORIES

    Route::get('/faq/categories',
        [
            'uses' => 'Admin\FaqCategoryController@index',
            'as' => 'admin.faq.category.index',
        ]);
    Route::get('/faq/categories/create',
        [
            'uses' => 'Admin\FaqCategoryController@create',
            'as' => 'admin.faq.category.create',
        ]);
    Route::post('/faq/categories/sequence',
        [
            'uses' => 'Admin\FaqCategoryController@sequence',
            'as' => 'admin.faq.category.sequence',
        ]);
    Route::post('/faq/categories/{category}/enable',
        [
            'uses' => 'Admin\FaqCategoryController@enable',
            'as' => 'admin.faq.category.enable',
        ])
        ->where('category', '[0-9]+');
    Route::get('/faq/categories/{category}/edit',
        [
            'uses' => 'Admin\FaqCategoryController@edit',
            'as' => 'admin.faq.category.edit',
        ])
        ->where('category', '[0-9]+');
    Route::delete('/faq/categories/{category}',
        [
            'uses' => 'Admin\FaqCategoryController@delete',
            'as' => 'admin.faq.category.delete',
        ])
        ->where('category', '[0-9]+');
    Route::post('/faq/categories/save/{category?}',
        [
            'uses' => 'Admin\FaqCategoryController@save',
            'as' => 'admin.faq.category.save',
        ])
        ->where('category', '[0-9]+');

    // FAQ

    Route::get('/faq/questions',
        [
            'uses' => 'Admin\FaqController@index',
            'as' => 'admin.faq.question.index',
        ]);
    Route::get('/faq/questions/edit/{faq}',
        [
            'uses' => 'Admin\FaqController@edit',
            'as' => 'admin.faq.question.edit',
        ])
        ->where('faq', '[0-9]+');
    Route::delete('/faq/questions/{faq}',
        [
            'uses' => 'Admin\FaqController@delete',
            'as' => 'admin.faq.question.delete',
        ])
        ->where('faq', '[0-9]+');
    Route::post('/faq/questions/enable/{faq}',
        [
            'uses' => 'Admin\FaqController@enable',
            'as' => 'admin.faq.question.enable',
        ])
        ->where('faq', '[0-9]+');
    Route::post('/faq/questions/save/{faq?}',
        [
            'uses' => 'Admin\FaqController@save',
            'as' => 'admin.faq.question.save',
        ])
        ->where('faq', '[0-9]+');

    // SETTINGS

    Route::get('/settings/{tab?}',
        [
            'uses' => 'Admin\SettingController@index',
            'as' => 'admin.settings.index',
        ])
    ->where('tab', 'general|contacts');
});
