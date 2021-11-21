<?php

namespace App\Repositories\Eloquent;

use App\Models\Semester;

class SemesterRepository extends BaseRepository
{
  private $semester;

  public function __construct(Semester $semester)
  {
    parent::__construct($semester);
    $this->semester = $semester;
  }

}
