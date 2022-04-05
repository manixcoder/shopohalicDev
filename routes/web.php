<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::get('/admin/login', 'HomeController@adminLogin');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/validate-user', 'HomeController@checkUserRole');

/*=====================================ADMIN=====================================*/
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    Route::get('/', 'Admin\DashboardController@index');
});


/*=====================================merchant=====================================*/
Route::group(['prefix' => 'merchant', 'middleware' => ['merchant', 'auth']], function () {

    Route::get('/', 'Merchant\DashboardController@index');
});


/*=====================================Users=====================================*/
Route::group(['prefix' => 'users', 'middleware' => ['users', 'auth']], function () {
    // return "Student";
    Route::get('/', 'Users\DashboardController@index');
    /*
    |---------------------------------
    | Employee Management Routes Here    |
    |---------------------------------
     */
});
