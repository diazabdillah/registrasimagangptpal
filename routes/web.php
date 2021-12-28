<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WelcomeController;

// Web Landing =================================
Route::get('/', [WebController::class, 'index']);
// Web Landing =================================
Route::get('/home', [WebController::class, 'index']);

Route::get('/materi', [WebController::class, 'toMateri']);
Route::get('/prosedur', [WebController::class, 'toProsedur']);
Route::get('/formatLaporan', [WebController::class, 'toFormatLaporan']);

Route::get('/ship-building', [WebController::class, 'toShipBuilding']);
Route::get('/naval-shipbuilding', [WebController::class, 'toNavalShipbuilding']);
Route::get('/submarine', [WebController::class, 'toSubmarine']);
Route::get('/merchant-shipbuilding', [WebController::class, 'toMerchantShipbuilding']);
Route::get('/rekayasa-umum', [WebController::class, 'toRekayasaUmum']);
Route::get('/energy', [WebController::class, 'toEnergy']);
Route::get('/off-shore', [WebController::class, 'toOffShore']);
Route::get('/maintenance-repair-overhaul', [WebController::class, 'toMaintenanceRepairOverhaul']);
Route::get('/kri', [WebController::class, 'toKRI']);
Route::get('/non-kri', [WebController::class, 'toNonKRI']);
Route::get('/fasilitas', [WebController::class, 'toFasilitas']);
Route::get('/penyedia-solusi', [WebController::class, 'toPenyediaSolusi']);

Route::get('/news', [WebController::class, 'showNews']);
Route::get('/gallery', [WebController::class, 'showGalleries']);

Route::get('/profile', function () { return view('frontend.profile'); });
Route::get('/human-capital-services', function () { return view('departemen_hcm.departemen_human_capital_services'); });
Route::get('/human-capital-development', function () { return view('departemen_hcm.departemen_human_capital_development'); });
Route::get('/organization-development-and-command-media', function () { return view('departemen_hcm.departemen_organization_development'); });
Route::get('/lembaga-sertifikasi-profesi', function () { return view('departemen_hcm.departemen_organization_lsp'); });

Route::get('/toNews', function () {
    return view('frontend.news');
});
Route::get('/detail-news/{id}', [WebController::class, 'detailNews']);

Route::get('/toGallery', function () {
    return view('frontend.gallery');
});

Route::get('/internship', function () {
    return view('frontend.internship');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/services', function () {
    return view('frontend.services');
});

Route::get('/info_beasiswa', [WebController::class, 'showInfoBeasiswa']);
Route::get('/mekanisme_layanan', [WebController::class, 'showMekanismeLayanan']);
Route::get('/peminjaman_ruangan', [WebController::class, 'showDaftarRuangan']);
Route::get('/training', [WebController::class, 'showTraining']);
Route::get('/unit_kerja', [WebController::class, 'showUnitKerja']);
Route::get('/informasi_lsp', [WebController::class, 'showInformasiLSP']);

// Welcome HCM
// Route::get('/hcm-welcome', [WelcomeController::class, 'index']);
// Route::get('/home', [WelcomeController::class, 'home']);


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Bagian auth registrasi sampai login  ===============
Route::get('/login', [AuthhController::class, 'index']);
Route::post('/login', [AuthhController::class, 'postLogin'])->name('login'); // Post Form Login
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
Route::get('/show-galeri', [MenuController::class, 'Gallery']);
Route::get('/input-galeri-foto', [MenuController::class, 'inputGaleriFoto']);
Route::get('/input-galeri-video', [MenuController::class, 'inputGaleriVideo']);
Route::post('/input-galeri-foto', [MenuController::class, 'prosesInputGaleriFoto'])->name('uploadGaleriFoto');
Route::post('/input-galeri-video', [MenuController::class, 'prosesInputGaleriVideo'])->name('uploadGaleriVideo');
Route::get('/edit-galeri/{id}', [MenuController::class, 'editGaleri']);
Route::put('/edit-galeri/{id}', [MenuController::class, 'updateGaleri']);
Route::get('delete-galeri/{user_id}', [MenuController::class, 'deleteGaleri']);
// Bagian Galeri ================================

