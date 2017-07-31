<?php

\Route::group(['prefix' => 'register'], function () {
    \Route::group(['prefix' => 'account'], function () {
        \Route::get('/', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);
        \Route::post('/', ['as' => 'postRegister', 'before' => 'guest', 'uses' => 'RegisterController@postRegister']);
    });
});