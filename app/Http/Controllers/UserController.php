<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
      //get current user
      $user = $request->user();
      return ["user" => $user];
    }
}
