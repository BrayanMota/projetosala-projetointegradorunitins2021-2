<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  protected $table = 'classrooms';
  protected $fillable = [
    'building_id',
    'classroom_type_id',
    'max_students',
  ];
}
