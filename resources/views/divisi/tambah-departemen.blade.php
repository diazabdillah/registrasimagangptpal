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

                        <div class="card-body">
                            <form action="/proses-departemen" method="POST">
                                @csrf
                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <select class="custom-select" id="inputGroupSelect04" name="id_divisi" required>
                                        @foreach ($divisi as $div)
                                            <option value="{{ $div->id }}">{{ $div->nama_divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nama Departemen</small>
                                    <input type="text" class="form-control" id="bagian" name="nama_departemen">
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Tambah Departemen</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->


        </div>
    </div>
    <!-- End of Main Content -->

@endsection
