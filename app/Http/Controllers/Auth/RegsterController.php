<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegsterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
    public function autenticar() {
        return view('auth.register');
    }
}
