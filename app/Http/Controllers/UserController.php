<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
		return view('users.index');
	}
    public function tambah(){
		return view('users.tambah');
	}
    public function edit(Request $request){
		return view('users.edit');
	}
}
