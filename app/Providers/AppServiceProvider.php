<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useTailwind();

        // Ensures $bestSellerTabs exists if `home` is rendered without HomeController (stale routes, Route::view, etc.).
        View::composer('home', function (\Illuminate\View\View $view): void {
            $data = $view->getData();
            if (! isset($data['bestSellerTabs'])) {
                $view->with('bestSellerTabs', HomeController::buildBestSellerTabs());
            }
        });
    }
}
