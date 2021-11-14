<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumMatrixDiscipline extends Model
{
  protected $table = 'curriculum_matrix_disciplines';
  protected $fillable = [
    'name',
    'curriculum_matrix_id',
    'period',
  ];
}
