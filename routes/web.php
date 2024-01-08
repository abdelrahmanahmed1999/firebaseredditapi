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

Route::get('/contacts',[contactController::class,"index"])->name('contacts');
Route::get('/add-contacts',[contactController::class,"add"])->name('add-contact');
Route::post('/store-contacts',[contactController::class,"store"])->name('store-contact');
Route::get('/edit-contacts/{key}',[contactController::class,"edit"])->name('edit-contact');
Route::post('/update-contacts',[contactController::class,"update"])->name('update-contact');
Route::post('/delete-contacts',[contactController::class,"delete"])->name('delete-contact');


use App\Http\Controllers\RedditController;

Route::get('/get-posts', [RedditController::class, 'getPostsController']);
