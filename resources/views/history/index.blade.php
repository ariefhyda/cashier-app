@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Data History
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kasir</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $d)
                        <tr>
                            <td>{{$d->user_id}}</td>
                            <td>{{$d->tgl}}</td>
                            <td>{{$d->total}}</td>
                            <td>
                                <a href="/history/detail/{{$d->id}}" class="btn btn-primary"> <i class="fas fa-edit"></i> Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
@endsection
