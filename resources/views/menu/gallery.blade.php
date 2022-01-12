@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $ti }}</h1>

        <!-- Untuk Menampilkan error -->


        <!-- Flash Data -->


        <!-- Tombol Tambah -->
        <a href="/input-galeri-foto" class="btn btn-primary mb-3" >Tambah Galeri Foto Baru</a>
        <a href="/input-galeri-video" class="btn btn-primary mb-3" >Tambah Galeri Video Baru</a>

        <!-- DataTales E#le -->
        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Akses Menu</h6>
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
                                            Judul
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Gambar
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Video
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Tanggal Upload
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Tanggal Update
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
                                @foreach ($data as $d)
                                <tr class="text-center">
                                    <td>{{ $data->firstItem() + ++$i - 1 }}.</td>
                                    <td>{{ $d->judul }}</td>
                                    <td>
                                        @if ($d->foto == '0')
                                            -
                                        @else
                                            {{ $d->foto }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($d->url == '0')
                                            -
                                        @else
                                            {{ $d->url }}
                                        @endif
                                    </td>
                                    <td>{{ $d->created_at }}</td>
                                    <td>{{ $d->updated_at }}</td>
                                    <td>
                                        @if ($d->url == '0')
                                        <a class="btn btn-primary p-1"
                                            data-toggle="modal" data-target="#staticBackdrop{{$d->id}}">Lihat</a>
                                        @elseif ($d->foto == '0')
                                        <a class="btn btn-primary p-1"
                                            href="{{ $d->url }}" target="_blank">Lihat</a>
                                        @endif
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-galeri/' . $d->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-galeri/' . $d->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    <!-- Modal Foto -->
    @foreach ($data as $d)
    <div class="modal fade" id="staticBackdrop{{ $d->id }}" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row" style="padding: 10px 30px;">
                        <img class="center" src="{{ asset('/galeri/' . $d->foto) }}" alt="" /> 												
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


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
