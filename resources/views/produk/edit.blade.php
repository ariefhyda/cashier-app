@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Edit Produk
        </div>
        <div class="card-body">
            <form action="">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>

    </div>
@endsection