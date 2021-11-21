<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
  private $classroomRepository;

  public function __construct(Classroom $classroomRepository)
  {
    $this->classroomRepository = $classroomRepository;
  }

  public function index(Request $request)
  {
    $datas = Classroom::query()->orderBy('name')->get();
    $message = $request->session()->get('message');
    return view('Classroom.index', compact('datas', 'message'));
  }

  public function store(StoreClassroomRequest $request)
  {
    $data = $request->all();
    Classroom::create($inputs);

    try {
      $classroomRepository->store($data);
    } catch (Exception $e) {

      return response()->json();
    }
    $request->session()->flash(
      'message',
      'Sala cadastra com sucesso'
    );
    return response()->json();
  }
  // trabalho do Brayan NÃO APAGUE PF

  // public function show($id)
  // {
  //   $item = Classroom::find($id);
  //   return response()->json($item, 201);
  // }

  public function update(Request $request, $id)
  {
    $item = Classroom::find($id);
    $inputs = $request->all();
    $item->fill($inputs)->save();
    return response()->json([]);
  }

  public function destroy(Request $request, $id)
  {
    $semester = Classroom::find($id);
    $semester->delete();
    $request->session()->flash(
      'message',
      'Sala removida com sucesso'
    );
    return redirect()->route('classroom.index');
  }
}
