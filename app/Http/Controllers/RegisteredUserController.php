<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;
use Hash;
use Auth;

class RegisteredUserController extends Controller
{
    public function create () {
        return view ('auth.register');

    }

    public function store (Request $request) {
            $name = $request->post('name');
            $email = $request->post('email');
            $password = Hash::make($request->password);

            $usuario = new User;
            $usuario->name=$name;
            $usuario->email=$email;
            $usuario->password=$password;
            
            //aplica INSER INTO
            $usuario->save();
            Auth::login($usuario);
            return redirect(url('/dashboard'));

            
        
    }
}
