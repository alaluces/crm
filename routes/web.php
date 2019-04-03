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

Route::group(['prefix' => 'voyager'], function () {
    // Voyager routes
    Voyager::routes();
});

$router->get('/', ['as' => 'root', function () {
    return redirect("/crm/");
}]);

$router->get('admin', ['as' => 'admin', function () {
    return redirect("/crm/");
}]);


Route::group(['prefix' => 'crm'], function () {

    Route::get('customers/{id}', ['uses' => 'CustomerController@index', 'as' => 'customers.index'])->where('id', '[0-9]+');


    // Voyager routes
    Voyager::routes();

    // My custom routes
    Route::group(['middleware' => ['auth']], function() {  
        Route::get('vici/', ['uses' => 'ViciController@parse', 'as' => 'vici.parse']);      
       


    });

});
