<?php

namespace App\Http\Controllers;

use App\Services\classroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
  private $classroomService;

  public function __construct(classroomService $classroomService)
  {
    
    $this->classroomService = $classroomService;
  }

  public function store(Request $request)
  {
    
    $this->classroomService->createData($request->all());
  }
}
