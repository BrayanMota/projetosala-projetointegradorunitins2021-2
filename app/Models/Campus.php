<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
  protected $table = 'campus';
  protected $fillable = [
    'name',
  ];

  public function courses(){
    return $this->hasMany(Course::class);
  }
  public function buildings(){
    return $this->hasMany(Building::class);
  }
}
