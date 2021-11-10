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
Route::get('/home', [WelcomeController::class, 'home']);
// Welcome HCM

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
Route::get('/absen', [DivisiController::class, 'Absen']);
Route::get('/tambah_absenmhs/{id}', [DivisiController::class, 'tambah_absenmhs']);
Route::get('/tambah_absensmk/{id}', [DivisiController::class, 'tambah_absensmk']);
Route::post('/proses_absenmhs/{id}', [DivisiController::class, 'proses_absenmhs'])->name('tambahabsenmhs');
Route::post('/proses_absensmk/{id}', [DivisiController::class, 'proses_absensmk'])->name('tambahabsensmk');
Route::get('/magang-aktif', [DivisiController::class, 'showMagangAktif']);
Route::get('/kuota', [DivisiController::class, 'Kuota']);
Route::get('/tambah_kuota', [DivisiController::class, 'tambah_kuota']);
Route::post('/proses_kuota', [DivisiController::class, 'proses_kuota'])->name('proseskuota');
Route::get('/edit_kuota', [DivisiController::class, 'edit_kuota']);
Route::get('/proses_penerimaan/{user_id}', [DivisiController::class, 'proses_penerimaan']);
Route::get('/proses-penerimaan-smk/{user_id}', [DivisiController::class, 'proses_penerimaan_smk']);
Route::put('/proses_penerimaan/{id}', [DivisiController::class, 'updatePenerimaan']);
Route::put('/proses-penerimaan-smk/{id}', [DivisiController::class, 'upPenerimaanSmk']);
Route::get('/pdf-mhs/{id}', [DivisiController::class, 'showPdfMhs']);
Route::get('/pdf-mhs-kel/{id}', [DivisiController::class, 'showPdfMhsKel']);
Route::get('/pdf-smk/{id}', [DivisiController::class, 'showPdfSmk']);
Route::get('/diterima', [DivisiController::class, 'showDiterima']);
Route::get('/final-penerimaan-mhs/{user_id}', [DivisiController::class, 'finalMhs']);
Route::get('/magang-selesai-mhs', [DivisiController::class, 'selesaiMhs']);
Route::put('/update-magang-divisi/{user_id}', [DivisiController::class, 'updatemagangdivisi']);
Route::put('/update-magang-divisi-smk/{user_id}', [DivisiController::class, 'updatemagangdivisismk']);
Route::get('delete-selesai-mhs/{id}',[DivisiController::class,'deleteselesaimhs']);
Route::get('/hapus-interview-mhs/{id}/{foto}', [DivisiController::class, 'hapus_interview_mhs']);
Route::get('/hapus-interview-smk/{id}/{foto}', [DivisiController::class, 'hapus_interview_smk']);
Route::get('/hapus-interview-mhs-kel/{id}/{foto}', [DivisiController::class, 'hapus_interview_mhs_kel']);
Route::get('/proses-magang-aktmhs/{id}', [DivisiController::class, 'magangAktMhs']);
Route::get('/proses-magang-aktsmk/{user_id}', [DivisiController::class, 'magangAktSmk']);
Route::get('/final-penerimaan-mhs/{id}/{foto}', [DivisiController::class, 'hapusfileMhs']);
Route::get('/final-penerimaan-mhs-kel/{id}/{foto}', [DivisiController::class, 'hapusfileMhsKel']);
Route::put('/final-penerimaan-mhs/{id}', [DivisiController::class, 'updateDiterima']);
Route::put('/final-penerimaan-smk/{id}', [DivisiController::class, 'updateDiterimaSmk']);
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
Route::get('/isi_penilaian_smk/{id}', [DivisiController::class, 'isi_penilaian_smk']);
Route::post('/proses_penilaian_smk/{id}', [DivisiController::class, 'proses_penilaian_smk'])->name('tambahnilaismk');

Route::get('magang-interview',[DivisiController::class,'interview']);
Route::get('terima-interview-mhs/{id}',[DivisiController::class,'terimainterviewmhs']);
Route::get('terima-interview-smk/{id}',[DivisiController::class,'terimainterviewsmk']);
// End Halaman Divisi ========================

// Penelitian ================================
Route::get('/regis-step2', [PenelitianController::class, 'index']);
Route::get('/id-card', [PenelitianController::class, 'idCard']);
// Penelitian ================================


// Halaman Magang Mahasiswa Individu ==================
Route::get('/data-mhs', [MagangController::class, 'data_mhs']);

Route::get('/input-data-mhs', [MagangController::class, 'input_data_mhs']);
Route::post('/input-data-mhs', [MagangController::class, 'proses_data_mhs']);

Route::get('/edit-data-mhs/{id}', [MagangController::class, 'edit_data_mhs']);
Route::put('/edit-data-mhs/{id}', [MagangController::class, 'update_data_mhs']);

