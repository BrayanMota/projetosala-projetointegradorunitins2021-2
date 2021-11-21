<?php

namespace App\Providers;

use App\Http\Controllers\SemesterController;
use App\Repositories\Eloquent\SemesterRepository;
use Illuminate\Support\ServiceProvider;

class SemesterProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(SemesterController::class, fn($app) => new SemesterRepository($app));
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
