<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL | {{ $ti }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- Fonts Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    <style>
        .scroll {
            height: 400px;
            overflow: scroll;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PT.PAL</div>
            </a>

            @if (auth()->user()->role_id == 1)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                </div>


                <!-- Nav Item -->
                {{-- <li class="nav-item {{ $ti === 'Dashboard' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/admin_dash">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li> --}}
                <li class="nav-item {{ $ti === 'Rekap' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap">
                        <i class="fas fa-fw fa-file-contract"></i>
                        <span>Rekap Individu</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekapkelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/RekapKelompok">
                        <i class="fas fa-fw fa-file-contract"></i>
                        <span>Rekap Kelompok</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>

                <!-- Nav Item -->
                {{-- <li class="nav-item {{ $ti === 'Menu Managemet' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/menu">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Menu Management</span></a>
                </li> --}}
                <li class="nav-item {{ $ti === 'Submenu Managemet' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/sub-menu">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Submenu</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Berita Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-berita">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Berita</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Galeri Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/galeri">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Galeri</span></a>
                </li>

            @endif

            @if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Divisi
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Penerimaan' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Penerimaan">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Penerimaan Magang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Interview' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-interview">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Magang Interview</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Diterima' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/diterima">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span>Dokumen Magang Aktif</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Aktif' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-aktif">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Magang Aktif</span></a>
                </li>

                <li class="nav-item {{ $ti === 'absen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen">
                        <i class="fas fa-fw fa-thumbtack"></i>
                        <span>Absen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'laporan' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan">
                        <i class="fas fa-fw fa-thumbtack"></i>
                        <span>Laporan Akhir</span></a>
                </li>
                <li class="nav-item {{ $ti === 'penilaian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian">
                        <i class="fas fa-fw fa-thumbtack"></i>
                        <span>Form Penilaian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Selesai' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-selesai-mhs">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Magang Selesai</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 8)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang Mahasiswa
                </div>
                <li class="nav-item {{ $ti === 'Data Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-mhs">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Data Mahasiswa</span></a>
                </li>

            @endif

            @if (auth()->user()->role_id == 6)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang Mahasiswa Kelompok
                </div>

                <!-- Nav Item -->

                <li class="nav-item {{ $ti === 'Data Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-mhs-kelompok">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Data Kelompok</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 11)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang Mahasiswa
                </div>
                <li class="nav-item {{ $ti === 'Dokumen Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/dokumen-mhs">
                        <i class="fas fa-fw fa-pencil-alt"></i>
                        <span>Dokumen Mahasiswa</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 3)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang Mahasiswa
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Profil Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/profil-mhs">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Absen Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-mhs">
                        <i class="fas fa-fw fa-user-clock"></i>
                        <span>Absen</span></a>
                </li>

                <li class="nav-item {{ $ti === 'ID Card Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id-card-mhs">
                        <i class="fas fa-fw fa-id-badge"></i>
                        <span>ID Card</span></a>
                </li>

                <li class="nav-item {{ $ti === 'laporan akhir' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-mhs">
                        <i class="fas fa-fw fa-id-badge"></i>
                        <span>Laporan akhir</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Penilaian Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian-mhs">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Form Penilaian</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 9)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang SMK
                </div>
                <li class="nav-item {{ $ti === 'Data SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-smk">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Data</span></a>
                </li>

            @endif

            @if (auth()->user()->role_id == 7)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang SMK Kelompok
                </div>

                <li class="nav-item {{ $ti === 'Data SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-smk-kelompok">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Data</span></a>
                </li>


            @endif

            @if (auth()->user()->role_id == 12)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang SMK
                </div>
                <li class="nav-item {{ $ti === 'Dokumen SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/dokumen-smk">
                        <i class="fas fa-fw fa-pencil-alt"></i>
                        <span>Dokumen</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 4)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang SMK
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Profil SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Profil_smk">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Absen SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Absen_smk">
                        <i class="fas fa-fw fa-user-clock"></i>
                        <span>Absen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'ID Card SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id_card_smk">
                        <i class="fas fa-fw fa-id-badge"></i>
                        <span>ID Card</span></a>
                </li>
                <li class="nav-item {{ $ti === 'laporan_smk' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan_smk">
                        <i class="fas fa-fw fa-id-badge"></i>
                        <span>Laporan akhir</span></a>
                </li>

            @endif

            @if (auth()->user()->role_id == 10)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Registrasi Pengajuan' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/regis-step2">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Registrasi</span></a>
                </li>

            @endif
            @if (auth()->user()->role_id == 14)
                <li class="nav-item {{ $ti === 'Sertifikat Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/sertifikat_mhs">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Sertifikat</span> </a>
                </li>
            @endif
            @if (auth()->user()->role_id == 15)
                <li class="nav-item {{ $ti === 'Selesai Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/selesai">
                        <i class="fas fa-fw fa-medal"></i>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role_id == 16)
                <li class="nav-item {{ $ti === 'Test Interview Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/interview-mhs">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Interview</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 17)
                <li class="nav-item {{ $ti === 'Test Interview Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/interview-smk">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Interview</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 18)
                <li class="nav-item {{ $ti === 'Kelola Jurusan Magang' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kelola-jurusan">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Kelola Jurusan & Departemen</span> </a>
                </li>
                <li class="nav-item {{ $ti === 'Kuota' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kuota">
                        <i class="fas fa-fw fa-bullhorn"></i>
                        <span>Kuota</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 5)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian
                </div>

                <!-- Nav Item -->

                <li class="nav-item {{ $ti === 'ID Card Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id-card">
                        <i class="fas fa-fw fa-id-badge"></i>
                        <span>ID Card</span></a>
                </li>
            @endif



            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Other
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mt-3">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                                <i class="fas fa-caret-down ml-2"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{-- Konten --}}
                    @yield('kontenWebBack')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT PAL Colaboration ANAK PENS <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <form id="logout-form" action="" method="POST" class="d-none">
        @csrf
    </form>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end leave</div>
                <div class="modal-footer">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