// Bagian Info Beasiswa ================================
Route::get('/show-info-beasiswa', [ServiceController::class, 'showInfoBeasiswa']);
Route::get('/input-info-beasiswa', [ServiceController::class, 'inputInfoBeasiswa']);
Route::post('/input-info-beasiswa', [ServiceController::class, 'prosesInputInfoBeasiswa'])->name('uploadInfoBeasiswa');
Route::get('/edit-info-beasiswa/{id}', [ServiceController::class, 'editInfoBeasiswa']);
Route::put('/edit-info-beasiswa/{id}', [ServiceController::class, 'updateInfoBeasiswa']);
Route::get('delete-info-beasiswa/{user_id}', [ServiceController::class, 'deleteInfoBeasiswa']);
// Bagian Info Beasiswa ==================================

// Bagian Training ================================
Route::get('/show-training', [ServiceController::class, 'showTraining']);
Route::get('/input-training', [ServiceController::class, 'inputTraining']);
Route::post('/input-training', [ServiceController::class, 'prosesInputTraining'])->name('uploadTraining');
Route::get('/edit-training/{id}', [ServiceController::class, 'editTraining']);
Route::put('/edit-training/{id}', [ServiceController::class, 'updateTraining']);
Route::get('delete-training/{user_id}', [ServiceController::class, 'deleteTraining']);
// Bagian Training ==================================

// Bagian Peminjaman Ruangan ================================
Route::get('/show-peminjaman-ruangan', [ServiceController::class, 'showPeminjamanRuangan']);
Route::get('/input-daftar-ruangan', [ServiceController::class, 'inputDaftarRuangan']);
Route::post('/input-daftar-ruangan', [ServiceController::class, 'prosesInputDaftarRuangan'])->name('uploadDaftarRuangan');
Route::get('/available-ruangan/{id}', [ServiceController::class, 'availableRuangan']);
Route::get('/unavailable-ruangan/{id}', [ServiceController::class, 'unavailableRuangan']);
Route::get('/edit-daftar-ruangan/{id}', [ServiceController::class, 'editDaftarRuangan']);
Route::put('/edit-daftar-ruangan/{id}', [ServiceController::class, 'updateDaftarRuangan']);
Route::get('delete-daftar-ruangan/{user_id}', [ServiceController::class, 'deleteDaftarRuangan']);

Route::post('/input-peminjaman-ruangan', [ServiceController::class, 'prosesInputPeminjamanRuangan'])->name('uploadPeminjamanRuangan');
Route::get('/edit-peminjaman-ruangan/{id}', [ServiceController::class, 'editPeminjamanRuangan']);
Route::put('/edit-peminjaman-ruangan/{id}', [ServiceController::class, 'updatePeminjamanRuangan']);
Route::get('delete-peminjaman-ruangan/{user_id}', [ServiceController::class, 'deletePeminjamanRuangan']);
// Bagian Peminjaman Ruangan ==================================

// Bagian Unit Kerja ================================
Route::get('/show-unit-kerja', [ServiceController::class, 'showUnitKerja']);
Route::get('/input-unit-kerja', [ServiceController::class, 'inputUnitKerja']);
Route::post('/input-unit-kerja', [ServiceController::class, 'prosesInputUnitKerja'])->name('uploadUnitKerja');
Route::get('/edit-unit-kerja/{id}', [ServiceController::class, 'editUnitKerja']);
Route::put('/edit-unit-kerja/{id}', [ServiceController::class, 'updateUnitKerja']);
Route::get('delete-unit-kerja/{user_id}', [ServiceController::class, 'deleteUnitKerja']);
// Bagian Unit Kerja ==================================

// Bagian Informasi LSP ================================
Route::get('/show-informasi-lsp', [ServiceController::class, 'showInformasiLSP']);

Route::get('/input-jadwal-sertifikat', [ServiceController::class, 'inputJadwalSertifikasi']);
Route::post('/input-jadwal-sertifikat', [ServiceController::class, 'prosesJadwalSertifikasi'])->name('uploadSertifikasi');
Route::get('/edit-jadwal-sertifikat/{id}', [ServiceController::class, 'editJadwalSertifikasi']);
Route::put('/edit-jadwal-sertifikat/{id}', [ServiceController::class, 'updateJadwalSertifikasi']);
Route::get('delete-jadwal-sertifikat/{user_id}', [ServiceController::class, 'deleteJadwalSertifikasi']);

