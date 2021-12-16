<?php

namespace App\Providers;

use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\Eloquent\CampusRepository;
use App\Repositories\Eloquent\OfferSubjectRepository;
use App\Repositories\Eloquent\OfferSubjectTimeOnWeekdayRepository;
use App\Repositories\Interfaces\Eloquent\BuildingRepositoryInterface;
use App\Repositories\Interfaces\Eloquent\CampusRepositoryInterface;
use App\Repositories\Interfaces\Eloquent\OfferSubjectRepositoryInterface;
use App\Repositories\Interfaces\Eloquent\OfferSubjectTimeOnWeekdayRepositoryInterface;
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

    # Offer subject
    $this->app->bind(OfferSubjectRepositoryInterface::class, OfferSubjectRepository::class);

    # Building
    $this->app->bind(BuildingRepositoryInterface::class, BuildingRepository::class);

    # OfferSubjects
    $this->app->bind(OfferSubjectRepositoryInterface::class, OfferSubjectRepository::class);

    # OfferSubjectsOnTimeWeekdays
    $this->app->bind(OfferSubjectTimeOnWeekdayRepositoryInterface::class, OfferSubjectTimeOnWeekdayRepository::class);

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
