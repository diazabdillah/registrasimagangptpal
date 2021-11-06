<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WelcomeController;

// Web Landing =================================
Route::get('/', [WebController::class, 'index']);
// Web Landing =================================
Route::get('/profile', function () {
    return view('frontend.profile');
});

Route::get('/news', [WebController::class, 'showNews']);

Route::get('/gallery', function () {
    return view('frontend.gallery');
});
Route::get('/internship', function () {
    return view('frontend.internship');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/service', function () {
    return view('frontend.service');
});

// Welcome HCM
// Route::get('/hcm-welcome', [WelcomeController::class, 'index']);
Route::get('/home', [WelcomeController::class, 'home']);

// Bagian auth registrasi sampai login  ===============
Route::get('/login', [AuthhController::class, 'index'])->name('login');
Route::post('/loginpost', [AuthhController::class, 'postLogin'])->name('loginpost'); // Post Form Login
Route::get('/auth', [AuthhController::class, 'auth']);
Route::get('/auth_mhs', [AuthhController::class, 'auth_mhs']);
Route::get('/auth_mhs_kel', [AuthhController::class, 'auth_mhs_kel']);
Route::post('/auth_mhs_kel', [AuthhController::class, 'postRegMhsKel'])->name('RegMhsKel'); // Post Form Regis
Route::get('/auth_mhs_individu', [AuthhController::class, 'auth_mhs_individu']);
Route::post('/auth_mhs_individu', [AuthhController::class, 'postRegMhsIndiv'])->name('RegMhsIndiv'); // Post Form Regis
Route::get('/auth_smk', [AuthhController::class, 'auth_smk']);
Route::get('/auth_smk_kel', [AuthhController::class, 'auth_smk_kel']);
Route::post('/auth_smk_kel', [AuthhController::class, 'postRegSmkKel'])->name('RegSmkKel'); // Post Form Regis
Route::get('/auth_smk_individu', [AuthhController::class, 'auth_smk_individu']);
Route::post('/auth_smk_individu', [AuthhController::class, 'postRegSmkIndiv'])->name('RegSmkIndiv'); // Post Form Regis
Route::get('/auth-penelitian', [AuthhController::class, 'authPenelitian']);
Route::post('/auth-penelitian', [AuthhController::class, 'postRegPenelitian'])->name('RegPenelitian'); // Post Form Regis
// End bagian auth registrasi sampai login ======

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Menu ===============================
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/sub-menu', [MenuController::class, 'Submenu']);
// Route::get('/home', [MenuController::class, 'menu']);
// Route::get('/webBack', [MenuController::class, 'menuM']);
// Route::get('/webBack', [MenuController::class, 'dataSubmenu']);
// Menu ===============================

// Bagian Berita ================================
Route::get('/show-berita', [MenuController::class, 'News']);
Route::get('/input-berita', [MenuController::class, 'inputBerita']);
Route::post('/input-berita', [MenuController::class, 'prosesInputBerita'])->name('uploadBerita');
Route::get('/edit-berita/{id}', [MenuController::class, 'editBerita']);
Route::put('/edit-berita/{id}', [MenuController::class, 'updateBerita']);
Route::get('delete-berita/{user_id}', [MenuController::class, 'deleteBerita']);
// Bagian Berita ================================

// Bagian Galeri ================================
Route::get('/galeri', [MenuController::class, 'Gallery']);
Route::get('/input-galeri', [MenuController::class, 'inputGaleri']);
Route::post('/input-galeri', [MenuController::class, 'prosesInputGaleri'])->name('uploadGaleri');
Route::get('/edit-galeri/{id}', [MenuController::class, 'editGaleri']);
Route::put('/edit-galeri/{id}', [MenuController::class, 'updateGaleri']);
Route::get('delete-galeri/{user_id}', [MenuController::class, 'deleteGaleri']);
// Bagian Galeri ================================

