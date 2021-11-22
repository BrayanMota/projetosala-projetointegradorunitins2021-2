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

  public function building()
  {
    return $this->hasMany(Building::class, 'id', 'building_id');
  }

}
