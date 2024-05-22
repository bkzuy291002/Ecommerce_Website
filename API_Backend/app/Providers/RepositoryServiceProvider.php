<?php

namespace App\Providers;

use App\Entities\Cart\CartRepositories;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartRepositoryEloquent;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryEloquent;
use App\Repositories\city\CityRepository;
use App\Repositories\City\CityRepositoryEloquent;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryEloquent;
use App\Repositories\Delivery\DeliveryRepository;
use App\Repositories\Delivery\DeliveryRepositoryEloquent;
use App\Repositories\DetailOrder\DetailOrderRepository;
use App\Repositories\DetailOrder\DetailOrderRepositoryEloquent;
use App\Repositories\districts\DistrictRepository;
use App\Repositories\districts\DistrictRepositoryEloquent;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryEloquent;
use App\Repositories\Notifie\NotifieRepository;
use App\Repositories\Notifie\NotifieRepositoryEloquent;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryEloquent;
use App\Repositories\Product\ProductReponsitoryElequent;
use App\Repositories\Product\ProductRespository;
use App\Repositories\product_variants\VariantRepository;
use App\Repositories\product_variants\VariantRepositoryEloquent;
use App\Repositories\ProductImage\ProductImageRepository;
use App\Repositories\ProductImage\ProductImageRepositoryEloquent;
use App\Repositories\SetupStore\SetupStoreRepository;
use App\Repositories\SetupStore\SetupStoreRepositoryEloquent;
use App\Repositories\Store\StoreReponsitory;
use App\Repositories\Store\StoreRepositoryEloquent;
use App\Repositories\User\UserReponsitory;
use App\Repositories\User\UserRepositoryEloquent;
use App\Repositories\User_address\User_addressRepository;
use App\Repositories\User_address\User_addressRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CityRepository::class, CityRepositoryEloquent::class);
        $this->app->singleton(DistrictRepository::class, DistrictRepositoryEloquent::class);
        $this->app->singleton(UserReponsitory::class, UserRepositoryEloquent::class);
        $this->app->singleton(StoreReponsitory::class, StoreRepositoryEloquent::class);
        $this->app->singleton(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->singleton(ProductRespository::class, ProductReponsitoryElequent::class);
        $this->app->singleton(VariantRepository::class, VariantRepositoryEloquent::class);
        $this->app->singleton(SetupStoreRepository::class, SetupStoreRepositoryEloquent::class);
        $this->app->singleton(NotifieRepository::class, NotifieRepositoryEloquent::class);
        $this->app->singleton(CommentRepository::class, CommentRepositoryEloquent::class);
        $this->app->singleton(ImageRepository::class,ImageRepositoryEloquent::class);
        $this->app->singleton(ProductImageRepository::class,ProductImageRepositoryEloquent::class);
        $this->app->singleton(CartRepository::class,CartRepositoryEloquent::class);
        $this->app->singleton(User_addressRepository::class,User_addressRepositoryEloquent::class);
        $this->app->singleton(OrderRepository::class,OrderRepositoryEloquent::class);
        $this->app->singleton(DetailOrderRepository::class,DetailOrderRepositoryEloquent::class);
        $this->app->singleton(DeliveryRepository::class,DeliveryRepositoryEloquent::class);


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
