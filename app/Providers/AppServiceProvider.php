<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

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
        Model::unguard();
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['es','en','fr']) // also accepts a closure
                ->visible(outsidePanels: true)
                ->displayLocale('es') // Sets Español as the language for label localization
                ->flags([
                    'es' => asset('images/flags/ve.svg'),
                    'fr' => asset('images/flags/fr.svg'),
                    'en' => asset('images/flags/us.svg'),
                ]);
                
        });
}
}
