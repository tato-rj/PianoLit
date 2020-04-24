<?php

Route::namespace('WebApp')->group(function() {
	Route::get('', 'TabsController@discover')->name('discover');

	Route::get('explore', 'TabsController@explore')->name('explore');
	
	Route::get('search', 'TabsController@search')->middleware('search.driver')->name('search');

	Route::get('playlists', 'TabsController@playlists')->name('playlists');
	
	Route::get('my-pieces', 'TabsController@myPieces')->name('my-pieces');
	
	Route::get('settings', 'TabsController@settings')->name('settings');
});

Route::post('logout', 'Auth\WebApp\LoginController@logout')->name('logout');