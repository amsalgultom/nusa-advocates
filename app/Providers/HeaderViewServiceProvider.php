<?php

namespace App\Providers;

use App\Models\PracticeArea;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $lang = app()->getLocale();
            $practices = PracticeArea::select('name')
            ->where('lang', $lang)
            ->orderBy('id', 'asc')
            ->get();

            // Pass the formatted data to the view
            $view->with('footer_practices', $practices);
        });
    }
}
