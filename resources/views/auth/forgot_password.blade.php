@extends('layouts.master-login')
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card  shadow-lg border-0 rounded-lg mt-5">
                                <img src="{{ asset('image/mesin-kasir.jpg') }}" class="card-img-top" alt="gambar mesin kasir">
                                <div class="card-body">
                                    <h5 class="card-title">Forgot Password</h5>

                                    @if (session('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> {{ session('sukses') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('gagal'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Failed!</strong> {{ session('gagal') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form action="{{ url('proses_forgot_password') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control" id="inputEmailAddress" name="email"
                                                type="text" placeholder="Masukkan Email" />
                                            @if ($errors->has('email'))
                                                <span class="error">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <button class="btn w-100 btn-primary btn-block btn-login"
                                                type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="{{ route('login') }}">Halaman Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection

@section('css')
@endsection
