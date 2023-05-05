<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){


        $data = User::all();
       
        return view('Admin.pages.User.index', compact('request', 'data'));
    }
}
