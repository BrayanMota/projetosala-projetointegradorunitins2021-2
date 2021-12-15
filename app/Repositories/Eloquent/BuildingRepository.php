<?php

namespace App\Repositories\Eloquent;

use App\Models\Building;
use App\Repositories\Interfaces\Eloquent\BuildingRepositoryInterface;

class BuildingRepository extends BaseRepository implements BuildingRepositoryInterface
{
  private $building;

  public function __construct(Building $building)
  {
    parent::__construct($building);
    $this->building = $building;
  }
}
