<?php
  
namespace App\Http\Controllers\Api;
  
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
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
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect('/dashboard');
       
            }else{
                $newUser = User::create([
                    'role_id' => 1,
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect('/dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logged()
    {
        return view('home');
    }

    public function perfil()
    {
        return dd(Auth::user());
    }
}