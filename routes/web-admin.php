<?php

Route::group(['domain' => env('DOMAIN_ADMIN')], function () {
    // Маршруты аутентификации
    Route::get('/login', ['uses' => 'Admin\AuthController@getLogin', 'as' => 'admin.login']);
    Route::post('/login', ['uses' => 'Admin\AuthController@postLogin', 'as' => 'account.adminLoginPost']);
    Route::get('/logout', ['uses' => 'Admin\AuthController@getLogout', 'as' => 'account.logout']);
});
