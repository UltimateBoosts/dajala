<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
class AuthController extends Controller
{
    //

    public function login(Request $request) {
            $user = $request->user;
            $password = $request->password;
            $user = User::where('user', $user)->first();
            if($user){
                if(Hash::check($password,$user->getPass())) {
                    Auth::loginUsingId($user->id);
                    return redirect('admin/blog');
                } else {
                    $message = new MessageBag(["error" => "El usuario o contraseña no coinciden"]); 
                    return back()->withErrors($message);
                }
            }else {
                $message = new MessageBag(["error" => "El usuario no existe"]); 
                return back()->withErrors($message);
            }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/dashboard');
      }
}
