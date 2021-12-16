<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  protected $table = 'buildings';
  protected $fillable = [
    'name',
    'campus',
  ];

  public function classrooms()
  {
    return $this->hasMany(Classroom::class);
  }
}
