<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
		return view('produk.index');
	}
    public function tambah(){
		return view('produk.tambah');
	}
    public function edit(Request $request){
		return view('produk.edit');
	}
}
