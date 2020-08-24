<?php


Route::group(['namespace' => '\Swarovsky\Core\Http\Controllers', 'prefix' => 'admin'], static function () {
    Route::resource('subscriptions', 'CrudController');
    Route::resource('currencies', 'CrudController');
    Route::resource('userSubscriptions', 'CrudController');
    Route::resource('userPaymentMethods', 'CrudController');
    Route::resource('paymentProviders', 'CrudController');
});
