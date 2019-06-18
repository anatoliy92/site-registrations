<?php

/**
 * Route for news module
 */

Route::group(['namespace' => 'Avl\SiteRegistrations\Controllers\Admin', 'middleware' => ['web', 'admin'], 'as' => 'adminreg::'], function () {

		Route::resource('sections/{id}/reg', 'RegistrationsController', ['as' => 'sections'])->only(['index', 'show']);
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localizationRedirect', 'web']], function() {
	Route::group(['namespace' => 'Avl\SiteRegistrations\Controllers\Site'], function() {

		Route::group(['prefix' => 'reg'], function() {
				Route::get('{alias}', 'RegistrationsController@index')->name('reg.index');
				Route::post('{alias}', 'RegistrationsController@register')->name('reg.register');
				Route::get('{alias}/verify-{verify}', 'RegistrationsController@verify')->where('verify', '(.*)');

				Route::get('{alias}/restore', 'RegistrationsController@restore')->name('reg.restore');
				Route::post('{alias}/restore', 'RegistrationsController@restorePost')->name('reg.restore.post');

				Route::get('{alias}/restore/verify-{verify}', 'RegistrationsController@update')->name('reg.restore.update')->where('verify', '(.*)');
				Route::post('{alias}/restore/verify-{verify}', 'RegistrationsController@updatePassword')->name('reg.restore.updatePassword')->where('verify', '(.*)');
		});


		Route::group(['prefix' => 'cabinet', 'namespace' => 'Cabinet'], function() {

			Route::group(['prefix' => 'auth'], function() {
					Route::get('/', 'AuthController@index')->name('cabinet.auth');
					Route::post('login', 'AuthController@auth')->name('cabinet.auth.login');
					Route::get('logout', 'AuthController@logout')->name('cabinet.auth.logout');
			});

			Route::group(['middleware' => 'cabinet'], function () {
				Route::get('/', 'HomeController@index')->name('cabinet.home');

				Route::get('profile', 'ProfileController@index')->name('cabinet.profile');
				Route::post('profile', 'ProfileController@update')->name('cabinet.profile.update');
				Route::get('profile/password', 'ProfileController@password')->name('cabinet.profile.password');
				Route::post('profile/password', 'ProfileController@updatePassword')->name('cabinet.profile.updatePassword');
			});

		});

	});
});
