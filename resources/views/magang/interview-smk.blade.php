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

                        <div class="card-body">

                            <h5 class="card-title mt-2">Test Kepribadian</h5>
                            <p class="alert alert-info card-text">Lakukan Tes Kepribadian dengan klik tombol "Tes Kepribadian", Tes ini dilakukan untuk menilai kepribadian pendaftar sehingga kami
                                dapat
                                menempatkan sesuai dengan kepribadian pendaftar. Mohon pendaftar magang mengupload
                                hasil tes kepribadian di tabel bawah sesuai kolom nama peserta magang dan berikan
                                hasil tes kepribadian paling terbaru.
                                <br>
                                <br>
                                <a class="btn btn-primary" href="https://www.16personalities.com/id/tes-kepribadian"
                                    target="_blank">Tes Kepribadian</a>

                            </p>


                            <div class="card shadow mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Upload Tes Kepribadian
                                    </div>
                                    <table class="table table-bordered" id="dataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Nis</th>
                                                <th>Sekolah</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $interview)

                                                <tr>
                                                    <td>{{ $interview->nama }}</td>
                                                    <td>{{ $interview->nis }}</td>
                                                    <td>{{ $interview->sekolah }}</td>

                                                    @if ($users[0]->status_user == 'SMK')

                                                        <td>

                                                            @if ($interview->fileinterview == null)
                                                                <a class="btn btn-warning"
                                                                    href="/interview-smk/{{ $interview->id }}"
                                                                    role="button">Upload Hasil Tes Kepribadian</a>
                                                            @else
                                                                <button type="button" disabled
                                                                    class="btn btn-success">Berhasil
                                                                    Upload</button>

                                                            @endif

                                                        </td>

                                                    @else

                                                        <td>

                                                            @if ($interview->fileinterview == null)
                                                                <a class="btn btn-warning"
                                                                    href="/interview-smk-kel/{{ $interview->id }}"
                                                                    role="button">Upload Hasil Tes Kepribadian</a>
                                                            @else
                                                                <button type="button" disabled
                                                                    class="btn btn-success">Berhasil
                                                                    Upload</button>

                                                            @endif

                                                        </td>

                                                    @endif

                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <div class="alert alert-danger">
                                <span>Note :</span>
                                <p>Apabila sudah Melakukan upload file tes kepribadian namun button <b>Berhasil Upload</b> kembali
                                    menjadi <b> Upload File
                                        Tes Kepribadian</b>, mohon para praktikan upload kembali file tes kepribadian yang sesuai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
