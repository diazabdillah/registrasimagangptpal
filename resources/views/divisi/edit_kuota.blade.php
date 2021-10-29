{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="card shadow">
                <div class="card">
                    <div class="card-header">
                        Kuota
                    </div>
                    <div class="card-body">
                        @foreach ($data as $kuota)
                        <form action="">
                        <div class="form-group">
                            <small class="ml-2">Bagian</small>
                            <input type="text" class="form-control" id="bagian" name="bagian" value={{$kuota->bagian}}>
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Tanggal</small>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value={{$kuota->tanggal}}>
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Jumlah Kuota</small>
                            <input type="text" class="form-control" id="kuota" name="kuota" value={{$kuota->kuota}}>
                        </div>

                        <div class="form-group">
                            <small class="ml-2">Pilih Status</small>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="divisi">
                                    <option value="">Dibuka!</option>
                                    <option value="">Full</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-4">Save</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>
<!-- End of Main Content -->

@endsection
