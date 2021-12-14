<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Response;

class ProfessorController extends Controller
{
  public function index()
  {
    $opcoes = [
      'porPagina' => 10000,
      'OrderBy' => 'nome',
      'SortOrder' => 'desc',
    ];

    $_api_data = new ApiService('professores', $opcoes);
    return response()->json(['professors' => $_api_data(), 'message' => 'Success'], Response::HTTP_OK);
  }

  public function search($filtro)
  {
    $_filtro = [
      'nome' => $filtro,
    ];

    $opcoes = [
      'porPagina' => 10000,
      'OrderBy' => 'nome',
      'SortOrder' => 'desc',
    ];

    $_api_data = new ApiService('professores', $opcoes, $_filtro);
    return response()->json(['professors' => $_api_data(), 'message' => 'Success'], Response::HTTP_OK);
  }
}
