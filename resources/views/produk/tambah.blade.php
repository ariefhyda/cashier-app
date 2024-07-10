@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Input Produk
        </div>
        <div class="card-body">
            <form action="{{ route('produk.proses_tambah') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="ID" value="{{ old('id') }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama" value="{{ old('nama_barang') }}" >
                </div>
                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="{{ old('harga_beli') }}" >
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="{{ old('harga_jual') }}" >
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="{{ old('stok') }}" >
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select class="form-select" name="satuan_id" id="satuan_id" value="{{ old('satuan_id') }}" >
                        @foreach ($data_satuan as $satuan)
                            <option value="{{$satuan->id}}">{{$satuan->satuan}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary"> <i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>

    </div>
@endsection
