<?php

namespace App\Repositories\Eloquent;

use App\Models\OfferSubject;
use App\Repositories\Interfaces\Eloquent\OfferSubjectRepositoryInterface;

class OfferSubjectRepository extends BaseRepository implements OfferSubjectRepositoryInterface
{
  private $offerSubject;

  public function __construct(OfferSubject $offerSubject)
  {
    parent::__construct($offerSubject);
    $this->offerSubject = $offerSubject;
  }

  public function listOfferSubject()
  {
    $this->offerSubject->select(
      'id',
      'semester_id',
      'weekday_id',
      'shift_id',
      'professor_id',
      'classroom_id',
      'subject_id'
    )
      ->with('semester:name')
      ->get();
  }
}
