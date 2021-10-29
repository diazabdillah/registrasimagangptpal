@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $ti }}</h1>

    <!-- Untuk Menampilkan error -->


    <!-- Flash Data -->


    <!-- Tombol Tambah -->
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Submenu</a>

    <!-- DataTales E#le -->
    <div class="card Menu mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Atur Akses Submenu</h6>
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
                                        Title
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Menu
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Url
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Icon
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Active
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

                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        1
                                    </div>
                                </td>
                                <td>Title</td>
                                <td>Nama Menu</td>
                                <td>Url</td>
                                <td>Icon</td>
                                <td>Active</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success mr-2" href="">Edit</a>
                                        <a class="btn btn-secondary" href="" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
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
            <form action="" method="POST">
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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