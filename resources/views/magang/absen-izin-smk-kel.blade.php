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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('img/navy.png') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>
    <script src="/js/mapInput.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <link href="{{ asset('css/jquery-3.5.1.min.js') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        .scroll {
            height: 400px;
            overflow: scroll;
        }
        .spinner {
            display: none;
        }
    </style>

</head>

<body id="page-top">
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
            @if (auth()->user()->role_id == 0)
            @endif
            @if (auth()->user()->role_id == 1)
                <!-- Divider -->

                <li class="nav-item {{ $ti === 'Dashboard' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/admin_dash">
                        <i class="fas fa-chart-pie"></i>
                        <span>Dashboard</span></a>
                </li>
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
                <li class="nav-item {{ $ti === 'Divisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/divisi">
                        <i class="fas fa-building"></i>
                        <span>Divisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Departemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/departemen">
                        <i class="fas fa-network-wired"></i>
                        <span>Departemen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap">
                        <i class="fas fa-database"></i>
                        <span>Rekap Mahasiswa</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Rekap Mahasiswa Kelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-mhs-kelompok">
                        <i class="fas fa-database"></i>
                        <span>Rekap MHS Kelompok</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-Smk">
                        <i class="fas fa-database"></i>
                        <span>Rekap SMK</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap SMK Kelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-smk-kelompok">
                        <i class="fas fa-database"></i>
                        <span>Rekap SMK Kelompok</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-penelitian">
                        <i class="fas fa-database"></i>
                        <span>Rekap Penelitian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Kelola Akun Divisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kelola-akun-divisi">
                        <i class="fas fa-building"></i>
                        <span>Kelola Akun Divisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Berita Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-berita">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Berita</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Galeri Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-galeri">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Galeri</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Contact Us Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-contact-us">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Contact Us</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Info Beasiswa Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-info-beasiswa">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Info Beasiswa</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Training Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-training">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Training</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Peminjaman Ruangan Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-peminjaman-ruangan">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Peminjaman Ruangan</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Informasi Unit Kerja Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-unit-kerja">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Unit Kerja</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Informasi LSP Managemen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/show-informasi-lsp">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Informasi LSP</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Penerimaan' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Penerimaan">
                        <i class="fas fa-user-plus"></i>
                        <span>Penerimaan Magang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Interview' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-interview">
                        <i class="fas fa-user-friends"></i>
                        <span>Magang Interview</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Diterima' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/diterima">
                        <i class="fas fa-paste"></i>
                        <span>Dokumen Magang Aktif</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Aktif' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-aktif">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Magang Aktif</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Absensi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Laporan Akhir' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Laporan Akhir Revisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-revisi">
                        <i class="fas fa-journal-whills"></i>
                        <span>Laporan Akhir Revisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Penilaian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian-magang">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Form Penilaian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Selesai' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-selesai-mhs">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span>Magang Selesai</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Magang Kuota Penuh' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-kuota-penuh">
                        <i class="fas fa-user-times"></i>
                        <span>Magang Kuota Penuh</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Penerimaan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penerimaan-penelitian">
                        <i class="fas fa-user-plus"></i>
                        <span>Penerimaan Penelitian</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Diterima penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/diterima-penelitian">
                        <i class="fas fa-paste"></i>
                        <span>Dokumen Penelitian Aktif</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Penelitian Aktif' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penelitian-aktif">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Penelitian Aktif</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Absen Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-pnltn">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen Penelitian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Laporan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-pnltn">
                        <i class="fas fa-journal-whills"></i>
                        <span>Laporan Akhir Penelitian</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Penelitian Selesai' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/pnltn-selesai">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span>Penelitian Selesai</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Penelitian Judul Ditolak' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/pnltn-kuota-penuh">
                        <i class="fas fa-user-times"></i>
                        <span>Penelitian Judul Ditolak</span></a>
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
                        <i class="fas fa-user-plus"></i>
                        <span>Data Mahasiswa</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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

                <li class="nav-item {{ $ti === 'Data Mahasiswa Kelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-mhs-kelompok">
                        <i class="fas fa-user-plus"></i>
                        <span>Data Kelompok</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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
                        <i class="fas fa-paste"></i>
                        <span>Dokumen Mahasiswa</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 3)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Magang Mahasiswa
                </div>
                <li class="nav-item {{ $ti === 'Surat Penerimaan Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-penerimaan-mhs">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Penerimaan</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Surat Memo Divisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-memo-divisi">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Memo Divisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Surat Perizinan Barang' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-perizinan-barang-mhs">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Perizinan Barang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'ID Card Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id-card-mhs">
                        <i class="fas fa-id-card"></i>
                        <span>ID Card</span></a>
                </li>


                <li class="nav-item {{ $ti === 'Absensi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-mhs">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Kegiatan Magang Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/tugas-mhs">
                        <i class="fas fa-fingerprint"></i>
                        <span>Kegiatan Magang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Laporan Akhir' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-mhs">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Penilaian Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian-mhs">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Form Penilaian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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
                        <i class="fas fa-user-plus"></i>
                        <span>Data</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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
                        <i class="fas fa-user-plus"></i>
                        <span>Data</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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
                        <i class="fas fa-paste"></i>
                        <span>Dokumen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
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
                <li class="nav-item {{ $ti === 'Surat Penerimaan SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-penerimaan-smk">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Penerimaan</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Surat Memo Divisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-memo-divisi-smk">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Memo Divisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'ID Card SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id-card-smk">
                        <i class="fas fa-id-card"></i>
                        <span>ID Card</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Kegiatan Magang SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/tugas-smk">
                        <i class="fas fa-fingerprint"></i>
                        <span>Kegiatan Magang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Absensi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-smk">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Laporan Akhir SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-smk">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Penilaian SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian-smk">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Form Penilaian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif

            @if (auth()->user()->role_id == 21)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'data Penilitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/data-penelitian">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Data Penelitian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 22)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Dokumen Penelitian
                </div>

                <!-- Nav Item -->
                <li class="nav-item {{ $ti === 'Dokumen Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/dokumen-penelitian">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Dokumen Penelitian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 23)
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian Aktif
                </div>
                <li class="nav-item {{ $ti === 'Surat Penerimaan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-penerimaan-penelitian">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Penerimaan</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Surat Memo Divisi' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-memo-divisi-penelitian">
                        <i class="fas fa-file-contract"></i>
                        <span>Surat Memo Divisi</span></a>
                </li>
                <li class="nav-item {{ $ti === 'ID Card Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/id-card-penelitian">
                        <i class="fas fa-id-card"></i>
                        <span>ID Card</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Absen Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-penelitian">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Laporan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-penelitian">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 24)
                <li class="nav-item {{ $ti === 'Surat Keterangan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat_penelitian">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Surat Pengantar</span> </a>
                </li>
            @endif

            @if (auth()->user()->role_id == 25)
                <!-- penelitian selesai -->
            @endif

            @if (auth()->user()->role_id == 26)
                <!-- penelitian penuh -->
            @endif
            @if (auth()->user()->role_id == 14)
                <li class="nav-item {{ $ti === 'Sertifikat Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/sertifikat_mhs">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Sertifikat Mahasiswa</span> </a>
                </li>
                <li class="nav-item {{ $ti === 'Surat Keterangan Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-keterangan-mhs">
                        <i class="fas fa-scroll"></i>
                        <span>Surat Keterangan Mahasiswa</span> </a>
                </li>
            @endif
            @if (auth()->user()->role_id == 15)
                <li class="nav-item {{ $ti === 'Sertifikat SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/sertifikat_smk">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Sertifikat SMK</span> </a>
                </li>
                <li class="nav-item {{ $ti === 'Surat Keterangan SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/surat-keterangan-smk">
                        <i class="fas fa-scroll"></i>
                        <span>Surat Keterangan SMK</span> </a>
                </li>
            @endif

            @if (auth()->user()->role_id == 19)
                <!-- mahasiswa selesai -->
            @endif

            @if (auth()->user()->role_id == 20)
                <!-- smk selesai -->
            @endif

            @if (auth()->user()->role_id == 16)
                <li class="nav-item {{ $ti === 'Tes Kepribadian Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/interview-mhs">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Tes Kepribadian Mahasiswa</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 17)
                <li class="nav-item {{ $ti === 'Tes Kepribadian SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/interview-smk">
                        <i class="fas fa-fw fa-medal"></i>
                        <span>Tes Kepribadian SMK</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
            @endif
            @if (auth()->user()->role_id == 18)
                <hr>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin Divisi
                </div>

                <li class="nav-item {{ $ti === 'Kelola Jurusan Magang' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kelola-jurusan">
                        <i class="fas fa-network-wired"></i>
                        <span>Kelola Departemen</span> </a>
                </li>
                <li class="nav-item {{ $ti === 'Kuota' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kuota">
                        <i class="fas fa-fw fa-bullhorn"></i>
                        <span>Kuota</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap Mahasiswa' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-divisi">
                        <i class="fas fa-database"></i>
                        <span>Rekap Mahasiswa</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Rekap Mahasiswa Kelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-mhs-kelompok-divisi">
                        <i class="fas fa-database"></i>
                        <span>Rekap MHS Kelompok</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap SMK' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-Smk-divisi">
                        <i class="fas fa-database"></i>
                        <span>Rekap SMK</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap SMK Kelompok' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-smk-kelompok-divisi">
                        <i class="fas fa-database"></i>
                        <span>Rekap SMK Kelompok</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Rekap Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/Rekap-penelitian-divisi">
                        <i class="fas fa-database"></i>
                        <span>Rekap Penelitian</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Chat Admin' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/forum-mhs">
                        <i class="fas fa-comments"></i>
                        <span>Chat Admin</span></a>
                </li>
                <hr>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Praktikan
                </div>

                <li class="nav-item {{ $ti === 'Magang Aktif' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/magang-aktif-divisi">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Magang Aktif</span></a>
                </li>
                <li class="nav-item {{ $ti === 'absen' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-divisi">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>
                <li class="nav-item {{ $ti === 'Kegiatan Magang' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/kegiatan-magang">
                        <i class="fas fa-fingerprint"></i>
                        <span>Kegiatan Magang</span></a>
                </li>
                <li class="nav-item {{ $ti === 'laporan' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-divisi">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
                </li>
                <li class="nav-item {{ $ti === 'penilaian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penilaian-divisi">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Form Penilaian</span></a>
                </li>
                <hr>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Penelitian
                </div>

                <li class="nav-item {{ $ti === 'Penelitian Aktif' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/penelitian-aktif-divisi">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Penelitian Aktif</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Absen Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/absen-penelitian-divisi">
                        <i class="fas fa-fingerprint"></i>
                        <span>Absen</span></a>
                </li>

                <li class="nav-item {{ $ti === 'Laporan Penelitian' ? 'active' : '' }}">
                    <a class="nav-link pb-0" href="/laporan-penelitian-divisi">
                        <i class="fas fa-book"></i>
                        <span>Laporan Akhir</span></a>
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
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/undraw_profile.svg') }}">
                                <i class="fas fa-caret-down ml-2"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @if (Auth::user()->role_id == 3)
                                    <a class="dropdown-item" href="/profil-mhs">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                @endif
                                @if (Auth::user()->role_id == 4)
                                    <a class="dropdown-item" href="/profil-smk">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                @endif
                                @if (Auth::user()->role_id == 23)
                                    <a class="dropdown-item" href="/profil-penelitian">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                @endif

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </li>

                    </ul>

                </nav>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">


            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            <div class="alert alert-info" role="alert">
                <p class="card-text">
                    <b>Peraturan Absensi:</b><br>
                    - Absen Datang dibuka pukul 06.00 - 08.00 (<b> Absen Datang diperbolehkan ketika para praktikan
                        sudah di dalam area PT PAL </b>)</b> <br>
                    - Absen Pulang dibuka pukul 16:30 - 19.00 <br>
                    - Absen izin dibuka pukul 06:00 - 07:30 <br> (Absen Izin Jika Para Praktikan <b> Sakit </b>, Selain
                    Itu
                    <b>Tidak Boleh, Harus Konfirmasi ke Pembimbing Magang Melalui Whatsapp Apabila Hendak Izin Ada
                        Keperluan
                        Lain</b>).
                </p>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Absen Pemagang</h6>
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
                                @foreach ($absensmk as $am)
                         
                                <tr>
                                    <th>{{ $am->nama }}</th>
                                    <th>Izin</th>
                                           <th>
                                                <div>
                                                    <form class="my-Form" id="formprevent" enctype="multipart/form-data"
                                                        action="/proses-absen-izin-smk/{{ $am->id }}"
                                                        method="POST">
                                                        @csrf
                                                       
                                                        <div class="form-group">
                                                            <label for="recipient-name" >Bukti Izin:</label>
                                                            <div id="mycamera"></div>
                                                            <input type=button class="btn btn-sm btn-primary" value="Take Snapshot"
                                                                onClick="takesnapshot()">

                                                            <input type="hidden" name="file_absen" class="imagetag">
                                                            <div id="results1"> <small> Wajib! Take Snapshot terlebih dahulu Sebagai Bukti Absen Izin, Setelah ada hasil fotonya isi keterangan izin dan tekan tombol "Presensi"</small> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="ml-2">Jenis Izin</label>
                                                          <select class="form-control" name="jenis_absen" id="">
                                                              <option value="Izin Sakit">Sakit</option>
                                                              <option value="Izin Keperluan Lain">Keperluan Lain</option>
                                                          </select>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="ml-2">Alasan Izin</label>
                                                            <textarea class="form-control" name="keterangan" required></textarea>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <small class="ml-2">Bukti Izin<small
                                                                    style="color: red">*Max
                                                                    2MB</small></small>
                                                            <input type="file" name="file_absen"
                                                                class="form-control @error('file_absen') is-invalid @enderror">

                                                            @error('file_absen')
                                                                <div class="invalid-feedback mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div> --}}
                                                        <div class="form-group">
                                               
                                                        <input type="hidden"  class="form-control"  name="latitude">
                                                        <input type="hidden" name="longitude"  class="form-control">
                                                    </div>
                                                        <button class="btn btn-danger buttonprevent" type="submit">
                                                            <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Loading </div>
                                                            <div class="hidetext">Izin</div>

                                                        </button>
                                                </div>
                                                </form>

                                            </th>
                                      
                                </tr>

                             

                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

         
            <div class="alert alert-danger" role="alert">
                <p class="card-text">
                    <b> Note :</b> <br>
                    - Mohon Para Praktikan hendak absen silahkan tunggu tombol "presensi" berubah menjadi tombol biru sesuai jam yang ada di peraturan absensi tersebut. <br>
                    - Mohon para Praktikan Absen setiap hari ketika magang anda berlangsung jika para Praktikan tidak
                    hadir magang karena sakit silahkan absen izin. <br>
                    - Mohon para Praktikan Kelompok tidak boleh tekan button "prensensi" punya nama temannya hanya
                    diperbolehkan punya nama sendiri. <br>
                    - Mohon tekan button "cetak absen" di tabel rekap absen untuk mencetak absen. <br>
                    - Mohon Para Praktikan mengikuti peraturan absen jika melanggar/tidak jujur akan diberikan sanksi.

                </p>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>


