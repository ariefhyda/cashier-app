@extends('layouts.master')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Edit Users
        </div>
        <div class="card-body">
            <form action="{{ route('users.proses_edit') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-select" name="level" id="level" >
                       <option @if ($user->level=='admin') selected @endif value="admin">Admin</option>
                       <option  @if ($user->level=='kasir') selected @endif value="kasir">Kasir</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$user->username}}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button class="btn btn-primary"> <i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>

    </div>
@endsection
