<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\VerificationController;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use App\Models\Admin;

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
    protected $redirectTo = ('/afterauth');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ShowLoginForm()
    {
      return view('admin.admin_auth.auth.login');
    }
    public function login(Request $request)
    {

      $request->validate([
          'email' => 'required|string',
          'password' => 'required|string',
      ]);

      $admin = Admin::where('email', $request->email)->first();
      if (!is_null($admin)) {
        if ($admin->type == 1) {
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.afterauth'));
          }
        }
        else{
          if (!is_null($admin)) {
            $admin->notify(new VerifyRegistration($admin));
            session()->flash('success', 'A new verification code has been sent to your email');
            return back();
          }
      }
    }
    else {
      session()->flash('success', 'Please register first');
      return redirect()->back();
    }
  }
  public function logout(Request $request)
  {
      $this->guard()->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return $this->loggedOut($request) ?: redirect()->route('admin.login');
  }
}
