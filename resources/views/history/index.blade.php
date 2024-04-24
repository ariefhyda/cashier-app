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
                    <tr>
                        <td>Arif</td>
                        <td>22-01-2024</td>
                        <td>30.000</td>
                        <td>
                            <a href="/history/detail/1" class="btn btn-primary"> <i class="fas fa-edit"></i> Detail</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
@endsection
