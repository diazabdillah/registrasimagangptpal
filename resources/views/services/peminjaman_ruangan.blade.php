@extends('layouts.webBack')

@section('kontenWebBack')
    @php $j=0; @endphp
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $ti }}</h1>

        <!-- Untuk Menampilkan error -->


        <!-- Flash Data -->


        <!-- Tombol Tambah -->
        <a href="/input-daftar-ruangan" class="btn btn-primary mb-3" >Tambah Ruangan Baru</a>

        <!-- DataTales E#le -->
        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Akses Ruangan</h6>
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
                                            Nama Ruangan
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Fasilitas
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Kapasitas
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Foto Ruangan
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Status
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Keterangan
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
                                @foreach ($dataRuangan as $dr)
                                <tr class="text-center">
                                    <td>{{ $dataRuangan->firstItem() + ++$i - 1 }}.</td>
                                    <td>{{ $dr->nama_ruangan }}</td>
                                    <td>{{ $dr->fasilitas }}</td>
                                    <td>{{ $dr->kapasitas }}</td>
                                    <td>
                                        <a class="btn btn-primary p-1"
                                            data-toggle="modal" data-target="#staticBackdrop{{$dr->id}}">Lihat</a>
                                    </td>
                                    <td>
                                        @if ( $dr->status == 'Available')
                                            <div class="btn btn-success p-1">Available</div>
                                        @elseif ( $dr->status == 'Unavailable')
                                            <div class="btn btn-danger p-1">Unavailable</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $dr->status == 'Available')
                                            <div class="btn btn-secondary p-1">Tersedia</div>
                                            <a class="btn btn-danger p-1"href="{{ url('unavailable-ruangan/' . $dr->id) }}">Tidak Tersedia</a>
                                        @elseif ( $dr->status == 'Unavailable')
                                            <a class="btn btn-success p-1"href="{{ url('available-ruangan/' . $dr->id) }}">Tersedia</a>
                                            <div class="btn btn-secondary p-1">Tidak Tersedia</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-daftar-ruangan/' . $dr->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-daftar-ruangan/' . $dr->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $dataRuangan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($dataRuangan as $dr)
        <div class="modal fade" id="staticBackdrop{{ $dr->id }}" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row" style="padding: 10px 30px;">
                            <img class="center" src="{{ asset('/Foto Ruangan/' . $dr->foto_ruangan) }}" alt="" /> 												
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Akses Peminjaman Ruangan</h6>
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
                                            Pilihan Ruangan
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Nama Peminjam
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Divisi
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Departemen
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            No. Telp
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
                                            Jam Mulai
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Jam Selesai
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Keperluan
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Keterangan
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
                                @foreach ($dataPeminjam as $dp)
                                <tr class="text-center">
                                    <td>{{ $dataPeminjam->firstItem() + ++$j - 1 }}.</td>
                                    <td>{{ $dp->pilih_ruangan }}</td>
                                    <td>{{ $dp->nama_peminjam }}</td>
                                    <td>{{ $dp->divisi }}</td>
                                    <td>{{ $dp->departemen }}</td>
                                    <td>{{ $dp->no_telp }}</td>
                                    <td>{{ $dp->tanggal_mulai }}</td>
                                    <td>{{ $dp->tanggal_selesai }}</td>
                                    <td>{{ $dp->jam_mulai }}</td>
                                    <td>{{ $dp->jam_selesai }}</td>
                                    <td>{{ $dp->keperluan }}</td>
                                    <td>{{ $dp->status }}</td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-peminjaman-ruangan/' . $dp->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-peminjaman-ruangan/' . $dp->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $dataPeminjam->links() }}
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
