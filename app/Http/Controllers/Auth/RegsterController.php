<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegsterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
    public function store(Request $request) {

        $request->request->add(['username' => Str::slug($request->username) ]);//reescribir el Request 
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:3|max:60',

        ]);
        
            //Str::slug -> url
            //Str::lower -> minusculas
                User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
                //Autenticaar al usuario
                // auth()->attempt([
                //     'email' => $request->email,
                //     'password' => $request->password
                // ]);
                //otra forma
                auth()->attempt($request->only('email', 'password'));



        return redirect()->route('post.index');

    }
}
