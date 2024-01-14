<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\RedditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


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



Route::get('/',function(){
    return view("welcome");
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/contacts',[contactController::class,"index"])->name('contacts');
    Route::get('/add-contacts',[contactController::class,"add"])->name('add-contact');
    Route::post('/store-contacts',[contactController::class,"store"])->name('store-contact');
    Route::get('/edit-contacts/{key}',[contactController::class,"edit"])->name('edit-contact');
    Route::post('/update-contacts',[contactController::class,"update"])->name('update-contact');
    Route::post('/delete-contacts',[contactController::class,"delete"])->name('delete-contact');
    Route::get('users/export/', [UserController::class, 'export'])->name('export.users');
    Route::get('users/import/', [UserController::class, 'import'])->name('import.users');

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
});



Route::get('/get-posts', [RedditController::class, 'getPostsController']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
