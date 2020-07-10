<?php

Route::namespace('Shop')->middleware('auth:web')->prefix('shop')->name('shop.')->group(function() {

	Route::get('validate-coupon', 'ShopController@validateCoupon')->name('validate-coupon');

	Route::get('{purchase}/download', 'ShopController@download')->name('download');
	
});
