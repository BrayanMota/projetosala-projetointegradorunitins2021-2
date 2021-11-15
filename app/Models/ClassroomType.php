<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomType extends Model
{
  protected $table = 'classroom_types';
  protected $fillable = [
    'name',
    'description',
  ];
}
