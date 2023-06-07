<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = User::all();

        return view('dashboard.list-account',[
            'users' => $data,
        ]);
    }

}
