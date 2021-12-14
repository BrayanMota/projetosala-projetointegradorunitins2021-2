<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Response;

class MatrixController extends Controller
{
  public function index()
  {
    $opcoes = [
      'porPagina' => 10000,
      'OrderBy' => 'campus',
      'SortOrder' => 'desc',
    ];

    $_api_data = new ApiService('matriz', $opcoes);
    return response()->json(['matrices' => $_api_data(), 'message' => 'Success'], Response::HTTP_OK);
  }

  public function search($filtro)
  {
    $_filtro = [
      'campus' => $filtro,
    ];

    $opcoes = [
      'porPagina' => 10000,
      'OrderBy' => 'campus',
      'SortOrder' => 'desc',
    ];

    $_api_data = new ApiService('matriz', $opcoes, $_filtro);
    return response()->json(['matrices' => $_api_data(), 'message' => 'Success'], Response::HTTP_OK);
  }
}
