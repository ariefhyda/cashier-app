@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                Data Produk
                <a href="/produk/tambah" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Produk</a>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tisu</td>
                        <td>5</td>
                        <td>5000</td>
                        <td>
                            <a href="/produk/edit/1" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                            <a href="" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
@endsection
