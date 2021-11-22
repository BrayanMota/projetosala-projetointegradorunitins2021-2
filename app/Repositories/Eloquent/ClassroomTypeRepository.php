<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassroomType;

class ClassroomTypeRepository extends BaseRepository
{
  private $classroomType;

  public function __construct(ClassroomType $classroomType)
  {
    parent::__construct($classroomType);
    $this->classroomType = $classroomType;
  }
}
