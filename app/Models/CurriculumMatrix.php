<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumMatrix extends Model
{
  protected $table = 'curriculum_matrices';
  protected $fillable = [
    'name',
    'course_id',
  ];
}
