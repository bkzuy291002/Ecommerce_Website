<?php

namespace App\Providers;

use App\Models\comments;
use App\Models\Order;
use App\Models\products;
use App\Models\store;
use App\Observers\CommentObserver;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use App\Observers\StoreObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        store::observe(StoreObserver::class);
        comments::observe(CommentObserver::class);
//        products::observe(ProductObserver::class);
//        order::observe(OrderObserver::class);

    }
}