// Halaman administrasi ========================
Route::get('/admin_dash', [AdminController::class, 'index']);
Route::get('/Rekap', [AdminController::class, 'Rekap']);
Route::get('/RekapKelompok', [AdminController::class, 'Rekapkelompok']);
Route::get('/cetakRekapPDF', [AdminController::class, 'cetak_rekappdf']);
Route::get('/cetakRekapEXCEL', [AdminController::class, 'cetak_rekapexcel']);
Route::get('/cetakRekapKelompokPDF', [AdminController::class, 'cetak_rekap_kelompokpdf']);
Route::get('/cetakRekapKelompokEXCEL', [AdminController::class, 'cetak_rekap_kelompokexcel']);
// End Halaman administrasi ========================

// Halaman Divisi ========================
Route::get('/Penerimaan', [DivisiController::class, 'index']);
Route::get('/absen', [DivisiController::class, 'Absen_mhs']);
Route::get('/tambah_absenmhs/{id}', [DivisiController::class, 'tambah_absenmhs']);
Route::post('/proses_absenmhs/{id}', [DivisiController::class, 'proses_absenmhs'])->name('tambahabsen');

Route::get('/magang-aktif', [DivisiController::class, 'showMagangAktif']);
Route::get('/kuota', [DivisiController::class, 'Kuota']);
Route::get('/tambah_kuota', [DivisiController::class, 'tambah_kuota']);
Route::post('/proses_kuota', [DivisiController::class, 'proses_kuota'])->name('proseskuota');
Route::get('/edit_kuota', [DivisiController::class, 'edit_kuota']);
Route::get('/data_id_card', [DivisiController::class, 'data_id_card']);
Route::get('/data_id_card/update/{id}', [DivisiController::class, 'proses_idcard']);
Route::get('/proses_penerimaan/{user_id}', [DivisiController::class, 'proses_penerimaan']);
Route::get('/proses_penerimaan-mhskel/{id}', [DivisiController::class, 'proses_penerimaan_mhskel'])->name('tampilMhsKel');
Route::get('/proses-penerimaan-smk/{user_id}', [DivisiController::class, 'proses_penerimaan_smk']);
Route::put('/proses_penerimaan/{id}', [DivisiController::class, 'updatePenerimaan']);
Route::put('/proses_penerimaan_mhskel/{id}', [DivisiController::class, 'updatePenerimaanmhskel']);
Route::put('/proses-penerimaan-smk/{id}', [DivisiController::class, 'upPenerimaanSmk']);
Route::get('/pdf-mhs/{id}', [DivisiController::class, 'showPdfMhs']);
Route::get('/pdf-smk/{id}', [DivisiController::class, 'showPdfSmk']);
Route::get('/diterima', [DivisiController::class, 'showDiterima']);
Route::get('/final-penerimaan-mhs/{user_id}', [DivisiController::class, 'finalMhs']);
Route::get('/magang-selesai-mhs', [DivisiController::class, 'selesaiMhs']);
Route::put('/update-magang-divisi/{user_id}', [DivisiController::class, 'updatemagangdivisi']);
Route::get('delete-selesai-mhs/{id}',[DivisiController::class,'deleteselesaimhs']);

Route::get('/proses-magang-aktmhs/{id}', [DivisiController::class, 'magangAktMhs']);

Route::get('/proses-magang-aktsmk/{user_id}', [DivisiController::class, 'magangAktSmk']);
Route::get('/final-penerimaan-mhs/{id}/{foto}', [DivisiController::class, 'hapusfileMhs']);
Route::put('/final-penerimaan-mhs/{id}', [DivisiController::class, 'updateDiterima']);
Route::put('/proses-magang-aktmhs/{id}', [DivisiController::class, 'mulaiSelesai']);
Route::get('/final-penerimaan-smk/{user_id}', [DivisiController::class, 'finalSmk']);
Route::get('/final-penerimaan-smk/{id}/{foto}', [DivisiController::class, 'hapusfileSmk']);
Route::get('/final-penerimaan-smkfoto/{id}/{fotoID}', [DivisiController::class, 'hapusfotoSmk']);