Route::get('/berkas-mhs', [MagangController::class, 'berkas_mhs']);
Route::post('/berkas-mhs', [MagangController::class, 'proses_berkas_mhs']);
Route::get('/berkas-mhs/{id}/{path}', [MagangController::class, 'proses_hapus_berkas']);
Route::get('/berkas-mhs-semua', [MagangController::class, 'berkas_mhs_semua']);

Route::get('/interview-mhs',[MagangController::class,'interview_mhs']);
Route::get('/interview-mhs/{id}',[MagangController::class,'interview_mhs_upload']);
Route::post('/interview-mhs/{id}',[MagangController::class,'proses_interview_mhs_upload']);

Route::get('/dokumen-mhs', [MagangController::class, 'dokumen_mhs']);
Route::get('/dokumen-mhs/{id}/{foto}', [MagangController::class, 'hapus_mhs_dokumen']);
Route::get('/dokumen-mhs-foto/{id}/{fotoID}', [MagangController::class, 'hapus_mhs_foto']);

Route::get('/dokumen-mhs-upload/{id}', [MagangController::class, 'show_mhs_dokumen']);
Route::get('/dokumen-mhs-upload-foto/{id}', [MagangController::class, 'show_mhs_foto']);
Route::post('/upload-mhs-foto/{id}', [MagangController::class, 'upload_mhs_foto']);
Route::post('/upload-mhs/{id}', [MagangController::class, 'upload_mhs']);

Route::get('/profil-mhs', [MagangController::class, 'profil_mhs']);

Route::get('/absen-mhs', [MagangController::class, 'absen_mhs']);
Route::get('/proses-absen-mhs/{absenid}/{individ}', [MagangController::class, 'proses_absen_mhs']);

Route::get('/id-card-mhs', [MagangController::class, 'id_card_mhs']);
Route::get('/id-card-mhs-pdf', [MagangController::class, 'id_card_mhs_pdf']);
Route::get('/id-card-mhs-pdf-save', [MagangController::class, 'id_card_mhs_pdf_save']);

Route::get('/laporan-mhs', [MagangController::class, 'laporan_mhs']);
Route::get('/upload-laporan', [MagangController::class, 'upload_laporan']);
Route::post('/proses-laporan', [MagangController::class, 'proses_laporan']);
Route::get('/lihat-laporan-mhs/{id}', [MagangController::class, 'lihat_laporan_mhs']);
Route::get('/edit-laporan-mhs/{id}', [MagangController::class, 'edit_laporan_mhs']);
Route::put('/proses-edit-laporan-mhs/{id}', [MagangController::class, 'proses_edit_laporan_mhs']);

Route::get('penilaian-mhs', [MagangController::class, 'penilaian_mhs']);
// Halaman Magang Mahasiswa Individu ==================


// Halaman Magang Mahasiswa Kelompok ==================
Route::get('/data-mhs-kelompok', [MagangController::class, 'data_mhs_kelompok']);

Route::get('/input-mhs-kelompok', [MagangController::class, 'input_mhs_kelompok']);
Route::post('/input-mhs-kelompok', [MagangController::class, 'proses_data_mhs_kelompok']);
Route::get('/edit-data-mhs-kelompok/{id}', [MagangController::class, 'edit_data_mhs_kelompok']);
Route::put('/edit-data-mhs-kelompok/{id}', [MagangController::class, 'update_data_mhs_kelompok']);
Route::get('/delete-data-mhs-kelompok/{user_id}', [MagangController::class, 'proses_hapus_mhs_kelompok']);

Route::get('/berkas-mhs-kelompok', [MagangController::class, 'berkas_mhs_kelompok']);
Route::post('/berkas-mhs-kelompok', [MagangController::class, 'proses_berkas_mhs_kelompok']);
Route::get('/berkas-mhs-kelompok-semua', [MagangController::class, 'berkas_mhs_kelompok_semua']);
Route::get('/berkas-mhs-kelompok/{id}', [MagangController::class, 'berkas_mhs_kelompok_lihat']);
Route::get('/berkas-mhs-kelompok/{id}/{path}', [MagangController::class, 'proses_hapus_berkas_kelompok']);

Route::get('/interview-mhs-kel/{id}',[MagangController::class,'interview_mhs_kel_upload']);
Route::post('/interview-mhs-kel/{id}',[MagangController::class,'proses_interview_mhs_kel_upload']);

Route::get('/dokumen-mhs-kel-upload-foto/{id}', [MagangController::class, 'show_mhs_kel_foto']);
Route::get('/dokumen-mhs-kel-upload/{id}', [MagangController::class, 'show_mhs_kel_dokumen']);

Route::get('/dokumen-mhs-kel/{id}/{foto}', [MagangController::class, 'hapus_mhs_kel_dokumen']);
Route::get('/dokumen-mhs-kel-foto/{id}/{fotoID}', [MagangController::class, 'hapus_mhs_kel_foto']);

Route::post('/upload-mhs-kel-foto/{id}', [MagangController::class, 'upload_mhs_kel_foto']);
Route::post('/upload-mhs-kel/{id}', [MagangController::class, 'upload_mhs_kel']);
// Halaman Magang Mahasiswa Kelompok ==================


