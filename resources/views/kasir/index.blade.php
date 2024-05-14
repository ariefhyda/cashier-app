@extends('layouts.master')
@section('content')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-4">
                            <form id="form-product">
                                <input id="input-product-id" class="form-control form-control-sm" type="text"
                                    placeholder="Product ID">
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-stripted table-bordered" id="table-cart">
                            <thead>
                                <tr>
                                    <th width="40%">PRODUK</th>
                                    <th width="20%">HARGA</th>
                                    <th width="10%">QTY</th>
                                    <th width="20%">JUMLAH</th>
                                    <th width="10%">#</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <td>Aqua 600ml</td>
                                    <td>3.000 / Botol</td>
                                    <td> <input id="input-qty" class="form-control form-control-sm" type="text"
                                        placeholder="QTY" value="3"> </td>
                                    <td> 9.000 </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            $date = date('d-m-Y');
                            $datetime = strtotime(date('d-m-Y H:i:s'));
                        @endphp
                        <div class="col-md-12">
                            <dl>
                                <dt> Kasir </dt>
                                <dd> Arif </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt> Nota </dt>
                                <dd> {{ $datetime }}</dd>
                                <input type="hidden" name="invoice" id="invoice" value="{{ $datetime }}">
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt> Tanggal </dt>
                                <dd> {{ $date }}</dd>
                                <input type="hidden" name="date" id="date" value="{{ $date }}">
                            </dl>
                        </div>
                    </div>

                    <div class="card bg-primary">
                        <div class="card-body text-right text-white">
                            <h4>Total</h4>
                            <h1 class="total">0</h1>
                            <input type="hidden" name="total" id="total">
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="bayar" class="form-label"><b>Bayar</b></label>
                        <input type="text" class="form-control form-control-lg" type="text" id="input-bayar">
                        <input type="hidden" name="bayar" id="bayar">
                    </div>

                    <div class="card bg-success mb-3">
                        <div class="card-body text-right text-white">
                            <h5>Kembali</h5>
                            <h2>0</h2>
                            <input type="hidden" name="kembali" id="kembali">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="/kasir" class="btn btn-warning btn-block"> <i class="fas fa-sync"></i> Bersihkan</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block " onclick="saveOrder()"> <i class="fas fa-save"></i>
                                SIMPAN</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
