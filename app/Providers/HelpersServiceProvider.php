<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider{
	/**
	 * Register services.
	 */
	public function register(): void{
		//
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void{
		require_once app_path().'/Helpers/Helpers.php';
	}
}
