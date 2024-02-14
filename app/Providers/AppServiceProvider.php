<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        try {
            $local_name = auth()->hasUser() ? auth()->user()->local_name : User::first()->local_name;
            config()->set('admin.local-name', $local_name);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
