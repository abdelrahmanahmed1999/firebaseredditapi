<?php

use Illuminate\Support\Facades\Route;

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


/*Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {});
*/

use App\Http\Controllers\contactController;

Route::get('/',function(){
    return view("welcome");
});

Route::get('/contacts',[contactController::class,"index"]);
Route::get('/add-contacts',[contactController::class,"store"]);


use App\Http\Controllers\RedditController;

Route::get('/get-hot-posts', [RedditController::class, 'getHotPosts']);
