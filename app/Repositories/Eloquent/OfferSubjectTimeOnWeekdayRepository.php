<?php

namespace App\Repositories\Eloquent;

use App\Models\OfferSubjectOnTimeWeekday;
use App\Models\OfferSubjectTimeOnWeekday;
use App\Repositories\Interfaces\Eloquent\OfferSubjectTimeOnWeekdayRepositoryInterface;

class OfferSubjectTimeOnWeekdayRepository extends BaseRepository implements OfferSubjectTimeOnWeekdayRepositoryInterface
{
  private $OfferSubjectTimeOnWeekday;

  public function __construct(OfferSubjectOnTimeWeekday $model)
  {
    parent::__construct($model);
    $this->OfferSubjectTimeOnWeekday = $model;
  }

}
