<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'site.index',
    ])->middleware('geoIpRedirect');

Route::post('orders/save',
    [
        'uses' => 'Site\OrderController@save',
        'as'   => 'front.orders.save'
    ]);

Route::get('{slug}',
    [
        'uses' => 'Site\SlugController@index',
        'as' => 'slug.index',
    ]);