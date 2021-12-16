<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function loginWithGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function callbackFromGoogle()
  {
    // $data = $request->validate([
    //   'email' => ['regex:/^[A-Za-z0-9]+[@][u][n][i][t][i][n][s][.][b][r]$/'],
    // ]);

    try {

      $user = Socialite::driver('google')->stateless()->user();

      $finduser = User::where('google_id', $user->id)->first();

      if ($finduser) {

        Auth::login($finduser);
        return response()->json(['message' => 'Usuario logado com sucesso'], 200);

      } else {
        $newUser = User::create([
          'role_id' => 1,
          'name' => $user->name,
          'email' => $user->email,
          'google_id' => $user->id,
          'password' => encrypt('123456dummy'),
        ]);
        Auth::login($newUser);
        return response()->json(['message' => 'Usuario logado com sucesso'], 200);
      }

    } catch (Exception $e) {
      dd($e);
      return response()->json(['message' => 'Falha ao entrar tente novamente mais tarde'], 500);
    }
  }

  public function profile()
  {
    $users = auth()->user();
    return response()->json(['name' => $users->name, 'email' => $users->email], 200);
  }

  public function logout()
  {
    $users = auth()->user();
    if ($users == null) {
      return response()->json(['message' => 'Falha ao deslogar'], 500);
    }
    auth()->logout();
    return response()->json(['message' => 'Logout realizado com sucesso'], 200);
  }
}
