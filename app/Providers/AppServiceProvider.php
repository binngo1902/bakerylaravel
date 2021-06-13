<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\type_products;
use Illuminate\Support\Facades\View;
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
        $types = type_products::all();
        View::share('types',$types);
    }
}