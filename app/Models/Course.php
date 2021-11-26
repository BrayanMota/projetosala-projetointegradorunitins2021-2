<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';
  protected $fillable = [
    'name',
    'campus_id',
    'curriculum_mastrix_id'
  ];
  public function campus() {
    return $this->belongsTo(Campus::class, 'campus_id');
  }

  public function semesters() {
    return $this->hasMany(Semesters::class);
  }

  public function curriculum_matrices() {
    return $this->belongsTo(CurriculumMatrix::class, 'curriculum_matrix_id');
  }
}
