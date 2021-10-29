{{-- Mengambil layout dari portal.blade.php --}}
@extends('layouts.portal')

@section('kontenAuth')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login Page</h1>
                                    </div>

                                    <!-- Alert data -->
                                    @if (session()->has('logout'))
                                        <div class="alert alert-warning" role="alert">
                                        {{ session()->get('logout') }}
                                        </div>
                                    @endif
                                    
                                    @if  (session()->has('succes'))
                                        <div class="alert alert-success" role="alert">
                                        {{ session()->get('succes') }}
                                        </div>
                                    @endif

                                    <!-- form input login -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!--- Email --->
                                        <div class="form-group">
                                            <small class="ml-2">Email</small>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}">

                                            @error('email')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!--- Password --->
                                        <div class="form-group">
                                            <small class="ml-2">Password</small>
                                            <input id="password" type="password" class="form-control" name="password"
                                                required>

                                            @error('password')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block ">
                                            Login
                                        </button>
                                        <hr>

                                        <div class="text-center">
                                            <a class="small" href="/auth">Dont have account ?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
