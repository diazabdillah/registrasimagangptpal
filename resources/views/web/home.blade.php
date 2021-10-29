{{-- Mengambil layout dari main.blade.php --}}
@extends('layouts.main')

@section('isiKonten')

    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h1 class="mb-4">Welcom To Human Capital Develompent!</h1>
                <p class="caps">Travel to the any corner of the world, without going around in circles</p>
                <a class="btn btn-primary mt-3" href="/auth">Pendaftaran</a>
            </div>
            <a href="https://vimeo.com/45830194"
                class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>

@endsection
