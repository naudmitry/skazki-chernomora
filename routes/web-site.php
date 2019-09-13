<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'site.index',
    ])->middleware('geoIpRedirect');

Route::post('review/save',
    [
        'uses' => 'Site\ReviewController@save',
        'as'   => 'site.review.save'
    ]);

Route::post('pre-entry/save',
    [
        'uses' => 'Site\PreEntryController@save',
        'as'   => 'site.pre-entry.save'
    ]);

Route::post('application/save',
    [
        'uses' => 'Site\ApplicationController@save',
        'as'   => 'site.application.save'
    ]);

Route::post('helpdesk/save',
    [
        'uses' => 'Site\HelpDeskController@save',
        'as'   => 'site.helpdesk.save'
    ]);

Route::get('{slug}',
    [
        'uses' => 'Site\SlugController@index',
        'as' => 'slug.index',
    ]);