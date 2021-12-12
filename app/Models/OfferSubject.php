<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSubject extends Model
{
  protected $table = 'offer_subjects';
  protected $fillable = [
    'semester_id',
    'weekday_id',
    'shift_id',
    'professor_id',
    'classroom_id',
    'subject_id',
  ];

  public function semesters()
  {
    return $this->belongsTo(Semester::class, 'semester_id');
  }

  public function weekdays()
  {
    return $this->belongsTo(Weekday::class, 'weekday_id');
  }

  public function shifts()
  {
    return $this->belongsTo(Shift::class, 'shift_id');
  }

  public function professors()
  {
    return $this->belongsTo(Professor::class, 'professor_id');
  }

  public function classrooms()
  {
    return $this->belongsTo(Classroom::class, 'classroom_id');
  }

  public function subjects()
  {
    return $this->belongsTo(Subject::class, 'subject_id');
  }

  public function offer_subject_time_on_weekdays()
  {
    return $this->hasMany(OfferSubjectTimeOnWeekday::class);
  }
}
