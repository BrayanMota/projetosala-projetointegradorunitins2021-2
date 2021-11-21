<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Validator;

class SemesterController extends Controller
{
  public function index(Request $request)
  {
    $datas = Semester::query()->orderBy('school_year')->get();
    $message = $request->session()->get('message');
    return view('Semester.index', compact('datas', 'message'));
  }

  public function create()
  {
    return view('Semester.create');
  }

  public function store(Request $request)
  {
    $inputs = $request->all();
    Semester::create($inputs);
    $request->session()->flash(
      'message',
      'Semestre cadastro com sucesso'
    );
    return redirect()->route('semester.index');
  }

  public function show($id)
  {
    $item = Semester::find($id);
    return response()->json($item);
  }

  public function update(Request $request, $id)
  {
    $item = Semester::find($id);
    $inputs = $request->all();
    $item->fill($inputs)->save();
    return response()->json([]);
  }

  public function destroy(Request $request, $id)
  {
    $semester = Semester::find($id);
    $semester->delete();
    $request->session()->flash(
      'message',
      'Semestre removido com sucesso'
    );
    return redirect()->route('semester.index');
  }
}
