@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
           Detail Histori
        </div>
        <div class="card-body">
           <h3>Kasir : {{$transaksi->user->name}}</h3>
           <span>Tanggal : {{$transaksi->tgl}}</span>
           <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi_detail as $d)
                <tr>
                    <td>{{$d->produk->nama_barang}}</td>
                    <td>{{$d->qty}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->jumlah}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        </div>

    </div>
@endsection
