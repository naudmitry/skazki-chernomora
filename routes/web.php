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

Route::get('/portfolio',
    [
        'uses' => 'Front\IndexController@portfolio',
        'as' => 'front.portfolio.index',
    ]);