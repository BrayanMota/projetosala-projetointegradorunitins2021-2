<?php

namespace App\Repositories\Eloquent;

use App\Models\Classroom;

class ClassroomRepository
{
  public function create(array $attr)
  {
    return Classroom::create($attr);
  }
}
