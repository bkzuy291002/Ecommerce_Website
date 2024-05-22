<?php

namespace App\Providers;

use App\Service\city\serviceCity;
use App\Services\CartService;
use App\Services\CartServiceEloquent;
use App\Services\CategoryService;
use App\Services\CategoryServiceEloquent;
use App\Services\City\CityServiceEloquent;
use App\Services\CityService;
use App\Services\CityServiceEloquent as AnotherCityServiceEloquent;
use App\Services\CommentService;
use App\Services\CommentServiceEloquent;
use App\Services\DeliveryService;
use App\Services\DeliveryServiceEloquent;
use App\Services\DetailOrderService;
use App\Services\DetailOrderServiceEloquent;
use App\Services\DistrictService;
use App\Services\DistrictServiceEloquent;
use App\Services\ImageService;
use App\Services\ImageServiceEloquent;
use App\Services\NotifieService;
use App\Services\NotifieServiceEloquent;
//use App\Services\ProductImageService;
//use App\Services\ProductImageServiceEloquent;
use App\Services\OrderService;
use App\Services\OrderServiceEloquent;
use App\Services\ProductService;
use App\Services\ProductServiceEloquent;
use App\Services\SetupStoreService;
use App\Services\SetupStoreServiceEloquent;
use App\Services\StoreService;
use App\Services\StoreServiceEloquent;
use App\Services\User_addressService;
use App\Services\User_addressServiceEloquent;
use App\Services\UserService;
use App\Services\UserServiceEloquent;
use App\Services\VariantService;
use App\Services\VariantServiceEloquent;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(serviceCity::class, CityServiceEloquent::class);
        $this->app->singleton(CityService::class, AnotherCityServiceEloquent::class);
        $this->app->singleton(DistrictService::class, DistrictServiceEloquent::class);
        $this->app->singleton(UserService::class, UserServiceEloquent::class);
        $this->app->singleton(StoreService::class, StoreServiceEloquent::class);
        $this->app->singleton(CategoryService::class, CategoryServiceEloquent::class);
        $this->app->singleton(ProductService::class, ProductServiceEloquent::class);
        $this->app->singleton(VariantService::class, VariantServiceEloquent::class);
        $this->app->singleton(SetupStoreService::class, SetupStoreServiceEloquent::class);
        $this->app->singleton(NotifieService::class, NotifieServiceEloquent::class);
        $this->app->singleton(CommentService::class, CommentServiceEloquent::class);
        $this->app->singleton(ImageService::class, ImageServiceEloquent::class);
//        $this->app->singleton(ProductImageService::class, ProductImageServiceEloquent::class);
        $this->app->singleton(CartService::class, CartServiceEloquent::class);
        $this->app->singleton(User_addressService::class, User_addressServiceEloquent::class);
        $this->app->singleton(OrderService::class, OrderServiceEloquent::class);
        $this->app->singleton(DetailOrderService::class, DetailOrderServiceEloquent::class);
        $this->app->singleton(DeliveryService::class, DeliveryServiceEloquent::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
