<?php

Route::group(['domain' => env('DOMAIN_ADMIN')], function () {
    Route::get(
        '/login',
        [
            'uses' => 'Admin\AuthController@login',
            'as' => 'admin.login'
        ]
    );

    Route::post(
        '/login',
        [
            'uses' => 'Admin\AuthController@loginPost',
            'as' => 'account.adminLoginPost',
        ]
    );

    Route::get(
        'logout',
        [
            'uses' => 'Admin\AuthController@logout',
            'as' => 'account.logout',
        ]
    );
});
