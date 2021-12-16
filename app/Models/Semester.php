<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  protected $table = 'semesters';
  protected $fillable = [
    'school_year',
    'course',
    'matrix_curricular_id',
  ];

  public function offer_subjects()
  {
    return $this->hasOne(OfferSubject::class);
  }
}
