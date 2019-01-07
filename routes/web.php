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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'welcome.index'
]);

Route::get('/admin/dashboard', [
    'uses' => 'AdminController@admin',
    'as' => 'admin.dashboard'
])->middleware('is_admin');

Route::post('/admin/order/retire', [
    'uses' => 'AdminController@retiredOrder',
    'as' => 'order.retire'
])->middleware('is_admin');

Route::any('/callback', [
    'uses' => 'PackController@callback',
    'as' => 'payment.callback'
]);

Auth::routes();

Route::group(['middleware' => 'auth'], function() { 
    Route::get('/logout', [
        'uses' => '\App\Http\Controllers\Auth\LoginController@logout',
        'as' => 'logout'
    ]);

    Route::get('/user/portal', [
        'uses' => 'UserController@userAccount',
        'as' => 'user.account'
    ]);

    Route::post('/user/retire', [
        'uses' => 'MailController@retire',
        'as' => 'user.retire'
    ]);

    Route::get('/user/packs', [
        'uses' => 'PackController@getIndex',
        'as' => 'user.packs'
    ]);

    Route::post('/user/packs/checkout', [
        'uses' => 'PackController@checkout',
        'as' => 'user.checkout'
    ]);
}); 






