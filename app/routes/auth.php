<?php

\Route::group(['prefix' => 'login'], function () {
    \Route::get('/', ['as' => 'getLogin', 'uses' => 'AuthController@getLogin']);
    \Route::post('/', ['as' => 'postLogin', 'uses' => 'AuthController@postLogin']);
});

\Route::get('/logout', ['as' => 'getLogout', 'uses' => 'AuthController@getLogout']);