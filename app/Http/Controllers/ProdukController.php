<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\M_satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::simplePaginate(10);
        return view('produk.index', compact('produks'));
    }
    public function tambah()
    {
        $data_satuan = M_satuan::all();
        return view('produk.tambah', compact('data_satuan'));
    }

    public function proses_tambah(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:produk',
            'nama_barang' => 'required',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'satuan_id' => 'required|exists:m_satuan,id',
        ]);

        $data = array(
            'id' => $request->id,
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan_id,
        );
        Produk::create($data);
        return redirect('/produk');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = [
            "produk" => Produk::where('id', $id)->first(),
            "data_satuan" => M_satuan::all()
        ];
        return view('produk.edit', compact('data'));
    }
    public function proses_edit(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'satuan_id' => 'required|exists:m_satuan,id',
        ]);
        $id = $request->id;
        $data = array(
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan_id,
        );
        Produk::where('id',$id)->update($data);
        return redirect('produk');
    }

    public function proses_delete(Request $request)
    {
        $id = $request->id;
        Produk::where('id',$id)->delete();
        return redirect('/produk');
    }

}
