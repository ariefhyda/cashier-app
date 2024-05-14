@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Edit Produk
        </div>
        <div class="card-body">
            <form action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli">
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Stok</label>
                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok">
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select class="form-select" aria-label="Default select example" name="satuan" id="satuan">
                        <option selected>Pilih</option>
                        <option value="1">Pcs</option>
                        <option value="2">Botol</option>
                      </select>
                </div>
                <button class="btn btn-primary"> <i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>

    </div>
@endsection
