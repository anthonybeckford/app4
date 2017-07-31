<?php


Route::group(['prefix' => 'resources', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'resources.getIndex', 'uses' => 'ResourcesController@getIndex']);
    Route::get('resource/{id}', ['as' => 'resources.getImage', 'uses' => 'ResourcesController@show']);
});