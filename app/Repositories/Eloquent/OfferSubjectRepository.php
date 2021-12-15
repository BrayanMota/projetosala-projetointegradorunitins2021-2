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
    return $this->offerSubject->select(
      'id',
      'semester_id',
      'weekday_id',
      'shift_id',
      'professor',
      'classroom_id',
      'subject_id'
    )
    #join's
      ->with('shifts:id,name')
      ->with('classrooms:id,name')
      ->with('weekdays:id,name')
      ->with('semesters:id,school_year')

      ->get();
  }

  public function createOfferSubject()
  {

  }
}
