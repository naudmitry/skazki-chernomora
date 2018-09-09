<?php

Route::group(['domain' => env('DOMAIN_ADMIN')], function () {

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

    // ADMIN LISTS

    Route::get('/admin/lists',
        [
            'uses' => 'Admin\AdminController@index',
            'as' => 'admin.admin.list.index',
        ]);

    /*
     * BLOG
     */
    Route::get('/blog/articles',
        [
            'uses' => 'Admin\BlogController@index',
            'as' => 'admin.blog.article.index',
        ]);
    Route::get('/blog/articles/create',
        [
            'uses' => 'Admin\BlogController@create',
            'as' => 'admin.blog.article.create',
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
    Route::get('/faq/questions/create',
        [
            'uses' => 'Admin\FaqController@create',
            'as' => 'admin.faq.question.create',
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

    // PAGE

    Route::post('/static-page/save/{staticPage}',
        [
            'uses' => 'Admin\PageController@saveStaticPage',
            'as' => 'admin.static.page.save',
        ])
        ->where('staticPage', '[0-9]+');
    Route::get('/page/lists',
        [
            'uses' => 'Admin\PageController@index',
            'as' => 'admin.page.list.index',
        ]);
    Route::get('/page/lists/create',
        [
            'uses' => 'Admin\PageController@create',
            'as' => 'admin.page.list.create',
        ]);
    Route::get('/page/lists/edit/{page}',
        [
            'uses' => 'Admin\PageController@edit',
            'as' => 'admin.page.list.edit',
        ])
        ->where('page', '[0-9]+');
    Route::delete('/page/lists/{faq}',
        [
            'uses' => 'Admin\PageController@delete',
            'as' => 'admin.page.list.delete',
        ])
        ->where('page', '[0-9]+');
    Route::post('/page/lists/enable/{page}',
        [
            'uses' => 'Admin\PageController@enable',
            'as' => 'admin.page.list.enable',
        ])
        ->where('page', '[0-9]+');
    Route::post('/page/lists/save/{page?}',
        [
            'uses' => 'Admin\PageController@save',
            'as' => 'admin.page.list.save',
        ])
        ->where('page', '[0-9]+');

    // PAGE CATEGORIES

    Route::get('/page/categories',
        [
            'uses' => 'Admin\PageCategoryController@index',
            'as' => 'admin.page.category.index',
        ]);
    Route::get('/page/categories/create',
        [
            'uses' => 'Admin\PageCategoryController@create',
            'as' => 'admin.page.category.create',
        ]);
    Route::post('/page/categories/sequence',
        [
            'uses' => 'Admin\PageCategoryController@sequence',
            'as' => 'admin.page.category.sequence',
        ]);
    Route::post('/page/categories/{category}/enable',
        [
            'uses' => 'Admin\PageCategoryController@enable',
            'as' => 'admin.page.category.enable',
        ])
        ->where('category', '[0-9]+');
    Route::get('/page/categories/{category}/edit',
        [
            'uses' => 'Admin\PageCategoryController@edit',
            'as' => 'admin.page.category.edit',
        ])
        ->where('category', '[0-9]+');
    Route::delete('/page/categories/{category}',
        [
            'uses' => 'Admin\PageCategoryController@delete',
            'as' => 'admin.page.category.delete',
        ])
        ->where('category', '[0-9]+');
    Route::post('/page/categories/save/{category?}',
        [
            'uses' => 'Admin\PageCategoryController@save',
            'as' => 'admin.page.category.save',
        ])
        ->where('category', '[0-9]+');

    // HEADER
//    Route::get('/header',
//        [
//            'uses' => 'Admin\PageController@header',
//            'as' => 'admin.header.index',
//        ]);

    Route::get('/main',
        [
            'uses' => 'Admin\PageController@main',
            'as' => 'admin.main.index',
        ]);

    // CONTACTS
    Route::get('/contacts',
        [
            'uses' => 'Admin\PageController@contacts',
            'as' => 'admin.contacts.index',
        ]);
});
