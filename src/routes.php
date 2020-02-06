<?php

Route::group([
    'prefix' => 'schematics',
    'namespace' => 'Mtolhuys\LaravelSchematics\Http\Controllers',
    'middleware' => config('schematics.middleware', [])
], static function () {
    Route::get('/', 'SchematicsController@index');
    Route::get('/details/{table}', 'SchematicsController@details');
    Route::get('/clear-cache', 'SchematicsController@clearCache');
    Route::get('/refresh', 'SchematicsController@modelsWithRelations');

    Route::group(['prefix' => 'relations'], static function () {
        Route::post('/create', 'RelationsController@create');
        Route::post('/delete', 'RelationsController@delete');
    });

    Route::group(['prefix' => 'models'], static function () {
        Route::post('/create', 'ModelsController@create');
        Route::post('/delete', 'ModelsController@delete');
    });
});
