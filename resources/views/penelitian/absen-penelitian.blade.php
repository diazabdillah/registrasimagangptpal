@extends('layouts.webBack')

@section('kontenWebBack')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            <div class="alert alert-info" role="alert">
                <p class="card-text">
                    <b>Peraturan Absensi:</b><br>
                    - Absen Datang dibuka pukul 06.00 - 08.00 (<b> Absen Datang diperbolehkan ketika para penelitian sudah di dalam area PT PAL </b>)</b> <br>
                    - Absen Pulang dibuka pukul 16:30 - 19.00 <br>
                    - Absen izin dibuka pukul 06:00 - 07:30 <br> (Absen Izin Jika Para Penelitian <b> Sakit </b>, Selain
                    Itu
                    <b>Tidak Boleh, Harus Konfirmasi ke Pembimbing Penelitian Melalui Whatsapp Apabila Hendak Izin Ada
                        Keperluan
                        Lain</b>).
                </p>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Absen Penelitian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Absen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absenpenelitian as $ap)
                                <tr>
                                    <th>{{ $ap->nama }}</th>
                                    <th>Datang</th>
                                    @if (date('H:i', strtotime(now())) >= '06:00' && date('H:i', strtotime(now()))
                                    <= '08:00'  && date('d-m-Y', strtotime(now())) <= date('d-m-Y',
                                            strtotime($ap->selesai)) ) <th>
                                                <a class="btn btn-primary p-1"
                                                    href="/proses-absen-masuk-penelitian/{{ $ap->id }}"
                                                    role="button">Presensi</a>
                                            </th>
                                            @else
                                            <th>
                                                <button class="btn btn-secondary" disabled>Presensi</button>
                                            </th>
                                            @endif
                                </tr>
                                <tr>
                                    <th>{{ $ap->nama }}</th>
                                    <th>Pulang</th>
                                    @if (date('H:i', strtotime(now())) >= '16:30' && date('H:i', strtotime(now()))
                                    <= '19:00' && date('d-m-Y', strtotime(now())) <= date('d-m-Y',
                                            strtotime($ap->selesai))) <th>
                                                <a class="btn btn-primary p-1"
                                                    href="/proses-absen-pulang-penelitian/{{ $ap->id }}"
                                                    role="button">Presensi</a>
                                            </th>
                                            @else
                                            <th>
                                                <button class="btn btn-secondary" disabled>Presensi</button>
                                            </th>
                                            @endif
                                </tr>
                                <tr>
                                    <th>{{ $ap->nama }}</th>
                                    <th>Izin</th>
                                    @if (date('H:i', strtotime(now())) >= '06:00' && date('H:i',
                                    strtotime(now()))
                                    <= '07:30' && date('d-m-Y', strtotime(now())) <= date('d-m-Y',
                                            strtotime($ap->selesai)) )
                                            <th>
                                                <div>
                                                    <form enctype="multipart/form-data"
                                                        action="/proses-absen-izin-penelitian/{{ $ap->id }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <small class="ml-2">Keterangan Izin</small>
                                                            <textarea class="form-control" name="keterangan"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <small class="ml-2">Bukti Izin<small style="color: red">*Max
                                                                    2MB</small></small>
                                                            <input type="file" name="file_absen"
                                                                class="form-control @error('file_absen') is-invalid @enderror">

                                                            @error('file_absen')
                                                            <div class="invalid-feedback mt-2">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <button class="btn btn-danger" type="submit">Izin</button>
                                                </div>
                                                </form>

                                            </th>
                                            @else
                                            <th>
                                                <button class="btn btn-secondary" disabled>Izin</button>
                                            </th>
                                            @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Absen</h6>
                    <div class="dropdown no-arrow">
                        @foreach ($absenpenelitians as $aps)
                        @if($aps->id !=null)
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        @endif
                        @endforeach
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/cetak-absen-penelitian-pdf" target="_blank">Cetak Absen</a>

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Waktu Absen</th>
                                    <th>Absen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absenpenelitians as $aps)
                                <tr>
                                    <th> {{ $aps->nama }} </th>
                                    <th>{{ date('H:i, d F Y', strtotime($aps->waktu_absen)) }}</th>
                                    <th>{{ $aps->jenis_absen }}</th>
                                    <th>{{ $aps->keterangan }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $absenpenelitians->links() }}

                    </div>
                </div>
                <div class="alert alert-danger" role="alert">
                    <p class="card-text">
                        <b> Note :</b> <br>
                        - Mohon tekan tombol titik 3 di tabel rekap absen untuk mencetak absen. <br>
                        - Mohon Absen di cetak setiap 5 hari kerja agar bisa di tandatangani oleh pembimbing
                        lapangan.<br>
                        -Mohon Para Penelitian mengikuti peraturan absen jika melanggar/tidak jujur akan diberikan sanksi. 
    
                    </p>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->
@endsection
