<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class PublicController extends Controller
{
  public function getCoursesByCampusId($id)
  {
    $data = Course::where('campus_id', $id)->get();
    return response()->json($data);
  }
}
