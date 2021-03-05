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
Auth::routes();
Route::middleware(['auth', 'admin', 'email'])->group(function () {
    Route::get('/admin', 'TestController@admin');
});
Route::middleware(['auth', 'email'])->group(function () {
    Route::get('/user', 'TestController@user');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('app');
});
// Route::get('/{any?}', function () {
//     return 'masuk';
// })->where('any', '.*');
Route::view('/{any?}', 'app')->where('any', '.*');
