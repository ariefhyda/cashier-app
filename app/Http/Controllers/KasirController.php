<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index() {
        return view('kasir.index');
    }

    public function getProduk(Request $request) {
        $data= Produk::find($request->id);
        if ($data) {
            $resp = array(
                'status' =>true,
                'message' => 'Sukses',
                'data' => $data,
            );
        }else {
            $resp = array(
                'status' =>false,
                'message' => 'Data tidak ditemukan',
            );
        }

        return response()->json($resp, 200);
    }

    public function simpanOrder(Request $request)  {
        $date =date('Y-m-d H:i:s');
        $dataOrder = array(
            'created_at' => $date,
            'tgl' => $date,
            'id' => $request->invoice,
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
            'user_id' => Auth::user()->id,
        );

         // insert order
         $order = Transaksi::insert($dataOrder);
         if ($order) {
              // insert detail order
             for ($i=0; $i < count($request->id) ; $i++) { //id=2
                 $p= Produk::where('id',$request->id[$i])->first();
                 $dataOrderDetail = array(
                     'created_at' => $date,
                     'harga' => $p->harga_jual,
                     'transaksi_id' => $request->invoice,
                     'qty' => $request->qty[$i],
                     'produk_id' => $request->id[$i],
                     'jumlah' => $request->jumlah[$i],
                 );
                 DB::table('transaksi_detail')->insert($dataOrderDetail);

                 // update stok
                 $stok = $p->stok - $request->qty[$i];
                 DB::table('produk')->where('id',$request->id[$i])->update(['stok'=>$stok]);
             }

             return 1;
         }else {
             return 0;
         }
    }
}