// Halaman Magang SMK Individu ==================
Route::get('/data-smk', [MagangController::class, 'data_smk']);

Route::get('/input-data-smk', [MagangController::class, 'input_data_smk']);
Route::post('/input-data-smk', [MagangController::class, 'proses_data_smk']);

Route::get('/edit-data-smk/{id}', [MagangController::class, 'edit_data_smk']);
Route::put('/edit-data-smk/{id}', [MagangController::class, 'update_data_smk']);

Route::get('/berkas-smk', [MagangController::class, 'berkas_smk']);
Route::post('/berkas-smk', [MagangController::class, 'proses_berkas_smk']);
Route::get('/berkas-smk/{id}/{path}', [MagangController::class, 'proses_hapus_berkas_smk']);
Route::get('/berkas-smk-semua', [MagangController::class, 'berkas_smk_semua']);

Route::get('/interview-smk',[MagangController::class,'interview_smk']);
Route::get('/interview-smk/{id}',[MagangController::class,'interview_smk_upload']);
Route::post('/interview-smk/{id}',[MagangController::class,'proses_interview_smk_upload']);

Route::get('/dokumen-smk', [MagangController::class, 'dokumen_smk']);
Route::get('/dokumen-smk/{id}/{foto}', [MagangController::class, 'hapus_smk_dokumen']);
Route::get('/dokumen-smk-foto/{id}/{fotoID}', [MagangController::class, 'hapus_smk_foto']);

Route::get('/dokumen-smk-upload/{id}', [MagangController::class, 'show_smk_dokumen']);
Route::get('/dokumen-smk-upload-foto/{id}', [MagangController::class, 'show_smk_foto']);
Route::post('/upload-smk-foto/{id}', [MagangController::class, 'upload_smk_foto']);
Route::post('/upload-smk/{id}', [MagangController::class, 'upload_smk']);
// Halaman Magang SMK Individu ==================

Route::get('/Data_smk/{id}/{path}', [MagangController::class, 'proses_hapus_fileSmk']);
Route::get('/Data_smk_kel_lihat/{id}', [MagangController::class, 'liat_file_smk_kel']);
Route::get('/Data_smk_kel/{id}/{path}', [MagangController::class, 'proses_hapus_file_smk_kel']);

Route::get('/input-smk-kelompok', [MagangController::class, 'inputDataSmkKel']);
Route::post('/input-smk-kelompok', [MagangController::class, 'proses_data_smkKelompok'])->name('uploadsmkkel');
Route::get('/edit-data-smkInd/{id}', [MagangController::class, 'editDataSmk']);
Route::put('/edit-data-smkInd/{id}', [MagangController::class, 'updateDataSmk']);
Route::get('/edit-data-smkKel/{id}', [MagangController::class, 'editDataSmkKel']);
Route::put('/edit-data-smkKel/{id}', [MagangController::class, 'updateDataSmkKel']);
Route::get('/delete-data-smkKel/{user_id}', [MagangController::class, 'proses_hapus_smkkelompok']);
Route::get('/berkas-smk-kel', [MagangController::class, 'file_smk_kelompok']);
Route::post('/berkas-smk-kel', [MagangController::class, 'proses_file_smk_kelompok'])->name('fileSmkKel');
Route::get('/openpdf-smk', [MagangController::class, 'openpdf_smk']);
Route::get('/open-pdf-smk-kel', [MagangController::class, 'OpenPDFSMKKel']);
Route::get('/Dokumen_smk', [MagangController::class, 'Dokumen_smk']);
Route::get('/Dokumen_smk_upload', [MagangController::class, 'showUploadSmk']);
Route::get('/Dokumen_smk/{id}/{foto}', [MagangController::class, 'hapus_dok_smk']);
Route::get('/Dokumen_smk_upload/{id}/{fotoID}', [MagangController::class, 'hapusFotoSmk']);
Route::post('/Dokumen_smk_upload', [MagangController::class, 'uploadDocFotoSmk'])->name('uploadFotoSmk');
Route::post('/Dokumen_smk', [MagangController::class, 'upFotoSmk'])->name('upFotoSmk');
Route::get('/Profil_smk', [MagangController::class, 'Profil_smk']);
Route::get('/Absen_smk', [MagangController::class, 'Absen_smk']);
Route::get('/proses_absensmk/{absenid}/{individ}', [MagangController::class, 'proses_absensmk']);
Route::get('/id_card_smk', [MagangController::class, 'id_card_smk']);
Route::get('/sertifikat_smk', [MagangController::class, 'sertifikat_smk']);
Route::get('/data-smk-kelompok', [MagangController::class, 'Data_smk_kelompok']);

Route::get('/Kuota', [MagangController::class, 'Kuota']);

Route::get('/sertifikat_mhs', [MagangController::class, 'sertifikat_mhs']);
Route::get('/sertif-mhs-pdf', [MagangController::class, 'sertifikatmhspdf']);