<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\ForumController;
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
Route::get('/penuh', [MagangController::class, 'kuotapenuh']);

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
Route::get('/Rekap', [AdminController::class, 'Rekapmhs']);
Route::get('/Rekap-mhs-kelompok', [AdminController::class, 'Rekapmhskel']);
Route::get('/Rekap-Smk', [AdminController::class, 'Rekapsmk']);
Route::get('/Rekap-smk-kelompok', [AdminController::class, 'Rekapsmkkel']);
Route::get('/Rekap-penelitian', [AdminController::class, 'Rekappenelitian']);
Route::get('/cetakRekapMhsPDF', [AdminController::class, 'cetak_rekapmhspdf']);
Route::get('/cetakRekapmhskelPDF', [AdminController::class, 'cetak_rekapmhskelpdf']);
Route::get('/cetakRekapSmkPDF', [AdminController::class, 'cetak_rekapsmkpdf']);
Route::get('/cetakRekapSmkKelPDF', [AdminController::class, 'cetak_rekapsmkkelpdf']);
Route::get('/cetakRekapPenelitianPDF', [AdminController::class, 'cetak_rekappenelitianpdf']);
Route::get('/cetakRekapMhsKelEXCEL', [AdminController::class, 'cetak_rekapmhskelexcel']);
Route::get('cetakRekapSmkEXCEL', [AdminController::class, 'cetak_rekapsmkexcel']);
Route::get('/cetakRekapMhsEXCEL', [AdminController::class, 'cetak_rekapmhsexcel']);
Route::get('/cetakRekapSmkKelEXCEL', [AdminController::class, 'cetak_rekapsmkkelexcel']);
Route::get('/cetakRekapPenelitianEXCEL', [AdminController::class, 'cetak_rekappenelitianexcel']);

// End Halaman administrasi ========================

// Halaman Divisi ========================
Route::get('/Penerimaan', [DivisiController::class, 'index']);
Route::get('/absen', [DivisiController::class, 'Absen']);
Route::get('/lihat_absenmhs/{id}', [DivisiController::class, 'lihat_absenmhs']);
Route::get('/rekap-absenmhs', [DivisiController::class, 'rekap_absenmhs']);
Route::get('cetak-absen-pdf', [DivisiController::class, 'cetak_absen_pdf']);
Route::get('cetak-absen-smk-pdf', [DivisiController::class, 'cetak_absen_smk_pdf']);
Route::get('/rekap-absensmk', [DivisiController::class, 'rekap_absensmk']);
Route::get('/lihat_absensmk/{id}', [DivisiController::class, 'lihat_absensmk']);
Route::post('/proses_absenmhs/{id}', [DivisiController::class, 'proses_absenmhs'])->name('tambahabsenmhs');
Route::post('/proses_absensmk/{id}', [DivisiController::class, 'proses_absensmk'])->name('tambahabsensmk');
Route::get('/magang-aktif', [DivisiController::class, 'showMagangAktif']);
Route::get('/kuota', [DivisiController::class, 'Kuota']);
Route::get('/tambah-kuota', [DivisiController::class, 'tambah_kuota']);
Route::post('/proses-kuota', [DivisiController::class, 'proses_kuota'])->name('proseskuota');
Route::get('/edit-kuota/{id}', [DivisiController::class, 'edit_kuota']);
Route::put('/update-kuota/{id}', [DivisiController::class, 'update_kuota']);

