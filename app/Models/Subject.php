<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
  protected $table = 'subjects';
  protected $fillable = [
    'name',
    'curriculum_matrix_id',
    'period',
  ];
}
