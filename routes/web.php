<?php

Route::get('/robots.txt','SeoController@robots');

Route::get('/custom-styles.css',
    [
        'uses' => 'Site\PageController@getCustomStyles',
        'as' => 'site.custom-styles',
    ]);