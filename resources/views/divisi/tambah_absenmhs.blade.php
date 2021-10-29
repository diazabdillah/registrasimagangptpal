@extends('layouts.webBack')

@section('kontenWebBack')

<h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1> <br>
<div class="container">
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-2">Form Absensi</h5>
                <p class="card-text"><small>Mohon diisi waktu awal dan waktu akhir untuk calon magang</small>
                </p>


                <form method="POST" action="{{ route('tambahabsen', [$user->id]) }}">
                    @csrf
                    <!-- Input Univ -->
                    <div class="form-group">
                        <small class="ml-2">Waktu Awal</small>
                        <input type="datetime-local" class="form-control" id="" name="waktu_awal">
                    </div>
                    <!-- Input Strata (S1/d3) -->
                    <div class="form-group">
                        <small>Waktu Akhir</small>
                        <input type="datetime-local" name="waktu_akhir" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>



    </div>
</div>
@endsection