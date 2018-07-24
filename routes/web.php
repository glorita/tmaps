<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|--------------------------------------------------------------------------
| @author: gvargas
| @date: 7/23/2018
| @description: Test of implement googlemaps go to /map
|--------------------------------------------------------------------------
*/

	Route::get('/map', 'MapController@index');
