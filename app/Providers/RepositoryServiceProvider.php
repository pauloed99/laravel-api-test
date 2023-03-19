<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBookRepository::class, BookRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);         
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
