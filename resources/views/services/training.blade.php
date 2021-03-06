@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $ti }}</h1>

        <!-- Untuk Menampilkan error -->


        <!-- Flash Data -->


        <!-- Tombol Tambah -->
        <a href="/input-training" class="btn btn-primary mb-3" >Tambah Pelatihan Baru</a>

        <!-- DataTales E#le -->
        <div class="card Menu mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Atur Akses Pelatihan</h6>
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
                                            Dokumen Training
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            Status
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
                                    <td>{{ $d->status }}</td>
                                    <td>
                                        <a class="btn btn-warning p-1"
                                            href="{{ url('edit-training/' . $d->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                        <a class="btn btn-danger p-1"
                                            href="{{ url('delete-training/' . $d->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
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

    @foreach ($data as $d)
    <div class="modal fade" id="detail{{ $d->id }}" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row" style="padding: 10px 30px;">
                        <embed type="application/pdf" src="{{ asset('/DokumenTraining/' . $d->fileTraining) }}" width="100%" height="700"> 												
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


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
