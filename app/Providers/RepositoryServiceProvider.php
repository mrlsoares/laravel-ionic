<?php

namespace Entrega\Providers;

use Entrega\Repositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Repositories\CategoryRepository::class,
                         Repositories\CategoryRepositoryEloquent::class);

        $this->app->bind(Repositories\ClientRepository::class,
            Repositories\ClientRepositoryEloquent::class);

        $this->app->bind(Repositories\ProductRepository::class,
            Repositories\ProductRepositoryEloquent::class);

        $this->app->bind(Repositories\OrderRepository::class,
            Repositories\OrderRepositoryEloquent::class);


        $this->app->bind(Repositories\OrderItemRepository::class,
            Repositories\OrderItemRepositoryEloquent::class);

        $this->app->bind(Repositories\CupomRepository::class,
            Repositories\CupomRepositoryEloquent::class);

        $this->app->bind(Repositories\UserRepository::class,
            Repositories\UserRepositoryEloquent::class);

    }
}
