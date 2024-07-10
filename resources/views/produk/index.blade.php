@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                Data Produk
                <a href="/produk/tambah" class="btn btn-success"> <i class="fas fa-plus"></i>
                    Tambah Produk</a>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Action</th>
                </tr>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->nama_barang }}</td>
                        <td>{{ $produk->harga_beli }}</td>
                        <td>{{ $produk->harga_jual }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->satuan_id }}</td>
                        <td>
                            <a href="/produk/edit/{{ $produk->id }}" class="btn btn-primary"> <i class="fas fa-edit"></i>
                                Edit</a>
                            <a href="/produk/delete/{{ $produk->id }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $produks->links() }}
        </div>
    </div>
@endsection
@section('css')
@endsection
