<?php

namespace App\Exceptions;

use Exception;

class ModelUpdateNotFound extends Exception
{
  protected $message = 'Model error updated';
  protected $code = 403;

  public function render()
  {
    return response()->json(['message' => $this->message], $this->code);
  }
}