Route::get('/proses_penerimaan/{user_id}', [DivisiController::class, 'proses_penerimaan']);
Route::get('/proses-penerimaan-smk/{user_id}', [DivisiController::class, 'proses_penerimaan_smk']);
Route::put('/proses_penerimaan/{id}', [DivisiController::class, 'updatePenerimaan']);
Route::put('/proses-penerimaan-smk/{id}', [DivisiController::class, 'upPenerimaanSmk']);
Route::get('/pdf-mhs/{id}', [DivisiController::class, 'showPdfMhs']);
Route::get('/pdf-mhs-kel/{id}', [DivisiController::class, 'showPdfMhsKel']);
Route::get('/pdf-smk/{id}', [DivisiController::class, 'showPdfSmk']);
Route::get('/pdf-smk-kel/{id}', [DivisiController::class, 'showPdfSmkKel']);
Route::get('/diterima', [DivisiController::class, 'showDiterima']);
Route::get('/final-penerimaan-mhs/{user_id}', [DivisiController::class, 'finalMhs']);
Route::get('/magang-selesai-mhs', [DivisiController::class, 'selesaiMhs']);
Route::get('proses-mhs-selesai/{id}', [DivisiController::class, 'proses_mhs_selesai']);
Route::put('update-selesai-mhs/{id}', [DivisiController::class, 'update_selesai_mhs']);
Route::get('/proses-smk-selesai/{id}', [DivisiController::class, 'proses_smk_selesai']);
Route::put('update-selesai-smk/{id}', [DivisiController::class, 'update_selesai_smk']);
Route::put('/update-magang-divisi/{id}', [DivisiController::class, 'updatemagangdivisi']);
Route::put('/update-magang-divisi-smk/{id}', [DivisiController::class, 'updatemagangdivisismk']);
Route::get('delete-selesai-mhs/{id}', [DivisiController::class, 'deleteselesaimhs']);
Route::get('delete-selesai-smk/{id}', [DivisiController::class, 'deleteselesaismk']);
Route::get('delete-selesai-mhs-kel/{id}', [DivisiController::class, 'deleteselesaimhskel']);
Route::get('delete-selesai-smk-kel/{id}', [DivisiController::class, 'deleteselesaismkkel']);
Route::get('/hapus-interview-mhs/{id}/{foto}', [DivisiController::class, 'hapus_interview_mhs']);
Route::get('/hapus-interview-smk/{id}/{foto}', [DivisiController::class, 'hapus_interview_smk']);
Route::get('/hapus-interview-mhs-kel/{id}/{foto}', [DivisiController::class, 'hapus_interview_mhs_kel']);
Route::get('/hapus-interview-smk-kel/{id}/{foto}', [DivisiController::class, 'hapus_interview_smk_kel']);
Route::get('/proses-magang-aktmhs/{id}', [DivisiController::class, 'magangAktMhs']);
Route::get('/proses-magang-aktsmk/{user_id}', [DivisiController::class, 'magangAktSmk']);
Route::get('/final-penerimaan-mhs/{id}/{foto}', [DivisiController::class, 'hapusfileMhs']);
Route::get('/final-penerimaan-mhs-kel/{id}/{foto}', [DivisiController::class, 'hapusfileMhsKel']);
Route::put('/final-penerimaan-mhs/{id}', [DivisiController::class, 'updateDiterima']);
Route::put('/final-penerimaan-smk/{id}', [DivisiController::class, 'updateDiterimaSmk']);
Route::put('/proses-magang-aktmhs/{id}', [DivisiController::class, 'mulaiSelesai']);
Route::put('/proses-magang-aktsmk/{id}', [DivisiController::class, 'mulaiSelesaismk']);
Route::get('/final-penerimaan-smk/{user_id}', [DivisiController::class, 'finalSmk']);
Route::get('/final-penerimaan-smk/{id}/{foto}', [DivisiController::class, 'hapusfileSmk']);
Route::get('/final-penerimaan-smk-kel/{id}/{foto}', [DivisiController::class, 'hapusfileSmkKel']);

Route::get('/rekam-jejak-magang', [DivisiController::class, 'rekam_jejak_magang']);
Route::get('/rekam-jejak', [DivisiController::class, 'rekam_jejak']);
Route::get('/laporan', [DivisiController::class, 'laporan']);
Route::get('/laporan-revisi', [DivisiController::class, 'laporan_revisi']);
Route::get('/editlaporan/{id}', [DivisiController::class, 'editlaporan']);
Route::put('/proseseditlaporan/{id}', [DivisiController::class, 'proseseditlaporan']);
Route::get('delete-laporan-mhs/{id}', [DivisiController::class, 'delete_laporan_mhs']);
Route::get('delete-laporan-smk/{id}', [DivisiController::class, 'delete_laporan_smk']);

