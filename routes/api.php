<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function () {
    Route::post('register', 'RegisterController');
    // Route::post('login', 'loginController');
    Route::post('verification', 'VerificationController');
    Route::post('regenerate-otp', 'RegenerateOtpCodeController');
    // Route::post('update-password', 'UpdatePasswordController');
    // // Route::post('logout', 'logoutController');
});
// Route::namespace('Article')->middleware('auth:api')->group(function () {
//     Route::post('create-new-article', 'ArticleController@store');
//     Route::patch('update-the-selected-article/{article}', 'ArticleController@update');
//     Route::delete('delete-the-selected-article/{article}', 'ArticleController@destroy');
// });
// Route::get('articles', 'Article\ArticleController@index');
// Route::get('user', 'UserController');
