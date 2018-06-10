<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use App\Group;

class AdminServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Load admin routes
        $this->loadRoutesFrom(config('admin.route.file'));

        // 
        $this->app->make('form')->considerRequest(true);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->register(ComposerServiceProvider::class);
    }
}
