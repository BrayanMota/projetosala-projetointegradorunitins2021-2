<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  protected $table = 'buildings';
  protected $fillable = [
    'name',
  ];

  public function campus()
  {
    return $this->belongsTo(Campus::class, 'campus_id');
  }

  public function classrooms()
  {
    return $this->hasMany(Classroom::class);
  }
}
