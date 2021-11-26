<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumMatrix extends Model
{
  protected $table = 'curriculum_matrices';
  protected $fillable = [
    'name',
  ];
  public function courses() {
    return $this->hasMany(Courses::class);
  }

  public function subjects() {
    return $this->hasMany(Subject::class);
  }
}
