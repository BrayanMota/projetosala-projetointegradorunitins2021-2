<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Repositories\Eloquent\ClassroomRepository;

class ClassroomController extends Controller
{
  private $classroomRepository;

  public function __construct(ClassroomRepository $classroomRepository)
  {
    $this->classroomRepository = $classroomRepository;
  }

  public function index()
  {
    $classrooms = $this->classroomRepository->all();

    return response()->json(['classrooms' => $classrooms, 'message' => 'Success!']);
  }

  public function store(ClassroomRequest $request)
  {
    $data = $request->all();
    $this->classroomRepository->store($data);

    return response()->json(['message' => 'Classroom successfully save'], 201);
  }

  public function update(ClassroomRequest $request, $id)
  {
    $data = $request->all();

    if (!$this->classroomRepository->update($data, $id)) {
      throw new ModelUpdateNotFound();
    };

    return response()->json([
      'message' => 'Classroom successfully updated',
    ], 200);
  }

  public function destroy($id)
  {
    $this->classroomRepository->delete($id);

    return response()->json(['message' => 'Classroom successfully removed']);
  }
}