Route::get('delete-laporan-penelitian/{id}', [DivisiController::class, 'delete_laporan_penelitian']);
Route::get('/penilaian', [DivisiController::class, 'penilaian']);
Route::get('/isi_penilaian/{id}', [DivisiController::class, 'isi_penilaian']);
Route::post('/proses_penilaian/{id}', [DivisiController::class, 'proses_penilaian'])->name('tambahnilai');
Route::get('/isi_penilaian_smk/{id}', [DivisiController::class, 'isi_penilaian_smk']);
Route::post('/proses_penilaian_smk/{id}', [DivisiController::class, 'proses_penilaian_smk'])->name('tambahnilaismk');

Route::get('magang-interview', [DivisiController::class, 'interview']);
Route::get('terima-interview-mhs/{id}', [DivisiController::class, 'terimainterviewmhs']);
Route::put('update-terima-interview/{user_id}', [DivisiController::class, 'update_terima_interview']);
Route::get('terima-interview-smk/{id}', [DivisiController::class, 'terimainterviewsmk']);

Route::get('/kelola-jurusan', [DivisiController::class, 'kelola_jurusan']);
Route::get('/proses-kelola-mhs/{id}', [DivisiController::class, 'proses_kelola_mhs']);
Route::put('/update-magang-departemen-mhs/{user_id}', [DivisiController::class, 'update_magang_departemen_mhs']);
Route::put('/update-departemen-mhs/{user_id}', [DivisiController::class, 'update_departemen_mhs']);
Route::put('update-departemen-smk/{user_id}', [DivisiController::class, 'update-departemen-smk']);
Route::put('/update-magang-departemen-smk/{user_id}', [DivisiController::class, 'update_magang_departemen_smk']);
Route::put('update-magang-departemen-penelitian/{user_id}', [DivisiController::class, 'update_magang_departemen_penelitian']);
Route::put('update-departemen-penelitian/{user_id}', [DivisiController::class, 'update_departemen_penelitian']);

Route::get('/proses-kelola-smk/{id}', [DivisiController::class, 'proses_kelola_smk']);
Route::get('/proses-kelola-penelitian/{id}', [DivisiController::class, 'proses_kelola_penelitian']);

Route::get('/penerimaan-penelitian', [DivisiController::class, 'penerimaan_penelitian']);
Route::get('proses-penerimaan-penelitian/{id}', [DivisiController::class, 'proses_penerimaan_penelitian']);
Route::get('berkas-penelitian/{id}', [DivisiController::class, 'berkas_penelitian']);
Route::put('update-penelitian-divisi/{id}', [DivisiController::class, 'update_penelitian_divisi']);
Route::put('/update-penerimaan-penelitian/{id}', [DivisiController::class, 'update_penerimaan_penelitian']);
Route::get('/diterima-penelitian', [DivisiController::class, 'diterima_penelitian']);
Route::get('final-penerimaan-penelitian/{id}', [DivisiController::class, 'final_penerimaan_penelitian']);
Route::get('/pdf-penelitian/{id}', [DivisiController::class, 'showPdfPenelitian']);
Route::put('update-final-penerimaan-penelitian/{id}', [DivisiController::class, 'update_final_penerimaan_penelitian']);
Route::get('hapus-final-penerimaan-penelitian/{id}/{foto}', [DivisiController::class, 'hapus_final_penerimaan_penelitian']);
Route::get('penelitian-aktif', [DivisiController::class, 'penelitian_aktif']);
Route::get('proses-penelitian-aktif/{user_id}', [DivisiController::class, 'proses_penelitian_aktif']);
Route::put('/update-penelitian-aktif/{id}', [DivisiController::class, 'update_penelitian_aktif']);
Route::post('/penelitian-aktif-waktu/{id}', [DivisiController::class, 'penelitian_aktif_waktu']);
Route::get('/absen-pnltn', [DivisiController::class, 'absen_pnltn']);
Route::get('/rekap-absenpenelitian', [DivisiController::class, 'rekap_absenpenelitian']);
Route::get('/cetak-absen-penelitian-pdf', [DivisiController::class, 'cetak_absen_penelitian_pdf']);
Route::get('lihat-absenpenelitian/{id}', [DivisiController::class, 'lihat_absenpenelitian']);
// Route::post('proses-absenpenelitian/{id}', [DivisiController::class, 'proses_absenpenelitian']);
Route::get('laporan-pnltn', [DivisiController::class, 'laporan_penelitian']);
Route::get('pnltn-selesai', [DivisiController::class, 'penelitian_selesai']);
Route::get('pnltn-kuota-penuh', [DivisiController::class, 'penelitian_kuota_penuh']);
Route::get('proses-penelitian-selesai/{id}', [DivisiController::class, 'proses_penelitian_selesai']);
Route::put('update-penelitian-selesai/{id}', [DivisiController::class, 'update_penelitian_selesai']);
Route::get('hapus-penelitian-selesai/{id}', [DivisiController::class, 'hapus_penelitian_selesai']);

