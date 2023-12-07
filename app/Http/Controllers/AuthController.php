<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            if((int)$user->role_id == 1){
                return redirect(route('client.dashboard'));
            }else{
                if((int)$user->role_id != 4){
                return redirect(route('admin.dashboard'));
                }
                return redirect(route('admin.users'));
            }
        }else{
            return back()->withInput()->withErrors("Email или пароль неправильный");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
