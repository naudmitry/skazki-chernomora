<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'front.index',
    ])->middleware('geoIpRedirect');

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