Route::get('divisi', [DivisiController::class, 'divisi']);
Route::get('tambahdivisi', [DivisiController::class, 'tambah_divisi']);
Route::post('proses-divisi', [DivisiController::class, 'proses_divisi']);
Route::get('edit-divisi/{id}', [DivisiController::class, 'edit_divisi']);
Route::put('proses-edit-divisi/{id}', [DivisiController::class, 'proses_edit_divisi']);
Route::get('delete-divisi/{id}', [DivisiController::class, 'delete_divisi']);

Route::get('departemen', [DivisiController::class, 'departemen']);
Route::get('tambahdepartemen', [DivisiController::class, 'tambah_departemen']);
Route::post('proses-departemen', [DivisiController::class, 'proses_departemen']);
Route::get('edit-departemen/{id}', [DivisiController::class, 'edit_departemen']);
Route::put('proses-edit-departemen/{id}', [DivisiController::class, 'proses_edit_departemen']);
Route::get('delete-departemen/{id}', [DivisiController::class, 'delete_departemen']);

Route::get('magang-kuota-penuh', [DivisiController::class, 'magang_kuota_penuh']);
Route::get('ubah-magang-penuh-mhs/{id}', [DivisiController::class, 'ubah_magang_penuh_mhs']);
Route::get('hapus-magang-penuh-mhs/{id}', [DivisiController::class, 'hapus_magang_penuh_mhs']);

Route::get('ubah-magang-penuh-smk/{id}', [DivisiController::class, 'ubah_magang_penuh_smk']);
Route::get('hapus-magang-penuh-smk/{id}', [DivisiController::class, 'hapus_magang_penuh_smk']);

Route::get('ubah-magang-penuh-penelitian/{id}', [DivisiController::class, 'ubah_magang_penuh_penelitian']);
Route::get('hapus-magang-penuh-penelitian/{id}', [DivisiController::class, 'hapus_magang_penuh_penelitian']);
// End Halaman Divisi ========================


// Halaman Magang Mahasiswa Individu ==================
Route::get('/data-mhs', [MagangController::class, 'data_mhs']);

Route::get('/input-data-mhs', [MagangController::class, 'input_data_mhs']);
Route::post('/input-data-mhs', [MagangController::class, 'proses_data_mhs']);
Route::get('/selesai', [MagangController::class, 'selesai_mhs']);
Route::get('/edit-data-mhs/{id}/{id_rekap}', [MagangController::class, 'edit_data_mhs']);
Route::put('/edit-data-mhs/{id}/{id_rekap}', [MagangController::class, 'update_data_mhs']);

Route::get('/berkas-mhs', [MagangController::class, 'berkas_mhs']);
Route::post('/berkas-mhs', [MagangController::class, 'proses_berkas_mhs']);
Route::get('/berkas-mhs/{id}/{path}', [MagangController::class, 'proses_hapus_berkas']);
Route::get('/berkas-mhs-semua', [MagangController::class, 'berkas_mhs_semua']);

Route::get('/interview-mhs', [MagangController::class, 'interview_mhs']);
Route::get('/interview-mhs/{id}', [MagangController::class, 'interview_mhs_upload']);
Route::post('/interview-mhs/{id}', [MagangController::class, 'proses_interview_mhs_upload']);

