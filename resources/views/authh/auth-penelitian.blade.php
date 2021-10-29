@extends('layouts.portal')

@section('kontenAuth')

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 font-weight-bold mb-3">{{ $title }}</h1>
                                <p>Buat Akun</p>
                            </div>
                            <form method="POST" action="{{ route('RegPenelitian') }}">
                                @csrf
                                <!-- Input Email -->
                                <div class="form-group">
                                    <small class="ml-2">Email</small>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Input Nama -->
                                <div class="form-group">
                                    <small class="ml-2">Nama Lengkap</small>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <small class="ml-2">Password</small>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">

                                    @error('password')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Selanjutnya
                                </button>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account ?<br> <b>Login in here!</b></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
