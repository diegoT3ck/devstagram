<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;

class RegsterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:3|max:60',

        ]);
        
        
                User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->password
                ]);

/*         $request->name;
        $request->username;
        $request->email;
        $request->password;
        $request->password_confirmation;

        return dd($request); */
    }
}
