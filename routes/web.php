<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

/** 
 * Office
 */
Route::prefix('office')->namespace('Office')->group(function(){
    /**
     * view router
     */
    Route::view('login', 'office/login');
    Route::view('index', 'office/index');

    
    /**
     * api router
     */
    Route::get('test1', 'TestController@say');
});

/**
 * Shop
 */

/**
 * Supplier
 */



