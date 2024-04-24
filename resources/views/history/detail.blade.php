@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
           Detail Histori
        </div>
        <div class="card-body">
           <h3>Kasir : Arif</h3>
           <span>Tanggal : 22-01-2024</span>
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
                <tr>
                    <td>Tisu</td>
                    <td>5</td>
                    <td>5000</td>
                    <td>25000</td>
                </tr>

            </tbody>
        </table>
        </div>

    </div>
@endsection
