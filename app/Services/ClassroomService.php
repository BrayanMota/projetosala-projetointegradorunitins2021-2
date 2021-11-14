<?php

namespace App\Services;

use App\Repositories\Eloquent\ClassroomRepository;
use Exception;

class classroomService
{
  private $classroomRepository;

  public function __construct(ClassroomRepository $classroomRepository)
  {
    $this->$classroomRepository = $classroomRepository;
  }
  public function createData(array $attr)
  {
    try {
      $classroom = $this->classroomRepository->create($attr);
      return $classroom;
    } catch (Exception $e) {
      return throw new Exception('Erro ao cadastrar');
    }
  }
}
