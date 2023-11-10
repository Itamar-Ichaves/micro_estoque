<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use App\Observers\UnitObserver;
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
        
       
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Unit::observe(UnitObserver::class);
      

    }
}
