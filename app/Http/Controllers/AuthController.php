<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required | string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required',
            'gender' => 'required',
            'password' => 'required | min:6|confirmed',
        ]);


        // dd($data);
        // $data['password'] = bcrypt($request->password);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'image' => 'profile/default.png',
            'password' => bcrypt($data['password']),
            'role_id' => 3
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);


    }

    public function login(Request $request){
        $data = $request->all();

        if(!Auth::attempt($data)){
            return response(
               [ 'message' => 'Usuario/Password Incorretos'], 403
            );
        }
        
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ],200);
   
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout sucesso',
        ],200);
    }


    public function user($user){
        return response([
            //'user' => auth()->user()
            'user' => User::find($user)
        ],200);
    }
}