Route::get('/rekam-jejak-magang', [DivisiController::class, 'rekam_jejak_magang']);
Route::get('/rekam-jejak', [DivisiController::class, 'rekam_jejak']);
Route::get('/laporan', [DivisiController::class, 'laporan']);
Route::get('/editlaporan/{id}', [DivisiController::class, 'editlaporan']);
Route::put('/proseseditlaporan/{id}', [DivisiController::class, 'proseseditlaporan']);

Route::get('/penilaian', [DivisiController::class, 'penilaian']);
Route::get('/isi_penilaian/{id}', [DivisiController::class, 'isi_penilaian']);
Route::post('/proses_penilaian/{id}', [DivisiController::class, 'proses_penilaian'])->name('tambahnilai');
// End Halaman Divisi ========================

// Penelitian ================================
Route::get('/regis-step2', [PenelitianController::class, 'index']);
Route::get('/id-card', [PenelitianController::class, 'idCard']);
// Penelitian ================================

// Halaman Magang Mahasiswa ==================
Route::get('/laporan_mhs', [MagangController::class, 'laporan']);
Route::get('/upload_laporan', [MagangController::class, 'upload_laporan']);
Route::post('/proses_laporan', [MagangController::class, 'proses_laporan'])->name('proseslaporan');
Route::get('/lihat_laporan_mhs/{id}', [MagangController::class, 'lihatlaporanmhs']);
Route::get('/edit_laporan_mhs/{id}', [MagangController::class, 'editlaporanmhs']);
Route::put('/proseseditfilelaporan/{id}', [MagangController::class, 'proseseditlaporanmhs']);

Route::get('/Profil_mhs', [MagangController::class, 'Profil_mhs']);

Route::get('/Data_mhs', [MagangController::class, 'Data_mhs']);
Route::get('/Data_mhs/{id}/{path}', [MagangController::class, 'proses_hapus_file']);
Route::get('/Data_mhs_lihat/{id}', [MagangController::class, 'liat_file']);
Route::get('/openpdf', [MagangController::class, 'OpenPDF']);
Route::get('/openpdfkel', [MagangController::class, 'OpenPDFkel']);

Route::get('/input-data-mhsInd', [MagangController::class, 'inputDataMhs']);
Route::post('/input-data-mhsInd', [MagangController::class, 'proses_data_mhs'])->name('upload');
Route::get('/edit-data-mhsInd/{id}', [MagangController::class, 'editDataMhs']);
Route::put('/edit-data-mhsInd/{id}', [MagangController::class, 'updateDataMhs']);
Route::get('/berkas-mhs-indiv', [MagangController::class, 'file_mhs']);
Route::post('/berkas-mhs-indiv', [MagangController::class, 'proses_file_mhs'])->name('file');

Route::get('/Dokumen_mhs', [MagangController::class, 'Dokumen_mhs']);
Route::get('/Dokumen_mhs/{id}/{foto}', [MagangController::class, 'hapus_dok_mhs']);
Route::get('/Dokumen_mhs_upload/{id}/{fotoID}', [MagangController::class, 'hapusFotoMhs']);
// Route::get('/edit-data-foto3x4/{id}', [MagangController::class, 'edit_data_foto3x4']);
// Route::put('/edit-data-foto3x4/{id}', [MagangController::class, 'proses_data_foto3x4']);

