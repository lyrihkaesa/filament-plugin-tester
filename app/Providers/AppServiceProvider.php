<?php

namespace App\Providers;

use Filament\Support\Assets\Js;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;

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
        Gate::policy(\Awcodes\Curator\Models\Media::class, \App\Policies\MediaPolicy::class);

        FilamentAsset::register([
            Js::make('preline-script', __DIR__ . '/../../node_modules/preline/dist/preline.js'),
        ]);
    }
}
