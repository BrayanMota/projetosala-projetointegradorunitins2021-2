<?php

namespace App\Http\Controllers\Api;

<<<<<<< HEAD
use App\Http\Requests\StoreClassroomRequest;
=======
use App\Http\Controllers\Controller;
>>>>>>> b8137138c93f9f2472340c456514986109a6b8c2
use App\Models\Classroom;
use Exception;
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

    $request->session()->flash(
      'message',
      'Sala cadastra com sucesso'
    );

    try {
      $this->classroomRepository->store($data);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()]);
    }

    dd(session('message'));

    return response()->json(['message' => session('message')], 201);
  }
  // trabalho do Brayan NÃO APAGUE PF

  // public function show($id)
  // {
  //   $item = Classroom::find($id);
  //   return response()->json($item, 201);
  // }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    try {
      $classroom = $this->classroomRepository->update($data, $id);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()]);
    }
    $request->session()->flash(
      'message',
      'Sala removida com sucesso'
    );

    return response()->json($classroom, 200);
  }

  public function destroy($id)
  {
    try {
      $this->classroomRepository->destroy($id);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()]);
    }

    return response()->json('');
  }
}
