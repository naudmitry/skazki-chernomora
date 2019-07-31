<?php

Route::get('/',
    [
        'uses' => 'Site\IndexController@index',
        'as' => 'site.index',
    ])->middleware('geoIpRedirect');

Route::post('pre-entry/save',
    [
        'uses' => 'Site\PreEntryController@save',
        'as'   => 'front.pre-entry.save'
    ]);

Route::post('application/save',
    [
        'uses' => 'Site\ApplicationController@save',
        'as'   => 'site.application.save'
    ]);

Route::post('helpdesk/save',
    [
        'uses' => 'Site\HelpDeskController@save',
        'as'   => 'front.helpdesk.save'
    ]);

Route::get('{slug}',
    [
        'uses' => 'Site\SlugController@index',
        'as' => 'slug.index',
    ]);