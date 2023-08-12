<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
//Route::get('/', 'PaymentController@index');
//Route::post('/payment','PaymentController@payment');
Route::get('/admin/login', 'HomeController@adminLogin');
Route::get('/', 'HomeController@index');
Route::any('/product-detail/{id}', 'HomeController@productDetail'); 
 
///

Route::any('/search', 'HomeController@search'); 
Route::get('searchItem', 'HomeController@searchItem');
Route::get('/about', 'HomeController@about'); 
Route::get('/contactus', 'HomeController@contactus'); 
Route::get('/privacypolicy', 'HomeController@privacypolicy'); 
Route::get('termcondition', 'HomeController@termcondition'); 
Route::get('get-subcategory', 'GeneralController@getSubCategory');
Route::get('get-brand', 'GeneralController@getBrand');
Route::get('get-size', 'GeneralController@getSize');
Route::get('add-subscription', 'HomeController@addSubscription');  

// Route::get('/', function () {
//     return view('welcome');
// });
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
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', 'Admin\BannerController@index');
        Route::get('create', 'Admin\BannerController@create');
        Route::post('/save', 'Admin\BannerController@store');
        Route::get('/edit/{id}', 'Admin\BannerController@edit');
        Route::post('/{id}/update', 'Admin\BannerController@update');
        Route::get('delete/{id}', 'Admin\BannerController@destroy');
    });
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', 'Admin\BrandController@index');
        Route::get('create', 'Admin\BrandController@create');
        Route::post('/save', 'Admin\BrandController@store');
        Route::get('/edit/{id}', 'Admin\BrandController@edit');
        Route::post('/{id}/update', 'Admin\BrandController@update');
        Route::get('delete/{id}', 'Admin\BrandController@destroy');      
    });
    Route::group(['prefix' => 'sizes'], function () {
        Route::get('/', 'Admin\SizeController@index');
        Route::get('create', 'Admin\SizeController@create');
        Route::post('/save', 'Admin\SizeController@store');
        Route::get('/edit/{id}', 'Admin\SizeController@edit');
        Route::post('/{id}/update', 'Admin\SizeController@update');
        Route::get('delete/{id}', 'Admin\SizeController@destroy');
    });
    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', 'Admin\ColorController@index');
        Route::get('create', 'Admin\ColorController@create');
        Route::post('/save', 'Admin\ColorController@store');
        Route::get('/edit/{id}', 'Admin\ColorController@edit');
        Route::post('/{id}/update', 'Admin\ColorController@update');
        Route::get('delete/{id}', 'Admin\ColorController@destroy');
    });
    Route::group(['prefix' => 'orderstatus'], function () {
        Route::get('/', 'Admin\OrderStatusController@index');
        Route::get('create', 'Admin\OrderStatusController@create');
        Route::post('/save', 'Admin\OrderStatusController@store');
        Route::get('/edit/{id}', 'Admin\OrderStatusController@edit');
        Route::post('/{id}/update', 'Admin\OrderStatusController@update');
        Route::get('delete/{id}', 'Admin\OrderStatusController@destroy');
    });
});


/*=====================================merchant=====================================*/
Route::group(['prefix' => 'merchant', 'middleware' => ['merchant', 'auth']], function () {
    Route::get('/', 'Merchant\DashboardController@index');
    Route::post('/', 'Merchant\DashboardController@index');
    Route::group(['prefix' => 'order-management'], function () {
        Route::get('/', 'Merchant\OrderManagementController@index');
        Route::any('order/{id}', 'Merchant\OrderManagementController@orderDetail');
        Route::get('changeOrderStatus', 'Merchant\OrderManagementController@orderStatus');
    });
    Route::group(['prefix' => 'products-management'], function () {
        Route::get('/', 'Merchant\ProductManagementController@index');
        Route::get('create', 'Merchant\ProductManagementController@create');
        Route::post('/save', 'Merchant\ProductManagementController@store');
        Route::get('{id}/edit', 'Merchant\ProductManagementController@edit');
        Route::post('{id}/update', 'Merchant\ProductManagementController@update');
        Route::any('{id}/color-variant', 'Merchant\ProductManagementController@colorVariant');
        Route::any('{product_id}/{color_id}/manage-store', 'Merchant\ProductManagementController@manageStore');
    });
    Route::group(['prefix' => 'special-price-management'], function () {
        Route::get('/', 'Merchant\SpecialPriceManagementController@index');        
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
        Route::any('/', 'Merchant\AccountManagementController@index');
        Route::get('change-password', 'Merchant\AccountManagementController@changePassword');
        Route::get('users-data', 'Merchant\AccountManagementController@studentData');
        Route::get('create', 'Merchant\AccountManagementController@create');
        Route::post('/save', 'Merchant\AccountManagementController@store');
        Route::get('{id}/edit', 'Merchant\AccountManagementController@edit');
        Route::post('{id}/update', 'Merchant\AccountManagementController@update')->name('account.update');
        Route::get('{id}/view', 'Merchant\AccountManagementController@show');
        Route::get('delete/{id}', 'Merchant\AccountManagementController@destroy');
    });
});

// Route::group(['prefix' => 'merchant', 'middleware' => ['merchant', 'auth']], function () {
//     Route::get('/', 'Merchant\DashboardController@index');
//     Route::post('/', 'Merchant\DashboardController@index');
// });
/*=====================================Users=====================================*/
Route::group(['prefix' => 'users', 'middleware' => ['users', 'auth']], function () {

    // return "Student";
    Route::get('/', 'Users\DashboardController@myAccount');
    Route::any('myaccount', 'Users\DashboardController@myAccount');
    Route::any('edit-account', 'Users\DashboardController@userProfileUpdate');
    Route::any('edit-shiiping-address', 'Users\DashboardController@editShiipingAddress');
    Route::get('get-shipping-address', 'Users\DashboardController@getShippingAddress');
    Route::any('stripe-payment', 'Users\DashboardController@stripePayment');
    Route::post('/payment','Users\DashboardController@payment');
    Route::any('myorder', 'Users\DashboardController@myOrder');
    Route::any('myorder/{id}', 'Users\DashboardController@myOrderDetail');
    //Route::post('/save', 'Users\DashboardController@store');
    Route::get('deleteItem', 'Users\DashboardController@deleteItem');
    Route::any('/cart', 'HomeController@cart'); 
Route::any('/placeorder', 'HomeController@placeorder');
    
    
    /*
    |---------------------------------
    | Employee Management Routes Here    |
    |---------------------------------
     */
});
    Route::group(['prefix' => '', 'middleware' => ['users', 'auth']], function () {
    Route::any('/cart', 'HomeController@cart'); 
    Route::any('/placeorder', 'HomeController@placeorder');
    Route::any('/shipping-address', 'HomeController@shippingAddress'); 
    Route::get('get-shipping-address', 'HomeController@getShippingAddress');
    Route::any('/review-order', 'HomeController@reviewOrder'); 
    Route::any('/pay-now', 'HomeController@payNow'); 
    /*
    |---------------------------------
    | Employee Management Routes Here    |
    |---------------------------------
     */
});