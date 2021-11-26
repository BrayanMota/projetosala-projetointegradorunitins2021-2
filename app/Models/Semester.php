<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  protected $table = 'semesters';
  protected $fillable = [
    'school_year',
    'course_id',
  ];

  public function courses() {
    return $this->belongsTo(Course::class, 'course_id');
  }

  public function offer_subjects() {
    return $this->hasOne(OfferSubject::class);
  }
}