Route::get('/dokumen-mhs', [MagangController::class, 'dokumen_mhs']);
Route::get('/dokumen-mhs/{id}/{foto}', [MagangController::class, 'hapus_mhs_dokumen']);
Route::get('/dokumen-mhs-foto/{id}/{fotoID}', [MagangController::class, 'hapus_mhs_foto']);

Route::get('/dokumen-mhs-upload/{id}', [MagangController::class, 'show_mhs_dokumen']);
Route::get('/dokumen-mhs-upload-foto/{id}', [MagangController::class, 'show_mhs_foto']);
Route::post('/upload-mhs-foto/{id}', [MagangController::class, 'upload_mhs_foto']);
Route::post('/upload-mhs/{id}', [MagangController::class, 'upload_mhs']);

Route::get('/profil-mhs', [MagangController::class, 'profil_mhs']);

Route::get('/absen-mhs', [MagangController::class, 'absen_mhs']);
Route::get('/proses-absen-masuk-mhs/{individ}', [MagangController::class, 'proses_absen_masuk_mhs']);
Route::get('/proses-absen-pulang-mhs/{individ}', [MagangController::class, 'proses_absen_pulang_mhs']);
// Route::get('/proses-absen-mhs/{absenid}/{individ}', [MagangController::class, 'proses_absen_mhs']);

Route::get('/id-card-mhs', [MagangController::class, 'id_card_mhs']);
Route::get('/id-card-mhs-pdf', [MagangController::class, 'id_card_mhs_pdf']);
Route::get('/id-card-mhs-pdf-save', [MagangController::class, 'id_card_mhs_pdf_save']);

Route::get('/laporan-mhs', [MagangController::class, 'laporan_mhs']);
Route::get('/upload-laporan', [MagangController::class, 'upload_laporan']);
Route::post('/proses-laporan', [MagangController::class, 'proses_laporan']);
Route::get('/lihat-laporan-mhs/{id}', [MagangController::class, 'lihat_laporan_mhs']);
Route::get('/edit-laporan-mhs/{id}', [MagangController::class, 'edit_laporan_mhs']);
Route::put('/proses-edit-laporan-mhs/{id}', [MagangController::class, 'proses_edit_laporan_mhs']);
Route::get('/mhs/cari', [MagangController::class, 'laporan_mhs']);
Route::get('/smk/cari', [MagangController::class, 'laporan_smk']);

Route::get('penilaian-mhs', [MagangController::class, 'penilaian_mhs']);
Route::get('surat-penerimaan-mhs', [MagangController::class, 'surat_penerimaan_mhs']);
Route::get('/balasan-mhs-cetak', [MagangController::class, 'balasan_mhs_cetak']);
// Halaman Magang Mahasiswa Individu ==================


// Halaman Magang Mahasiswa Kelompok ==================
Route::get('/data-mhs-kelompok', [MagangController::class, 'data_mhs_kelompok']);

Route::get('/input-mhs-kelompok', [MagangController::class, 'input_mhs_kelompok']);
Route::post('/input-mhs-kelompok', [MagangController::class, 'proses_data_mhs_kelompok']);
Route::get('/edit-data-mhs-kelompok/{id}/{id_rekap}', [MagangController::class, 'edit_data_mhs_kelompok']);
Route::put('/edit-data-mhs-kelompok/{id}/{id_rekap}', [MagangController::class, 'update_data_mhs_kelompok']);
Route::get('/delete-data-mhs-kelompok/{user_id}/{id_rekap}', [MagangController::class, 'proses_hapus_mhs_kelompok']);

Route::get('/berkas-mhs-kelompok', [MagangController::class, 'berkas_mhs_kelompok']);
Route::post('/berkas-mhs-kelompok', [MagangController::class, 'proses_berkas_mhs_kelompok']);
Route::get('/berkas-mhs-kelompok-semua', [MagangController::class, 'berkas_mhs_kelompok_semua']);
Route::get('/berkas-mhs-kelompok/{id}', [MagangController::class, 'berkas_mhs_kelompok_lihat']);
Route::get('/berkas-mhs-kelompok/{id}/{path}', [MagangController::class, 'proses_hapus_berkas_kelompok']);

