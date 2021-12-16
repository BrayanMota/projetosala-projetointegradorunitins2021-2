<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ModelUpdateNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferSubjectsRequest;
use App\Models\OfferSubjectOnTimeWeekday;
use App\Repositories\Interfaces\Eloquent\OfferSubjectRepositoryInterface;
use Illuminate\Support\Facades\DB;

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
    $data = $request->offer_subjects;
    $period = $request->period;
    foreach ($data as $offerSubject) {
      DB::transaction(function () use ($offerSubject, $period) {
        $data_offersubject = $this->offerSubjectRepository->store([
          'semester_id' => $offerSubject['semester_id'],
          'weekday_id' => $offerSubject['weekday_id'],
          'shift_id' => $offerSubject['shift_id'],
          'professor' => $offerSubject['professor'],
          'classroom_id' => $offerSubject['classroom_id'],
          'subject_id' => $offerSubject['subject'],
          'period' => $period,
        ]);
        $data_offersubjectOnTimeWeekdays = $offerSubject['offer_subject_time_on_weekdays'];
        foreach ($data_offersubjectOnTimeWeekdays as $data_offersubjectOnTimeWeekday) {
          $data = $data_offersubjectOnTimeWeekday;
          $data['offer_subject_id'] = $data_offersubject->id;
          $data['active'] = true;
          OfferSubjectOnTimeWeekday::create($data);
        }
      });
    }

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
