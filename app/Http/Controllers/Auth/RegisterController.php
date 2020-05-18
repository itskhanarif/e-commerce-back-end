<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use  App\Notifications\VerifyRegistration;
use App\Models\Division;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'phone_no' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $user =  User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'district_id' => $request->district,
            'division_id' => $request->division,
            'remember_token' => Str::random(50),
            'status' => 0,
            'avatar' => NULL,
        ]);
        $user->notify(new VerifyRegistration($user));
        session()->flash('success', 'A verification code has been sent to your email');
        return back();
    }
    public function showRegistrationForm()
    {
        $districts = District::all();
        $divisions = Division::all();
        return view('auth.register')->with('districts', $districts)->with('divisions', $divisions);
    }
}