Route::get('/input-skema-bnsp', [ServiceController::class, 'inputSkemaBNSP']);
Route::post('/input-skema-bnsp', [ServiceController::class, 'prosesInputSkemaBNSP'])->name('uploadSkemaBNSP');
Route::get('/edit-skema-bnsp/{id}', [ServiceController::class, 'editSkemaBNSP']);
Route::put('/edit-skema-bnsp/{id}', [ServiceController::class, 'updateSkemaBNSP']);
Route::get('delete-skema-bnsp/{user_id}', [ServiceController::class, 'deleteSkemaBNSP']);

Route::get('/input-jumlah-asesor', [ServiceController::class, 'inputJumlahAsesor']);
Route::post('/input-jumlah-asesor', [ServiceController::class, 'prosesInputJumlahAsesor'])->name('uploadJumlahAsesor');
Route::get('/edit-jumlah-asesor/{id}', [ServiceController::class, 'editJumlahAsesor']);
Route::put('/edit-jumlah-asesor/{id}', [ServiceController::class, 'updateJumlahAsesor']);
Route::get('delete-jumlah-asesor/{user_id}', [ServiceController::class, 'deleteJumlahAsesor']);
// Bagian Informasi LSP ==================================

// Halaman administrasi ========================
Route::get('/admin_dash', [AdminController::class, 'index']);
Route::get('/Rekap', [AdminController::class, 'Rekap']);
Route::get('/RekapKelompok', [AdminController::class, 'Rekapkelompok']);
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
Route::get('/proses-magang-aktmhs/{user_id}', [DivisiController::class, 'magangAktMhs']);
Route::get('/proses-magang-aktsmk/{user_id}', [DivisiController::class, 'magangAktSmk']);
Route::get('/final-penerimaan-mhs/{id}/{foto}', [DivisiController::class, 'hapusfileMhs']);
Route::put('/final-penerimaan-mhs/{id}', [DivisiController::class, 'updateDiterima']);
Route::put('/proses-magang-aktmhs/{id}', [DivisiController::class, 'mulaiSelesai']);
Route::get('/final-penerimaan-smk/{user_id}', [DivisiController::class, 'finalSmk']);
Route::get('/final-penerimaan-smk/{id}/{foto}', [DivisiController::class, 'hapusfileSmk']);

Route::get('/rekam-jejak-magang', [DivisiController::class, 'rekam_jejak_magang']);
Route::get('/rekam-jejak', [DivisiController::class, 'rekam_jejak']);
Route::get('/laporan', [DivisiController::class, 'laporan']);
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
Route::get('/lihat_laporan_mhs/{id}', [MagangController::class, 'lihatlaporanmhs']);
Route::post('/proses_laporan', [MagangController::class, 'proses_laporan'])->name('proseslaporan');
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
Route::get('magang.Dokumen_mhs_upload/{id}', [MagangController::class, 'showUploadMhs']);
Route::post('magang.Dokumen_mhs_upload/{id}', [MagangController::class, 'uploadDocFotoMhs'])->name('uploadFotoMhs');
Route::post('magang.Dokumen_mhs/{id}', [MagangController::class, 'upFotoMhs'])->name('upFotoMhs');
Route::get('/tableabsen_mhs', [MagangController::class, 'tableabsen_mhs']);
Route::get('/absen_mhs', [MagangController::class, 'absen_mhs']);
Route::get('/proses_absenmhs/{absenid}/{individ}', [MagangController::class, 'proses_absenmhs']);
Route::get('/id_card_mhs', [MagangController::class, 'id_card_mhs']);
Route::get('/Kuota', [MagangController::class, 'kuota']);
Route::get('penilaian_mhs', [MagangController::class, 'penilaian_mhs']);
// Export PDF ID Card
Route::get('/idcard-mhs-pdf', [MagangController::class, 'idCardMhsPdf'])->name('expdfidcard');
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
// End Halaman Magang Mahasiswa ==================

// Halaman Magang SMK ===========================
Route::get('/Data_smk', [MagangController::class, 'Data_smk']);
Route::get('/Data_smk/{id}/{path}', [MagangController::class, 'proses_hapus_fileSmk']);
Route::get('/input-data-smkInd', [MagangController::class, 'inputDataSmk']);
Route::post('/input-data-smkInd', [MagangController::class, 'proses_data_smk'])->name('dataSmk');
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