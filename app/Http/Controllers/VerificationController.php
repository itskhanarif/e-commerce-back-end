<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
  public function verify($token)
  {
    $user = User::where('remember_token', $token)->first();
    if (!is_null($user)) {
      $user->status = 1;
      $user->remember_token = NULL;
      $user->save();
      session()->flash('success', 'Your email has been verified');
      return redirect('login');
    }
    else{
      session()->flash('errors', 'Sorry! Your token does not match with any user');
      return redirect()->route('register');
    }
  }

}
