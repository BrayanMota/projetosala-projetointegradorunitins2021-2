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
    try {
      $user = Socialite::driver('google')->stateless()->user();

      $finduser = User::where('google_id', $user->id)->first();

      if ($finduser) {

        Auth::login($finduser);

        return view('home');

      } else {
        $newUser = User::create([
          'role_id' => 1,
          'name' => $user->name,
          'email' => $user->email,
          'google_id' => $user->id,
          'password' => encrypt('123456dummy'),
        ]);

        Auth::login($newUser);

        return view('home');
      }

    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }

  public function logged()
  {
    return view('home');
  }

  public function profile($id)
  {
    $user = User::where('id',$id)->get();
    dd($user);
    return ;
  }
}
