@extends('layouts.webBack')

@section('kontenWebBack')
    @php 
        $i=0;
        $j=0;
        $k=0;
    @endphp
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $ti }}</h1>

        <!-- Untuk Menampilkan error -->


        <!-- Flash Data -->

        <!-- Informasi Jadwal Sertifikasi -->

        <!-- DataTales E#le -->
        <a href="/input-jadwal-sertifikat" class="btn btn-primary mb-3" >Tambah Jadwal Sertifikasi Baru</a>

        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Jadwal Sertifikasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            No.
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Nama Training
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Penyelenggara
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Tanggal Mulai
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Tanggal Selesai
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Tempat
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Peserta Sprint
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Peserta Hadir
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            File Sertifikat
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_js as $d)
                                <tr class="text-center">
                                    <td>{{ $data_js->firstItem() + ++$i - 1 }}.</td>
                                    <td>{{ $d->nama_training }}</td>
                                    <td>{{ $d->penyelenggara }}</td>
                                    <td>{{ $d->tanggal_mulai }}</td>
                                    <td>{{ $d->tanggal_selesai }}</td>
                                    <td>{{ $d->tempat }}</td>
                                    <td>{{ $d->peserta_sprint }}</td>
                                    <td>{{ $d->peserta_hadir }}</td>
                                    <td>
                                        <a class="btn btn-primary p-1" data-toggle="modal" data-target="#detail{{$d->id}}">Lihat</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-jadwal-sertifikat/' . $d->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-jadwal-sertifikasi/' . $d->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $data_js->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($data_js as $d)
        <div class="modal fade" id="detail{{ $d->id }}" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row" style="padding: 10px 30px;">
                            <embed type="application/pdf" src="{{ asset('/DokumenSertifikatTraining/' . $d->fileSertifikasi) }}" width="100%" height="700"> 												
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Informasi Skema BNSP -->
        
        <!-- Tombol Tambah -->
        <a href="/input-skema-bnsp" class="btn btn-primary mb-3" >Tambah Skema BNSP Baru</a>

        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Skema BNSP</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            No.
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Kode Skema
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Nama Skema
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Level
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Bidang
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_sb as $dp)
                                <tr class="text-center">
                                    <td>{{ $data_sb->firstItem() + ++$j - 1 }}.</td>
                                    <td>{{ $dp->kode_skema }}</td>
                                    <td>{{ $dp->nama_skema }}</td>
                                    <td>{{ $dp->level }}</td>
                                    <td>{{ $dp->bidang }}</td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-skema-bnsp/' . $dp->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-skema-bnsp/' . $dp->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $data_sb->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Jumlah Asesor -->
        
        <!-- Tombol Tambah -->
        <a href="/input-jumlah-asesor" class="btn btn-primary mb-3" >Tambah Asesor Baru</a>

        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Jumlah Asesor</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            No.
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Nomor Registrasi
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Nama Asesor
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_ja as $dp)
                                <tr class="text-center">
                                    <td>{{ $data_ja->firstItem() + ++$j - 1 }}.</td>
                                    <td>{{ $dp->nomor_registrasi }}</td>
                                    <td>{{ $dp->nama_assessor }}</td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-jumlah-asesor/' . $dp->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-jumlah-asesor/' . $dp->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $data_ja->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


    <!-- Modal Add New Menu -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Input Nama Menu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin anda mau menghapus menu ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection
