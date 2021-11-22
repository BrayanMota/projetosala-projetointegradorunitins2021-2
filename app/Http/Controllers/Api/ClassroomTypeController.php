<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomTypeRequest;
use App\Repositories\Eloquent\ClassroomTypeRepository;

class ClassroomTypeController extends Controller
{
  private $classroomTypeRepository;

  public function __construct(ClassroomTypeRepository $classroomTypeRepository)
  {
    $this->classroomTypeRepository = $classroomTypeRepository;
  }

  public function index()
  {
    $data = $this->classroomTypeRepository->all();

    return response()->json(['ClassroomTypes' => $data, 'message' => 'Success'], 200);
  }

  public function store(ClassroomTypeRequest $request)
  {
    $data = $request->all();
    $this->classroomTypeRepository->store($data);

    return response()->json(['message' => 'Classroom type successfully save'], 201);
  }

  public function update(ClassroomTypeRequest $request, $id)
  {
    $data = $request->all();

    if (!$this->classroomTypeRepository->update($data, $id)) {
      throw new ModelUpdateNotFound();
    }

    return response()->json(['message' => 'Classroom type successfully updated'], 200);
  }

  public function show($id)
  {
    $classroomType = $this->classroomTypeRepository->find($id);

    return response()->json([
      'classroomType' => $classroomType,
      'message' => 'Success',
    ], 200);
  }

  public function destroy($id)
  {
    $this->classroomTypeRepository->delete($id);

    return response()->json(['message' => 'Classroom type successfully removed'], 200);
  }
}
