<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Repositories\Eloquent\ClassroomRepository;
use Illuminate\Support\ServiceProvider;

class ClassroomProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(Classroom::class, fn($app) => new ClassroomRepository($app));
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
