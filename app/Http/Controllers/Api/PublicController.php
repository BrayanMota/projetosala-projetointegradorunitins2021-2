<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;

class PublicController extends Controller
{
  public function getCoursesByCampusId($id)
  {
    $data = Course::where('campus_id', $id)->get();
    return response()->json($data);
  }
}
