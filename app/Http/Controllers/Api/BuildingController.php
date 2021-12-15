<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Eloquent\BuildingRepositoryInterface;
use Illuminate\Http\Response;

class BuildingController extends Controller
{

  private $buildingRepository;

  public function __construct(BuildingRepositoryInterface $buildingRepositoryInterface)
  {
    $this->buildingRepository = $buildingRepositoryInterface;
  }

  public function index()
  {
    $data = $this->buildingRepository->all();

    return response()->json(['buildings' => $data, 'message' => 'Success'], Response::HTTP_OK);
  }
}
