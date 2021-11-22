<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
  protected $message = 'Erro';
  protected $code = 400;

  public function render()
  {
    return response()->json(['message' => $this->message], $this->code);
  }
}
