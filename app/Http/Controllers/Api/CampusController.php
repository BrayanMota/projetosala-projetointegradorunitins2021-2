<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampusRequest;
use App\Repositories\Interfaces\Eloquent\CampusRepositoryInterface;

class CampusController extends Controller
{
  private $campusRepository;

  public function __construct(CampusRepositoryInterface $campusRepositoryInterface)
  {
    $this->campusRepository = $campusRepositoryInterface;
  }

  public function index()
  {
    $data = $this->campusRepository->all();

    return response()->json(['Campus' => $data, 'message' => 'Success'], 200);
  }

  public function store(CampusRequest $request)
  {
    $data = $request->all();
    $this->campusRepository->store($data);

    return response()->json(['message' => 'Campus successfully save'], 201);
  }

  public function update(CampusRequest $request, $id)
  {
    $data = $request->all();

    if (!$this->campusRepository->update($data, $id)) {
      throw new ModelUpdateNotFound();
    }

    return response()->json(['message' => 'Campus successfully updated'], 200);
  }

  public function show($id)
  {
    $classroomType = $this->campusRepository->find($id);

    return response()->json([
      'classroomType' => $classroomType,
      'message' => 'Success',
    ], 200);
  }

  public function destroy($id)
  {
    $this->campusRepository->delete($id);

    return response()->json(['message' => 'Campus successfully removed'], 200);
  }
}
