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

    /*
    |---------------------------------
    | Users Management Routes Here    |
    |---------------------------------
     */
    Route::group(['prefix' => 'users-management'], function () {
        Route::get('/', 'Admin\UsersManagementController@index');
        Route::get('users-data', 'Admin\UsersManagementController@studentData');
        Route::get('create', 'Admin\UsersManagementController@create');
        Route::post('/save-users', 'Admin\UsersManagementController@store');
        Route::get('{id}/edit', 'Admin\UsersManagementController@edit');
        Route::post('{id}/update', 'Admin\UsersManagementController@update');
        Route::get('{id}/view', 'Admin\UsersManagementController@show');
        Route::get('delete/{id}', 'Admin\UsersManagementController@destroy');
        Route::get('active-inactive/{id}', 'Admin\UsersManagementController@active');
    });
    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('/', 'Admin\SubscriberManagementController@index');
        Route::get('users-data', 'Admin\SubscriberManagementController@studentData');
        Route::get('create', 'Admin\SubscriberManagementController@create');
        Route::post('/save-users', 'Admin\SubscriberManagementController@store');
        Route::get('{id}/edit', 'Admin\SubscriberManagementController@edit');
        Route::post('{id}/update', 'Admin\SubscriberManagementController@update');
        Route::get('{id}/view', 'Admin\SubscriberManagementController@show');
        Route::get('delete/{id}', 'Admin\SubscriberManagementController@destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\CategoryManagementController@index');
        Route::get('users-data', 'Admin\CategoryManagementController@studentData');
        Route::get('create', 'Admin\CategoryManagementController@create');
        Route::post('/save-users', 'Admin\CategoryManagementController@store');
        Route::get('{id}/edit', 'Admin\CategoryManagementController@edit');
        Route::post('{id}/update', 'Admin\CategoryManagementController@update');
        Route::get('{id}/view', 'Admin\CategoryManagementController@show');
        Route::get('delete/{id}', 'Admin\CategoryManagementController@destroy');
    });
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
