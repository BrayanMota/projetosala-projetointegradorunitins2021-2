<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferSubjectsRequest;
use App\Repositories\Interfaces\Eloquent\OfferSubjectRepositoryInterface;

class OfferSubjectController extends Controller
{
  private $offerSubjectRepository;

  public function __construct(OfferSubjectRepositoryInterface $offerSubjectRepositoryInterface)
  {
    $this->offerSubjectRepository = $offerSubjectRepositoryInterface;
  }

  public function index()
  {
    $data = $this->offerSubjectRepository->listOfferSubject();

    return response()->json(['OfferSubjects' => $data, 'message' => 'Success'], 200);
  }

  public function store(OfferSubjectsRequest $request)
  {
    $data = $request->all();
    $this->offerSubjectRepository->store($data);

    return response()->json(['message' => 'OfferSubject successfully save'], 201);
  }

  public function update(OfferSubjectsRequest $request, $id)
  {
    $data = $request->all();

    if (!$this->offerSubjectRepository->update($data, $id)) {
      throw new ModelUpdateNotFound();
    }

    return response()->json(['message' => 'OfferSubject successfully updated'], 200);
  }

  public function show($id)
  {
    $classroomType = $this->offerSubjectRepository->find($id);

    return response()->json([
      'classroomType' => $classroomType,
      'message' => 'Success',
    ], 200);
  }

  public function destroy($id)
  {
    $this->offerSubjectRepository->delete($id);

    return response()->json(['message' => 'OfferSubject successfully removed'], 200);
  }
}
