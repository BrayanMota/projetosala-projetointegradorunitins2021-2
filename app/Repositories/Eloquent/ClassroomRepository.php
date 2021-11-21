<?php

namespace App\Repositories\Eloquent;

use App\Models\Classroom;

class ClassroomRepository extends BaseRepository
{
  private $classroom;

  public function __construct(Classroom $classroom)
  {
    parent::__construct($classroom);
    $this->classroom = $classroom;
  }

}
