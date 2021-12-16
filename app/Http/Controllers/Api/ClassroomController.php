<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\Eloquent\ClassroomRepository;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
  private $classroomRepository;
  private $buildingRepository;

  public function __construct(ClassroomRepository $classroomRepository, BuildingRepository $buildingRepository)
  {
    $this->buildingRepository = $buildingRepository;
    $this->classroomRepository = $classroomRepository;
  }

  public function index()
  {
    $classrooms = $this->classroomRepository->all();

    return response()->json(['classrooms' => $classrooms, 'message' => 'Success!']);
  }

  public function store(ClassroomRequest $request)
  {
    $data_building = $request->only(['building', 'campus']);
    $data_classroom = $request->only(['name', 'max_students']);
    DB::transaction(function () use ($data_building, $data_classroom) {
      # create building
      $building = $this->buildingRepository->store([
        'name' => $data_building['building'],
        'campus' => $data_building['campus'],
      ]);

      # create classroom
      $data_classroom['building_id'] = $building->id;
      $this->classroomRepository->store($data_classroom);
    });

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
