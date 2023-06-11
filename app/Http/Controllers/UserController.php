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

    public function destroy(string $id){
        User::findOrfail($id)->delete();

        return response()->redirectToRoute('list-account');
    }

}