Route::get('/interview-mhs-kel/{id}', [MagangController::class, 'interview_mhs_kel_upload']);
Route::post('/interview-mhs-kel/{id}', [MagangController::class, 'proses_interview_mhs_kel_upload']);

Route::get('/dokumen-mhs-kel-upload-foto/{id}', [MagangController::class, 'show_mhs_kel_foto']);
Route::get('/dokumen-mhs-kel-upload/{id}', [MagangController::class, 'show_mhs_kel_dokumen']);

Route::get('/dokumen-mhs-kel/{id}/{foto}', [MagangController::class, 'hapus_mhs_kel_dokumen']);
Route::get('/dokumen-mhs-kel-foto/{id}/{fotoID}', [MagangController::class, 'hapus_mhs_kel_foto']);

Route::post('/upload-mhs-kel-foto/{id}', [MagangController::class, 'upload_mhs_kel_foto']);
Route::post('/upload-mhs-kel/{id}', [MagangController::class, 'upload_mhs_kel']);

Route::get('/sertifikat_mhs', [MagangController::class, 'sertifikat_mhs']);
Route::get('/sertifikat_smk', [MagangController::class, 'sertifikat_smk']);
Route::get('/sertif-smk-pdf', [MagangController::class, 'sertif_smk_pdf']);
// Halaman Magang Mahasiswa Kelompok ==================


// Halaman Magang SMK Individu ==================
Route::get('/data-smk', [MagangController::class, 'data_smk']);

Route::get('/input-data-smk', [MagangController::class, 'input_data_smk']);
Route::post('/input-data-smk', [MagangController::class, 'proses_data_smk']);

Route::get('/edit-data-smk/{id}/{id_rekap}', [MagangController::class, 'edit_data_smk']);
Route::put('/edit-data-smk/{id}/{id_rekap}', [MagangController::class, 'update_data_smk']);

Route::get('/berkas-smk', [MagangController::class, 'berkas_smk']);
Route::post('/berkas-smk', [MagangController::class, 'proses_berkas_smk']);
Route::get('/berkas-smk/{id}/{path}', [MagangController::class, 'proses_hapus_berkas_smk']);
Route::get('/berkas-smk-semua', [MagangController::class, 'berkas_smk_semua']);

Route::get('/interview-smk', [MagangController::class, 'interview_smk']);
Route::get('/interview-smk/{id}', [MagangController::class, 'interview_smk_upload']);
Route::post('/interview-smk/{id}', [MagangController::class, 'proses_interview_smk_upload']);

Route::get('/dokumen-smk', [MagangController::class, 'dokumen_smk']);
Route::get('/dokumen-smk/{id}/{foto}', [MagangController::class, 'hapus_smk_dokumen']);
Route::get('/dokumen-smk-foto/{id}/{fotoID}', [MagangController::class, 'hapus_smk_foto']);

Route::get('/dokumen-smk-upload/{id}', [MagangController::class, 'show_smk_dokumen']);
Route::get('/dokumen-smk-upload-foto/{id}', [MagangController::class, 'show_smk_foto']);
Route::post('/upload-smk-foto/{id}', [MagangController::class, 'upload_smk_foto']);
Route::post('/upload-smk/{id}', [MagangController::class, 'upload_smk']);

Route::get('/profil-smk', [MagangController::class, 'profil_smk']);

Route::get('/absen-smk', [MagangController::class, 'absen_smk']);
Route::get('/proses-absen-masuk-smk/{individ}', [MagangController::class, 'proses_absen_masuk_smk']);
Route::get('/proses-absen-pulang-smk/{individ}', [MagangController::class, 'proses_absen_pulang_smk']);
// Route::get('/proses-absen-smk/{absenid}/{individ}', [MagangController::class, 'proses_absen_smk']);

Route::get('/id-card-smk', [MagangController::class, 'id_card_smk']);
Route::get('/id-card-smk-pdf', [MagangController::class, 'id_card_smk_pdf']);
Route::get('/id-card-smk-pdf-save', [MagangController::class, 'id_card_smk_pdf_save']);