</div>
</div>
<!-- End of Main Content -->



<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT PAL
                <?= date('Y') ?> Powered By ANAK IT PENS 19
            </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- Begin Page Content -->

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script language="JavaScript">
Webcam.set({
width: 400,
height: 300,
image_format: 'jpeg',
jpeg_quality: 100
});
camera = document.getElementById("my_camera");
Webcam.attach(camera);

function take_snapshot() {
Webcam.snap(function(data_uri) {
    $(".image-tag").val(data_uri);
    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
});
}
</script>
<script language="JavaScript">
Webcam.set({
width: 400,
height: 300,
image_format: 'jpeg',
jpeg_quality: 100
});
camera = document.getElementById("mycamera");
Webcam.attach(camera);

function takesnapshot() {
Webcam.snap(function(data_uri) {
    $(".imagetag").val(data_uri);
    document.getElementById('results1').innerHTML = '<img src="' + data_uri + '"/>';
});
}
</script>


<script type="text/javascript">
navigator.geolocation.getCurrentPosition(function(position) {
let lat = position.coords.latitude;
let long = position.coords.longitude;

document.querySelector('.myForm input[name="latitude"]').value=lat;  
document.querySelector('.myForm input[name="longitude"]').value=long;
});
</script>
<script type="text/javascript">
navigator.geolocation.getCurrentPosition(function(position) {
let lat = position.coords.latitude;
let long = position.coords.longitude;

document.querySelector('.my-Form input[name="latitude"]').value=lat;  
document.querySelector('.my-Form input[name="longitude"]').value=long;
});
</script>

<script>
// jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
(function () {
  $('#form-prevent').on('submit', function () {
      $('.button-prevent').attr('disabled', 'true');
      $('.spinner').show();
      $('.hide-text').hide();
  })
})();
</script>
<script>
// jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
(function () {
  $('#formprevent').on('submit', function () {
      $('.buttonprevent').attr('disabled', 'true');
      $('.spinner').show();
      $('.hidetext').hide();
  })
})();
</script>
@yield('footer')

</body>

</html>