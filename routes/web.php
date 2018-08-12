<?php

Route::group(['domain' => env('DOMAIN_CLIENT')], function () {
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
            'uses' => 'Site\SlugController@index',
            'as' => 'slug.index',
        ]);
});
