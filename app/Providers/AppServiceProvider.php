<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
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
        //
        

        Blade::component('layouts.navigation', 'navigation');
        Blade::component('layouts.main', 'main');
        Blade::component('layouts.nav', 'nav');
        Blade::component('layouts.image', 'image');
        Blade::component('layouts.footer', 'footer');
        Blade::component('layouts.card', 'card');
        Blade::component('layouts.logo', 'logo');
        Blade::component('layouts.header', 'header');
        Blade::component('layouts.service-details', 'service-details');
        Blade::component('layouts.service-images', 'service-images');
        Blade::component('layouts.serviceItem', 'serviceItem');
        Blade::component('layouts.service-card', 'service-card');
        Blade::component('layouts.service-cardOld', 'service-cardOld');
        Blade::component('layouts.service-card2', 'service-card2');
        Blade::component('layouts.hero', 'hero');
        Blade::component('layouts.dynamic-icon', 'dynamic-icon');
        Blade::component('layouts.services-grid', 'services-grid');
        Blade::component('layouts.category-description', 'category-description');
        Blade::component('layouts.video-carousel', 'video-carousel');
    }
}
