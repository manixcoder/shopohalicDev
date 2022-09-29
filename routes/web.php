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
        Route::get('delete', 'Admin\UsersManagementController@destroy');
        Route::get('active-inactive', 'Admin\UsersManagementController@active');
    });
    Route::group(['prefix' => 'marchant-management'], function () {
        Route::get('/', ['uses'=>'Admin\MarchantManagementController@index', 'as'=>'users.index']);
        Route::get('users-data', 'Admin\MarchantManagementController@studentData');
        Route::get('create', 'Admin\MarchantManagementController@create');
        Route::post('/save-users', 'Admin\MarchantManagementController@store');
        Route::get('{id}/edit', 'Admin\MarchantManagementController@edit');
        Route::post('{id}/update', 'Admin\MarchantManagementController@update');
        Route::get('{id}/view', 'Admin\MarchantManagementController@show');
        Route::get('delete', 'Admin\MarchantManagementController@destroy');
        Route::get('active-inactive', 'Admin\MarchantManagementController@active');
    });
    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('/', 'Admin\SubscriberManagementController@index');
        Route::get('users-data', 'Admin\SubscriberManagementController@studentData');
        Route::get('create', 'Admin\SubscriberManagementController@create');
        Route::post('/save-users', 'Admin\SubscriberManagementController@store');
        Route::get('{id}/edit', 'Admin\SubscriberManagementController@edit');
        Route::post('{id}/update', 'Admin\SubscriberManagementController@update');
        Route::get('{id}/view', 'Admin\SubscriberManagementController@show');
        Route::get('delete/{', 'Admin\SubscriberManagementController@destroy');
    });
    Route::group(['prefix' => 'order-settings'], function () {
        Route::get('/', 'Admin\OrderSettingManagementController@index');
        Route::get('create', 'Admin\OrderSettingManagementController@create');
        Route::post('save-setting', 'Admin\OrderSettingManagementController@store');
        Route::get('/edit/{id}', 'Admin\OrderSettingManagementController@edit');
        Route::post('{id}/update', 'Admin\OrderSettingManagementController@update');
        Route::get('{id}/view', 'Admin\OrderSettingManagementController@show');
        Route::get('delete', 'Admin\OrderSettingManagementController@destroy');
        Route::get('active-inactive', 'Admin\OrderSettingManagementController@active');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\CategoryManagementController@index');
        Route::get('users-data', 'Admin\CategoryManagementController@studentData');
        Route::get('create', 'Admin\CategoryManagementController@create');
        Route::post('/save-category', 'Admin\CategoryManagementController@store');
        Route::get('/edit/{id}', 'Admin\CategoryManagementController@edit');
        Route::post('{id}/update', 'Admin\CategoryManagementController@update');
        Route::get('{id}/view', 'Admin\CategoryManagementController@show');
        Route::get('delete/{id}', 'Admin\CategoryManagementController@destroy');
    });
    Route::group(['prefix' => 'commission'], function () {
        Route::get('/', 'Admin\CommissionManagementController@index');
        Route::get('users-data', 'Admin\CommissionManagementController@studentData');
        Route::get('create', 'Admin\CommissionManagementController@create');
        Route::post('/save-category', 'Admin\CommissionManagementController@store');
        Route::get('{id}/edit', 'Admin\CommissionManagementController@edit');
        Route::post('{id}/update', 'Admin\CommissionManagementController@update');
        Route::get('{id}/view', 'Admin\CommissionManagementController@show');
        Route::get('delete/{id}', 'Admin\CommissionManagementController@destroy');
    });
    
});


/*=====================================merchant=====================================*/
Route::group(['prefix' => 'merchant', 'middleware' => ['merchant', 'auth']], function () {
    Route::get('/', 'Merchant\DashboardController@index');
    Route::post('/', 'Merchant\DashboardController@index');
    Route::group(['prefix' => 'order-management'], function () {
        Route::get('/', 'Merchant\OrderManagementController@index');
        Route::get('users-data', 'Merchant\OrderManagementController@studentData');
        Route::get('create', 'Merchant\OrderManagementController@create');
        Route::post('/save-category', 'Merchant\OrderManagementController@store');
        Route::get('{id}/edit', 'Merchant\OrderManagementController@edit');
        Route::post('{id}/update', 'Merchant\OrderManagementController@update');
        Route::get('{id}/view', 'Merchant\OrderManagementController@show');
        Route::get('delete/{id}', 'Merchant\OrderManagementController@destroy');
    });
    Route::group(['prefix' => 'products-management'], function () {
        Route::get('/', 'Merchant\ProductManagementController@index');
        Route::get('create', 'Merchant\ProductManagementController@create');
        Route::post('/save', 'Merchant\ProductManagementController@store');
        Route::get('{id}/edit', 'Merchant\ProductManagementController@edit');
        Route::post('{id}/update', 'Merchant\ProductManagementController@update');
    });
    Route::group(['prefix' => 'shipping-management'], function () {
        Route::get('/', 'Merchant\ShippingManagementController@index');
        Route::get('create', 'Merchant\ShippingManagementController@create');
        Route::post('/save', 'Merchant\ShippingManagementController@store');
        Route::get('{id}/edit', 'Merchant\ShippingManagementController@edit');
        Route::post('{id}/update', 'Merchant\ShippingManagementController@update');
        Route::get('{id}/view', 'Merchant\ShippingManagementController@show');
        Route::get('delete', 'Merchant\ShippingManagementController@destroy');
    });
    Route::group(['prefix' => 'account-management'], function () {
        Route::get('/', 'Merchant\AccountManagementController@index');
        Route::get('users-data', 'Merchant\AccountManagementController@studentData');
        Route::get('create', 'Merchant\AccountManagementController@create');
        Route::post('/save', 'Merchant\AccountManagementController@store');
        Route::get('{id}/edit', 'Merchant\AccountManagementController@edit');
        Route::post('{id}/update', 'Merchant\AccountManagementController@update')->name('account.update');
        Route::get('{id}/view', 'Merchant\AccountManagementController@show');
        Route::get('delete/{id}', 'Merchant\AccountManagementController@destroy');
    });
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
