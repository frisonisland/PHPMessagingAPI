<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiLoginController extends Controller
{

  public function authenticate(Request $request)
  {
    //username is email
      $credentials = ["email"=>$request->input('username'),
                      "password"=>$request->input('password')];
      if (Auth::once($credentials)) {
          // Authentication passed...
          $user = Auth::user();
          $token = $user->createToken();
          return ["token" => $token];
      }
      return ["token" => ""];
  }
}
