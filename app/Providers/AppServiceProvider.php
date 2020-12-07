<?php

namespace App\Providers;

use App\Models\Panel\MenuItem;
use App\Repositories\MenuItemRepository;
use App\Repositories\MenuItemRepositoryInterface;
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
        $this->app->bind(
            MenuItemRepositoryInterface::class,
            MenuItemRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('panel.*', function ($view) {
            $menuItems = MenuItem::getTree();
            $view->with(['menuItems' => $menuItems]);
        });
    }
}
