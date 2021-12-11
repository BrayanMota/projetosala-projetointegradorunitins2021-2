<?php

namespace App\Providers;

use App\Repositories\Eloquent\CampusRepository;
use App\Repositories\Eloquent\OfferSubjectRepository;
use App\Repositories\Interfaces\Eloquent\CampusRepositoryInterface;
use App\Repositories\Interfaces\Eloquent\OfferSubjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    # Campus
    $this->app->bind(CampusRepositoryInterface::class, CampusRepository::class);

    #Offer subject
    $this->app->bind(OfferSubjectRepositoryInterface::class, OfferSubjectRepository::class);
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
