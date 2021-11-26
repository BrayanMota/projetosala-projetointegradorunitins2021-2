<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  protected $table = 'classrooms';
  protected $fillable = [
    'name',
    'building_id',
    'classroom_type_id',
    'max_students',
  ];

  public function buildings()
  {
    return $this->belongsTo(Building::class, 'building_id');
  }
  
  public function classroom_types(){
    return $this->belongsTo(ClassroomType::class, 'classroom_type_id');
  }

  public function offer_subjects() {
    return $this->hasOne(OfferSubject::class);
  }
}
