@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
                    </div>
                @endif

                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-2">Test Kepribadian</h5>
                                <p class="card-text"><small>Lakukan Tes Kepribadian dengan klik tombol
                                        dibawah ini, tes ini dilakukan untuk menilai kepribadian pendaftar sehingga kami
                                        dapat
                                        menempatkan sesuai dengan kepribadian pendaftar.Mohon pendaftar magang mengupload
                                        hasil tes kepribadian di tabel bawah sesuai kolom nama peserta magang dan berikan
                                        hasil tes kepribadian paling terbaru</small>
                                    <br>
                                    <a class="btn btn-primary" href="https://www.16personalities.com/free-personality-test" target="_blank">Test Interview</a>
                                </p>

                                <div class="card shadow mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Upload Interview
                                        </div>
                                        <table class="table table-bordered" id="dataTable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Nim</th>
                                                    <th>Universitas</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $interview)

                                                    <tr>
                                                        <td>{{ $interview->nama }}</td>
                                                        <td>{{ $interview->nim }}</td>
                                                        <td>{{ $interview->univ }}</td>
                                                        
                                                        @if ($users[0]->status_user == "Individu")

                                                        <td>

                                                            @if ($interview->fileinterview == null)
                                                                <a class="btn btn-warning" href="{{ url('/interview-mhs/' . $interview->id) }}" role="button">Upload Hasil Interview</a>
                                                            @endif

                                                        </td>

                                                        @else

                                                        <td>

                                                            @if ($interview->fileinterview == null)
                                                                <a class="btn btn-warning" href="{{ url('/interview-mhs-kel/' . $interview->id) }}" role="button">Upload Hasil Interview</a>
                                                            @endif

                                                        </td>

                                                        @endif

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
