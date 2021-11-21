<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
  public function index(Request $request)
  {
    $datas = Classroom::query()->orderBy('name')->get();
    $message = $request->session()->get('message');
    return view('Classroom.index', compact('datas', 'message'));
  }

  public function create()
  {
    return view('Classroom.create');
  }

  public function store(Request $request)
  {
    $inputs = $request->all();
    Classroom::create($inputs);
    $request->session()->flash(
      'message',
      'Sala cadastra com sucesso'
    );
    return redirect()->route('classroom.index');
  }

  public function show($id)
  {
    $item = Classroom::find($id);
    return response()->json($item);
  }

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
