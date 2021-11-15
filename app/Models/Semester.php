<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  protected $table = 'semesters';
  protected $fillable = [
    'school_year',
    'course_id',
    'matrix_curricular_id',
  ];
}
