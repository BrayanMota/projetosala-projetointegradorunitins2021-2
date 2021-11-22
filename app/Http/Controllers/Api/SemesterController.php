<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Repositories\Eloquent\SemesterRepository;
use Exception;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
  private $semesterRepository;

  public function __construct(SemesterRepository $semesterRepository)
  {
    $this->semesterRepository = $semesterRepository;
  }

  public function index()
  {
    $data = $this->semesterRepository->listAll();

    return response()->json(['semesters' => $data, 'message' => 'Success'], 200);
  }

  public function store(SemesterRequest $request)
  {
    $data = $request->all();
    $semester = $this->semesterRepository->store($data);

    return response()->json(['semester' => $semester, 'message' => 'Success'], 201);
  }

  public function show($id)
  {
    try {
      $semester = $this->semesterRepository->find($id);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
    return response()->json($semester, 200);
  }

  public function update(SemesterRequest $request, $id)
  {

    $data = $request->all();
    if (!$this->semesterRepository->update($data, $id)) {
      throw new ModelUpdateNotFound();
    };

    return response()->json(['message' => 'Success'], 200);
  }

  public function destroy(Request $request, $id)
  {
    $this->semesterRepository->delete($id);

    return response()->json(['message' => 'Semester successfully removed'], 200);
  }
}