Route::get('magang.Dokumen_mhs_upload/{id}', [MagangController::class, 'showUploadMhs']);
Route::get('magang.Dokumen_mhs_uploadfoto3x4/{id}', [MagangController::class, 'showUploadMhs3x4']);
Route::post('magang.Dokumen_mhs/{id}', [MagangController::class, 'upFotoMhs'])->name('upFotoMhs');
Route::get('/tableabsen_mhs', [MagangController::class, 'tableabsen_mhs']);
Route::get('/absen_mhs', [MagangController::class, 'absen_mhs']);
Route::get('/proses_absenmhs/{absenid}/{individ}', [MagangController::class, 'proses_absenmhs']);
Route::get('/id_card_mhs', [MagangController::class, 'id_card_mhs']);
Route::get('/Kuota', [MagangController::class, 'Kuota']);
Route::get('penilaian_mhs', [MagangController::class, 'penilaian_mhs']);
// Export PDF ID Card
Route::get('/idcard-mhs-pdf', [MagangController::class, 'idCardMhsPdf'])->name('expdfidcard');
Route::get('/idcard-mhs-savepdf', [MagangController::class, 'idCardMhsSavePdf'])->name('savepdfidcard');
Route::get('/sertifikat_mhs', [MagangController::class, 'sertifikat_mhs']);
Route::get('/sertif-mhs-pdf', [MagangController::class, 'sertifikatmhspdf']);
// data mahasiswa kelompok
Route::get('/data-mhs-kelompok', [MagangController::class, 'data_mhs_kelompok']);
Route::get('/input-mhs-kelompok', [MagangController::class, 'inputDataMhsKel']);
Route::post('/input-mhs-kelompok', [MagangController::class, 'proses_data_mhsKelompok'])->name('uploadkel');
Route::get('/berkas-mhs-kel', [MagangController::class, 'file_mhs_kelompok']);
Route::post('/berkas-mhs-kel', [MagangController::class, 'proses_file_mhs_kelompok'])->name('filekel');
Route::get('/input-mhs-tambahkelompok', [MagangController::class, 'inputDatatambahMhsKel']);
Route::post('/input-mhs-tambahkelompok', [MagangController::class, 'proses_data_tambahmhsKelompok'])->name('uploadtambahkel');
Route::get('/edit-data-mhskel/{id}', [MagangController::class, 'editDataMhskel']);
Route::put('/edit-data-mhskel/{id}', [MagangController::class, 'updateDataMhskel']);
Route::get('delete-data-mhskel/{user_id}', [MagangController::class, 'proses_hapus_mhskelompok']);

Route::get('/testinterview',[MagangController::class,'testinterview']);
// End Halaman Magang Mahasiswa ==================

// Halaman Magang SMK ===========================
Route::get('/Data_smk', [MagangController::class, 'Data_smk']);
Route::get('/Data_smk/{id}/{path}', [MagangController::class, 'proses_hapus_fileSmk']);
Route::get('/input-data-smkInd', [MagangController::class, 'inputDataSmk']);
Route::post('/input-data-smkInd', [MagangController::class, 'proses_data_smk'])->name('dataSmk');
Route::get('/edit-data-smkInd/{id}', [MagangController::class, 'editDataSmk']);
Route::put('/edit-data-smkInd/{id}', [MagangController::class, 'updateDataSmk']);
Route::get('/berkas-smk-indiv', [MagangController::class, 'file_smk']);
Route::post('/berkas-smk-indiv', [MagangController::class, 'proses_file_smk'])->name('fileSmk');
Route::get('/openpdf-smk', [MagangController::class, 'openpdf_smk']);
Route::get('/Dokumen_smk', [MagangController::class, 'Dokumen_smk']);
Route::get('/Dokumen_smk_upload', [MagangController::class, 'showUploadSmk']);
Route::get('/Dokumen_smk/{id}/{foto}', [MagangController::class, 'hapus_dok_smk']);
Route::get('/Dokumen_smk_upload/{id}/{fotoID}', [MagangController::class, 'hapusFotoSmk']);
Route::post('/Dokumen_smk_upload', [MagangController::class, 'uploadDocFotoSmk'])->name('uploadFotoSmk');
Route::post('/Dokumen_smk', [MagangController::class, 'upFotoSmk'])->name('upFotoSmk');
Route::get('/Profil_smk', [MagangController::class, 'Profil_smk']);
Route::get('/Absen_smk', [MagangController::class, 'Absen_smk']);
Route::get('/id_card_smk', [MagangController::class, 'id_card_smk']);
Route::get('/sertifikat_smk', [MagangController::class, 'sertifikat_smk']);
Route::get('/data-smk-kelompok', [MagangController::class, 'Data_smk_kelompok']);
// End Halaman Magang SMK =======================