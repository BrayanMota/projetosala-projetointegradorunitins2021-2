<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
  protected $table = 'shifts';
  protected $fillable = [
    'name',
  ];
}
