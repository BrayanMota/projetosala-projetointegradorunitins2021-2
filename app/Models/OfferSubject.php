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
}
