<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        //PARA QIE LAS MIGRACIONES NO TENGAN ERRORES AL RELACIONAR
       Schema::defaultStringLength(191);

       //PARA EL PAGINADOR DE BOOSTRAP
        Paginator::useBootstrap();
    }
}
