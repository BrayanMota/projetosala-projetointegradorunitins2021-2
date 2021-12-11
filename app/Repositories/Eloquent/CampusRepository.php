<?php

namespace App\Repositories\Eloquent;

use App\Models\Campus;
use App\Repositories\Interfaces\Eloquent\CampusRepositoryInterface;

class CampusRepository extends BaseRepository implements CampusRepositoryInterface
{
  private $campus;

  public function __construct(Campus $campus)
  {
    parent::__construct($campus);
    $this->campus = $campus;
  }
}