Route::get('/laporan-smk', [MagangController::class, 'laporan_smk']);
Route::get('/upload-laporan-smk', [MagangController::class, 'upload_laporan_smk']);
Route::post('/proses-laporan-smk', [MagangController::class, 'proses_laporan_smk']);
Route::get('/lihat-laporan-smk/{id}', [MagangController::class, 'lihat_laporan_smk']);
Route::get('/edit-laporan-smk/{id}', [MagangController::class, 'edit_laporan_smk']);
Route::put('/proses-edit-laporan-smk/{id}', [MagangController::class, 'proses_edit_laporan_smk']);
Route::get('/surat-penerimaan-smk', [MagangController::class, 'surat_penerimaan_smk']);
Route::get('/balasan-smk-cetak', [MagangController::class, 'balasan_smk_cetak']);

Route::get('penilaian-smk', [MagangController::class, 'penilaian_smk']);
// Halaman Magang SMK Individu ==================


// Halaman Magang SMK Kelompok ==================
Route::get('/data-smk-kelompok', [MagangController::class, 'data_smk_kelompok']);

Route::get('/input-smk-kelompok', [MagangController::class, 'input_smk_kelompok']);
Route::post('/input-smk-kelompok', [MagangController::class, 'proses_data_smk_kelompok']);
Route::get('/edit-data-smk-kelompok/{id}/{id_rekap}', [MagangController::class, 'edit_data_smk_kelompok']);
Route::put('/edit-data-smk-kelompok/{id}/{id_rekap}', [MagangController::class, 'update_data_smk_kelompok']);
Route::get('/delete-data-smk-kelompok/{user_id}/{id_rekap}', [MagangController::class, 'proses_hapus_smk_kelompok']);

Route::get('/berkas-smk-kelompok', [MagangController::class, 'berkas_smk_kelompok']);
Route::post('/berkas-smk-kelompok', [MagangController::class, 'proses_berkas_smk_kelompok']);
Route::get('/berkas-smk-kelompok-semua', [MagangController::class, 'berkas_smk_kelompok_semua']);
Route::get('/berkas-smk-kelompok/{id}', [MagangController::class, 'berkas_smk_kelompok_lihat']);
Route::get('/berkas-smk-kelompok/{id}/{path}', [MagangController::class, 'proses_hapus_berkas_kelompok_smk']);

Route::get('/interview-smk-kel/{id}', [MagangController::class, 'interview_smk_kel_upload']);
Route::post('/interview-smk-kel/{id}', [MagangController::class, 'proses_interview_smk_kel_upload']);

Route::get('/dokumen-smk-kel-upload-foto/{id}', [MagangController::class, 'show_smk_kel_foto']);
Route::get('/dokumen-smk-kel-upload/{id}', [MagangController::class, 'show_smk_kel_dokumen']);

Route::get('/dokumen-smk-kel/{id}/{foto}', [MagangController::class, 'hapus_smk_kel_dokumen']);
Route::get('/dokumen-smk-kel-foto/{id}/{fotoID}', [MagangController::class, 'hapus_smk_kel_foto']);

Route::post('/upload-smk-kel-foto/{id}', [MagangController::class, 'upload_smk_kel_foto']);
Route::post('/upload-smk-kel/{id}', [MagangController::class, 'upload_smk_kel']);
// Halaman Magang SMK Kelompok ==================
// Halaman Penelitian ============================
Route::get('/data-penelitian', [PenelitianController::class, 'data_penelitian']);
Route::get('/input-data-penelitian', [PenelitianController::class, 'input_data_penelitian']);
Route::post('/proses-data-penelitian', [PenelitianController::class, 'proses_data_penelitian']);
Route::put('/update-data-penelitian/{id}/{id_rekap}', [PenelitianController::class, 'update_data_penelitian']);
Route::get('/berkas-penelitian-semua', [PenelitianController::class, 'berkas_penelitian_semua']);
Route::get('berkas-penelitian/{id}/{path}', [PenelitianController::class, 'proses_hapus_berkas_penelitian']);

Route::get('/berkas-penelitian', [PenelitianController::class, 'berkas_penelitian']);
Route::get('/edit-data-penelitian/{id}/{id_rekap}', [PenelitianController::class, 'edit_data_penelitian']);
Route::post('/proses-berkas-penelitian', [PenelitianController::class, 'proses_berkas_penelitian']);


