<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $table = 'subjects';
  protected $fillable = [
    'name',
    'curriculum_matrix_id',
    'period',
  ];

  public function curriculum_matrices() {
    return $this->belongsTo(CurriculumMatrix::class, 'curriculum_matrix_id');
  }

  public function offer_subjects() {
    return $this->hasOne(OfferSubject::class);
  }
}
