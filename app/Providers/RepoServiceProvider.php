<?php

namespace App\Providers;

use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    // ++++++++++++++++++ register() +++++++++++++++++
    public function register()
    {
        //  Binging Between "TeacherRepositoryInterface" , "TeacherRepository"
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        //  Binging Between "StudentPepositoryInterface" , "StudentPepository"
        $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
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
