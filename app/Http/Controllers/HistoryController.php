<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $transaksi = Transaksi::with(['user'])->get();
		return view('history.index', compact('transaksi'));
	}
    public function detail(Request $request){
        $data['transaksi_detail'] = TransaksiDetail::with(['produk'])->where('transaksi_id',$request->id)->get();
        $data['transaksi'] = Transaksi::with(['user'])->where('id',$request->id)->first();
		return view('history.detail',$data);
	}
}
