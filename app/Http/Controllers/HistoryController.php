<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
		return view('history.index', compact('transaksi'));
	}
    public function detail(){
		return view('history.detail');
	}
}
