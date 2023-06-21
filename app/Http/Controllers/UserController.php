<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::all();

        return view('dashboard.admin.account.list-account',[
            'users' => $data,
        ]);
    }

    public function edit(string $id){
        return view('dashboard.account.edit-account',[
            'data' => User::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
            'role' => 'required|in:admin,cashier,chef',
        ]);

        User::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]
        );

        return response()->redirectToRoute('list-account');
    }

    public function destroy(string $id){
        User::findOrfail($id)->delete();

        return response()->redirectToRoute('list-account');
    }

}
