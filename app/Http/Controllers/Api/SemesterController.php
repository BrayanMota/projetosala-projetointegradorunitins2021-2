<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Semester;
use App\Repositories\Eloquent\SemesterRepository;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
  private $semesterRepository;

  public function __construct(SemesterRepository $semesterRepository)
  {
    $this->semesterRepository;
  }

  public function index(Request $request)
  {
    $datas = Semester::orderBy('school_year')->get();
    $message = $request->session()->get('message');
    return view('Semester.index', compact('datas', 'message'));
  }

  public function create()
  {
    $campus_select = Campus::orderBy('name')->get();
    return view('Semester.create', compact('campus_select'));
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
