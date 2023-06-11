<?php

namespace App\Providers;

use App\Interfaces\AktifitasInterface;
use App\Interfaces\PemakaianInterface;
use App\Interfaces\UsersInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UsersRepository;
use App\Interfaces\PemesananInterface;
use App\Interfaces\ServisInterface;
use App\Repositories\AktifitasRepository;
use App\Repositories\ServisRepository;
use App\Repositories\PemakaianRepository;
use App\Repositories\PemesananRepository;
use App\Repositories\CustomLoggerRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UsersInterface::class, UsersRepository::class);
        $this->app->bind(PemesananInterface::class, PemesananRepository::class);
        $this->app->bind(PemakaianInterface::class, PemakaianRepository::class);
        $this->app->bind(ServisInterface::class, ServisRepository::class);
        $this->app->bind(AktifitasInterface::class, AktifitasRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
