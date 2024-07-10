<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function tambah()
    {
        return view('users.tambah');
    }

    public function proses_tambah(Request $request)
    {
        $data = array(
            'name' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        );
        User::create($data);
        return redirect('/users');
    }

    public function edit(Request $request)
    {
        $data['user'] = User::where('id',$request->id)->first();
        return view('users.edit',$data);
    }

    public function proses_edit(Request $request)
    {
        $data = array(
            'name' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
            'username' => $request->username
        );
        // !empty($request->password)
        if ($request->password!="") {
            $data['password']=bcrypt($request->password);
        }
        User::where('id',$request->id)->update($data);
        return redirect('/users');
    }

    public function proses_delete(Request $request)
    {
        $id = $request->id;
        User::where('id',$id)->delete();
        return redirect('/users');
    }
}
