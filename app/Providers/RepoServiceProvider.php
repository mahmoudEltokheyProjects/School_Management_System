<?php

namespace App\Providers;

use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    // ++++++++++++++++++ register() +++++++++++++++++
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
