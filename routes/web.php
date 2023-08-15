<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\LandingPageController;

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
Route::controller(LandingPageController::class)
	// ->prefix('webhook')
	->group(function(){
	Route::get('/','index');
});
// Route::get('/', function () {
// 	return view('welcome');
// });
