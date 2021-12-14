<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
  /**
   * A list of the exception types that are not reported.
   *
   * @var array
   */
  protected $dontReport = [
    //
  ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register()
  {
    $this->reportable(function (Throwable $e) {
      return response()->json(['message' => 'System error, We are working so that you can get back to using our application soon. Come back soon.'], 400);
    });

    $this->renderable(function (QueryException $exception, $request) {
      if ($request->is('api/*')) {
        return response()->json(['massage' => 'Database error, We are working so that you can get back to using our application soon. Come back soon.',
          'sql' => $exception->getMessage()], 401);
      }
    });

    $this->renderable(function (ValidationException $exception, $request) {
      if ($request->is('api/*')) {
        return response()->json($exception->errors(), $exception->status);
      }
    });

    $this->renderable(function (ClassNotFoundException $exception) {
      return response()->json(['message' => 'Class error, We are working so that you can get back to using our application soon. Come back soon.'], 402);
    });

    $this->renderable(function (NotFoundHttpException $exception, $request) {
      if ($request->is('api/*')) {
        return response()->json([
          'message' => 'Record not found.',
        ], 404);
      }
    });
  }
}