Route::get('/dokumen-penelitian', [PenelitianController::class, 'dokumen_penelitian']);
Route::get('dokumen-penelitian-upload-foto/{id}', [PenelitianController::class, 'dokumen_penelitian_upload_foto']);
Route::get('dokumen-penelitian-upload/{id}', [PenelitianController::class, 'dokumen_penelitian_upload']);
Route::post('upload-penelitian-foto/{id}', [PenelitianController::class, 'upload_penelitian_foto']);
Route::post('upload-penelitian/{id}', [PenelitianController::class, 'upload_penelitian']);
Route::get('/hapus-penelitian-dokumenlain/{id}/{foto}', [PenelitianController::class, 'hapus_penelitian_dokumenlain']);
Route::get('/hapus-penelitian-foto/{id}/{fotoID}', [PenelitianController::class, 'hapus_penelitian_foto']);
Route::get('surat-penerimaan-penelitian', [PenelitianController::class, 'surat_penerimaan_penelitian']);
Route::get('/balasan-penelitian-cetak', [PenelitianController::class, 'balasan_penelitian_cetak']);
Route::get('/id-card-penelitian-pdf', [PenelitianController::class, 'id_card_penelitian_pdf']);
Route::get('profil-penelitian', [PenelitianController::class, 'profil_penelitian']);
Route::get('absen-penelitian', [PenelitianController::class, 'absen_penelitian']);
Route::get('/proses-absen-masuk-penelitian/{individ}', [PenelitianController::class, 'proses_absen_masuk_penelitian']);
Route::get('/proses-absen-pulang-penelitian/{individ}', [PenelitianController::class, 'proses_absen_pulang_penelitian']);
Route::get('proses-absen-penelitian/{absenid}/{individ}', [PenelitianController::class, 'proses_absen_penelitian']);
Route::get('id-card-penelitian', [PenelitianController::class, 'id_card_penelitian']);
Route::get('id-card-penelitian-cetak', [PenelitianController::class, 'id_card_penelitian_cetak']);
Route::get('laporan-penelitian', [PenelitianController::class, 'laporan_penelitian']);
Route::get('upload-laporan-penelitian', [PenelitianController::class, 'upload_laporan_penelitian']);
Route::post('proses-laporan-penelitian', [PenelitianController::class, 'proses_laporan_penelitian']);
Route::get('/penelitian/cari', [PenelitianController::class, 'laporan_penelitian']);
Route::get('lihat-laporan-penelitian/{id}', [PenelitianController::class, 'lihat_laporan_penelitian']);
Route::get('/surat_penelitian', [PenelitianController::class, 'surat_penelitian']);
Route::get('/sertif-penelitian-cetak', [PenelitianController::class, 'sertif_penelitian_cetak']);
Route::get('penelitian-selesai', [PenelitianController::class, 'penelitian_selesai']);
Route::get('penelitian-kuota-penuh', [PenelitianController::class, 'penelitian_kuota_penuh']);
// end halaman penelitian ========
// Halaman Forum Mahasiswa ============================
Route::get('/forum-mhs', [ForumController::class, 'index']);
Route::post('/tambah-forum', [ForumController::class, 'tambah_forum']);
Route::get('forum-view/{id}', [ForumController::class, 'view_forum']);
Route::get('/edit-forum/{id}', [ForumController::class, 'edit_forum']);
Route::put('/proses-edit-forum/{id}', [ForumController::class, 'proses_edit_forum']);
Route::get('/hapus-forum/{id}', [ForumController::class, 'hapus_forum']);
Route::post('/tambah-komentar', [ForumController::class, 'post_komentar']);
Route::get('/edit-komentar/{id}', [ForumController::class, 'edit_komentar']);
Route::put('/proses-edit-komentar/{id}', [ForumController::class, 'proses_edit_komentar']);
Route::get('/hapus-komentar/{id}', [ForumController::class, 'hapus_komentar']);
// end halaman forum mahasiswa ====

Route::get('/Kuota', [MagangController::class, 'Kuota']);


Route::get('/sertif-mhs-pdf', [MagangController::class, 'sertifikatmhspdf']);