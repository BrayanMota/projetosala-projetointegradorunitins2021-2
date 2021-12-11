<?php

namespace App\Repositories\Interfaces\Eloquent;

interface OfferSubjectRepositoryInterface
{
  public function listOfferSubject();
  public function store(array $attr);
  public function update(array $attr, $id);
  public function delete($id);
  public function find($id);
}
