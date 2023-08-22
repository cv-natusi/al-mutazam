<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\Home\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
   return redirect('home');
});
Route::controller(HomeController::class)
	->prefix('home')
   ->as('home.')
	->group(function(){
	Route::get('/','main')->name('main');
	Route::get('berita','berita')->name('berita');
	Route::get('event','event')->name('event');
	Route::get('pengumuman','pengumuman')->name('pengumuman');
});
