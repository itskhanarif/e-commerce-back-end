<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\VerificationController;
use App\Models\User;
use App\Notifications\VerifyRegistration;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = ('/');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
      $request->validate([
          'email' => 'required|string',
          'password' => 'required|string',
      ]);

      $user = User::where('email', $request->email)->first();
      if (!is_null($user)) {
        if ($user->status == 1) {
          if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('index'));
          }
        }
        else{
          if (!is_null($user)) {
            $user->notify(new VerifyRegistration($user));
            session()->flash('success', 'A new verification code has been sent to your email');
            return back();
          }
      }
    }
    else {
      session()->flash('success', 'Please register first');
      return redirect()->route('register');
    }
  }
}
