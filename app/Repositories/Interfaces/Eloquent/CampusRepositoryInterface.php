<?php

namespace App\Repositories\Interfaces\Eloquent;

interface CampusRepositoryInterface
{
  public function all();
  public function store();
  public function update();
  public function delete();
  public function find();
}
