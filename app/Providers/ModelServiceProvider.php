<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        \App\User::observe(\App\Observers\UserObserver::class);
        \App\UserFriend::observe(\App\Observers\UserFriendObserver::class);
        \App\UserBlock::observe(\App\Observers\UserBlockObserver::class);
    }

}
