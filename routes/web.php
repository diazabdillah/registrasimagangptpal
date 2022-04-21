<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ForgotPasswordController;
// Web Landing =================================
Route::get('/', [WebController::class, 'index']);
// Web Landing =================================
Route::get('/home', [WebController::class, 'index']);

Route::get('/prosedur', [WebController::class, 'showInternshipProsedure']);
Route::get('/formatLaporan', [WebController::class, 'showInternshipFormatLaporan']);
Route::get('/kuotas', [WebController::class, 'showInternshipKuota']);

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

Route::get('/profile', function () {
    return view('frontend.profile');
});
Route::get('/human-capital-services', function () {
    return view('departemen_hcm.departemen_human_capital_services');
});
Route::get('/human-capital-development', function () {
    return view('departemen_hcm.departemen_human_capital_development');
});
Route::get('/organization-development-and-command-media', function () {
    return view('departemen_hcm.departemen_organization_development');
});
Route::get('/lembaga-sertifikasi-profesi', function () {
    return view('departemen_hcm.departemen_organization_lsp');
});

Route::get('/toNews', function () {
    return view('frontend.news');
});
Route::get('/detail-news/{id}', [WebController::class, 'detailNews']);

Route::get('/toGallery', function () {
    return view('frontend.gallery');
});

Route::get('/internship', [WebController::class, 'showInternshipProsedure']);

Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::post('/uploadMessage', [WebController::class, 'uploadContactUs'])->name('upload');

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
Route::get('/show-galeri', [MenuController::class, 'Gallery']);
Route::get('/input-galeri-foto', [MenuController::class, 'inputGaleriFoto']);
Route::get('/input-galeri-video', [MenuController::class, 'inputGaleriVideo']);
Route::post('/input-galeri-foto', [MenuController::class, 'prosesInputGaleriFoto'])->name('uploadGaleriFoto');
Route::post('/input-galeri-video', [MenuController::class, 'prosesInputGaleriVideo'])->name('uploadGaleriVideo');
Route::get('/edit-galeri/{id}', [MenuController::class, 'editGaleri']);
Route::put('/edit-galeri/{id}', [MenuController::class, 'updateGaleri']);
Route::get('delete-galeri/{user_id}', [MenuController::class, 'deleteGaleri']);
// Bagian Galeri ================================

// Bagian Contact Us ================================
Route::get('/show-contact-us', [ContactUsController::class, 'showContactUs']);
Route::get('delete-contact-us/{id}', [ContactUsController::class, 'deleteContactUs']);
// Bagian Contact Us ================================

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
Route::post('/input-jadwal-sertifikat', [ServiceController::class, 'prosesInputJadwalSertifikasi'])->name('uploadSertifikasi');
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
Route::get('/Rekap', [AdminController::class, 'Rekapmhs']);
Route::get('delete-rekap-mhs/{id}', [AdminController::class, 'delete_rekap_mhs']);
Route::get('/Rekap-mhs-kelompok', [AdminController::class, 'Rekapmhskel']);
Route::get('delete-rekap-mhskel/{id}', [AdminController::class, 'delete_rekap_mhskel']);
Route::get('/Rekap-Smk', [AdminController::class, 'Rekapsmk']);
Route::get('delete-rekap-smk/{id}', [AdminController::class, 'delete_rekap_smk']);
Route::get('/Rekap-smk-kelompok', [AdminController::class, 'Rekapsmkkel']);
Route::get('delete-rekap-smkkel/{id}', [AdminController::class, 'delete_rekap_smkkel']);
Route::get('/Rekap-penelitian', [AdminController::class, 'Rekappenelitian']);
Route::get('delete-rekap-penelitian/{id}', [AdminController::class, 'delete_rekap_penelitian']);
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
Route::get('/kelola-akun-divisi', [AdminController::class, 'kelola_akun_divisi']);
Route::get('/tambah-akun-divisi', [AdminController::class, 'tambah_akun_divisi']);
Route::post('/proses-tambah-akun-divisi', [AdminController::class, 'proses_tambah_akun_divisi']);
Route::get('/edit-akun-divisi/{id}', [AdminController::class, 'edit_akun_divisi']);
Route::put('/proses-edit-akun-divisi/{id}', [AdminController::class, 'proses_edit_akun_divisi']);
Route::get('/delete-akun-divisi/{id}', [AdminController::class, 'delete_akun_divisi']);
Route::get('/lihat_kuota',[AdminController::class,'kuota']);

Route::get('/Rekap-divisi', [AdminController::class, 'Rekapmhs_divisi']);
Route::get('/Rekap-mhs-kelompok-divisi', [AdminController::class, 'Rekapmhskel_divisi']);
Route::get('/Rekap-Smk-divisi', [AdminController::class, 'Rekapsmk_divisi']);
Route::get('/Rekap-smk-kelompok-divisi', [AdminController::class, 'Rekapsmkkel_divisi']);
Route::get('/Rekap-penelitian-divisi', [AdminController::class, 'Rekappenelitian_divisi']);

Route::get('/cetakRekapMhsPDFdivisi', [AdminController::class, 'cetak_rekapmhspdfdivisi']);
Route::get('/cetakRekapmhskelPDFdivisi', [AdminController::class, 'cetak_rekapmhskelpdfdivisi']);
Route::get('/cetakRekapSmkPDFdivisi', [AdminController::class, 'cetak_rekapsmkpdfdivisi']);
Route::get('/cetakRekapSmkKelPDFdivisi', [AdminController::class, 'cetak_rekapsmkkelpdfdivisi']);
Route::get('/cetakRekapPenelitianPDFdivisi', [AdminController::class, 'cetak_rekappenelitianpdfdivisi']);

Route::put('/final-penerimaan-mhs-divisi/{id}', [AdminController::class, 'final_penerimaan_mhs_divisi']);
Route::put('/final-penerimaan-smk-divisi/{id}',[AdminController::class, 'final_penerimaan_smk_divisi']);
Route::put('/update-penelitian-aktif-divisi/{id}',[AdminController::class,'update_penelitian_aktif_divisi']);
// End Halaman administrasi ========================

// Halaman Divisi ========================
Route::get('/konfirmasi-akun-admin', [DivisiController::class, 'konfirmasi_akun_admin']);
Route::get('/kegiatan-magang',[DivisiController::class,'kegiatan_magang']);
Route::get('kegiatan-magang-mhs/{id}',[DivisiController::class,'kegiatan_magang_mhs']);
Route::get('kegiatan-magang-smk/{id}',[DivisiController::class,'kegiatan_magang_smk']);
Route::post('/proses-kegiatan-magang-smk/{id}', [DivisiController::class, 'proses_kegiatan_magang_smk'])->name('tambahkegiatansmk');
Route::get('delete-kegiatan-magang-smk/{id}',[DivisiController::class, 'delete_kegiatan_magang_smk']);

Route::post('/proses-kegiatan-magang-mhs/{id}', [DivisiController::class, 'proses_kegiatan_magang_mhs'])->name('tambahkegiatanmhs');
Route::get('delete-kegiatan-magang-mhs/{id}',[DivisiController::class, 'delete_kegiatan_magang_mhs']);
Route::get('/laporan-divisi', [DivisiController::class, 'laporan_divisi']);
Route::get('/penilaian-divisi', [DivisiController::class, 'penilaian_divisi']);
Route::get('editlaporan-divisi/{id}', [DivisiController::class, 'editlaporan_divisi']);
Route::put('proseseditlaporan-divisi/{id}', [DivisiController::class, 'proseseditlaporan_divisi']);
Route::get('editlaporansmk-divisi/{id}', [DivisiController::class, 'editlaporansmk_divisi']);
Route::put('proseseditlaporansmk-divisi/{id}', [DivisiController::class, 'proseseditlaporansmk_divisi']);
Route::get('/absen-penelitian-divisi', [DivisiController::class, 'absen_penelitian_divisi']);
Route::get('laporan-penelitian-divisi', [DivisiController::class, 'laporan_penelitian_divisi']);

Route::get('/Penerimaan', [DivisiController::class, 'index']);
Route::get('/absen', [DivisiController::class, 'Absen']);
Route::get('/lihat_absenmhs/{id}', [DivisiController::class, 'lihat_absenmhs']);
Route::get('/rekap-absenmhs', [DivisiController::class, 'rekap_absenmhs']);
Route::get('/lihat-absenmhs/{id_individu}/cetak-absen-pdf/{id}', [DivisiController::class, 'cetak_absen_pdf']);
Route::get('delete-rekapabsen-mhs/{id}', [DivisiController::class, 'delete_rekapabsen_mhs']);
Route::get('delete-rekapabsen-smk/{id}', [DivisiController::class, 'delete_rekapabsen_smk']);
Route::get('delete-rekapabsen-penelitian/{id}', [DivisiController::class, 'delete_rekapabsen_penelitian']);
Route::get('/lihat-absenmhs/{id_individu}/delete-lihatabsen-mhs/{id}', [DivisiController::class, 'delete_lihatabsen_mhs']);
Route::get('/lihat-absensmk/{id_individu}/delete-lihatabsen-smk/{id}', [DivisiController::class, 'delete_lihatabsen_smk']);
Route::get('/lihat-absenpenelitian/{id_individu}/delete-lihatabsen-penelitian/{id}', [DivisiController::class, 'delete_lihatabsen_penelitian']);
Route::get('/lihat-absensmk/{id_individu}/cetak-absen-smk-pdf/{id}', [DivisiController::class, 'cetak_absen_smk_pdf']);
Route::get('/rekap-absensmk', [DivisiController::class, 'rekap_absensmk']);
Route::get('/lihat_absensmk/{id}', [DivisiController::class, 'lihat_absensmk']);
Route::post('/proses_absenmhs/{id}', [DivisiController::class, 'proses_absenmhs'])->name('tambahabsenmhs');
Route::post('/proses_absensmk/{id}', [DivisiController::class, 'proses_absensmk'])->name('tambahabsensmk');
Route::get('/magang-aktif', [DivisiController::class, 'showMagangAktif']);
Route::get('/kuota', [DivisiController::class, 'Kuota']);
Route::get('/tambah-kuota', [DivisiController::class, 'tambah_kuota']);
Route::post('/proses-kuota/{id}', [DivisiController::class, 'proses_kuota'])->name('proseskuota');
Route::get('/edit-kuota/{id}', [DivisiController::class, 'edit_kuota']);
Route::put('/update-kuota/{id}', [DivisiController::class, 'update_kuota']);
Route::get('/hapus-kuota/{id}',[DivisiController::class,'hapus_kuota']);

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
Route::put('update-final-penerimaan-mhs/{id}', [DivisiController::class, 'updateFinalPenerimaan']);
Route::put('update-final-penerimaan-smk/{id}', [DivisiController::class, 'updateFinalPenerimaanSmk']);
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
Route::get('editlaporan-smk/{id}', [DivisiController::class, 'editlaporansmk']);
Route::put('proseseditlaporansmk/{id}', [DivisiController::class, 'proseseditlaporansmk']);
Route::get('delete-laporan-smk/{id}', [DivisiController::class, 'delete_laporan_smk']);

Route::get('delete-laporan-penelitian/{id}', [DivisiController::class, 'delete_laporan_penelitian']);
Route::get('/penilaian-magang', [DivisiController::class, 'penilaian']);
Route::get('/isi-penilaian-magang/{id}', [DivisiController::class, 'isi_penilaian']);
Route::post('/proses-penilaian-magang/{id}', [DivisiController::class, 'proses_penilaian'])->name('tambahnilai');
Route::get('/isi-penilaian-magang-smk/{id}', [DivisiController::class, 'isi_penilaian_smk']);
Route::post('/proses-penilaian-magang-smk/{id}', [DivisiController::class, 'proses_penilaian_smk'])->name('tambahnilaismk');
Route::get('isi_penilaian_divisi/{id}', [DivisiController::class, 'isi_penilaian_divisi']);
Route::post('/proses_penilaian_divisi/{id}', [DivisiController::class, 'proses_penilaian_divisi'])->name('tambahnilaidivisi');
Route::get('isi_penilaian_smk_divisi/{id}', [DivisiController::class, 'isi_penilaian_smk_divisi']);
Route::post('/proses_penilaian_smk_divisi/{id}', [DivisiController::class, 'proses_penilaian_smk_divisi'])->name('tambahnilaismkdivisi');

Route::get('magang-interview', [DivisiController::class, 'interview']);
Route::get('terima-interview-mhs/{id}', [DivisiController::class, 'terimainterviewmhs']);
Route::put('update-terima-interview/{user_id}', [DivisiController::class, 'update_terima_interview']);
Route::put('update-terima-interview-smk/{user_id}', [DivisiController::class, 'update_terima_interview_smk']);
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

Route::get('/magang-aktif-divisi', [DivisiController::class, 'showMagangAktifDivisi']);
Route::get('/penelitian-aktif-divisi', [DivisiController::class, 'showPenelitianAktifDivisi']);
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
Route::put('/penelitian-aktif-waktu/{id}', [DivisiController::class, 'penelitian_aktif_waktu']);
Route::get('/absen-pnltn', [DivisiController::class, 'absen_pnltn']);
Route::get('/rekap-absenpenelitian', [DivisiController::class, 'rekap_absenpenelitian']);
Route::get('/lihat-absenpenelitian/{id_individu}/cetak-absen-penelitian-admin-pdf/{id}', [DivisiController::class, 'cetak_absen_penelitian_pdf']);
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

Route::get('/cari-penerimaan', [DivisiController::class, 'index']);

Route::get('/cari-penerimaan-penelitian', [DivisiController::class, 'penerimaan_penelitian']);
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

Route::get('/dokumen-mhs-upload-ktp/{id}', [MagangController::class, 'show_mhs_dokumen_ktp']);
Route::get('/dokumen-mhs-upload-ktm/{id}', [MagangController::class, 'show_mhs_dokumen_ktm']);
Route::get('/dokumen-mhs-upload-bpjs/{id}', [MagangController::class, 'show_mhs_dokumen_bpjs']);
Route::get('/dokumen-mhs-upload-foto/{id}', [MagangController::class, 'show_mhs_foto']);
Route::post('/upload-mhs-foto/{id}', [MagangController::class, 'upload_mhs_foto']);
Route::post('/upload-mhs-ktp/{id}', [MagangController::class, 'upload_mhs_ktp']);
Route::post('/upload-mhs-ktm/{id}', [MagangController::class, 'upload_mhs_ktm']);
Route::post('/upload-mhs-bpjs/{id}', [MagangController::class, 'upload_mhs_bpjs']);
Route::get('/profil-mhs', [MagangController::class, 'profil_mhs']);

Route::get('/absen-mhs', [MagangController::class, 'absen_mhs']);
Route::post('/proses-absen-masuk-mhs/{individ}', [MagangController::class, 'proses_absen_masuk_mhs']);
Route::post('/proses-absen-pulang-mhs/{individ}', [MagangController::class, 'proses_absen_pulang_mhs']);
Route::post('/proses-absen-izin-mhs/{individ}', [MagangController::class, 'proses_absen_izin_mhs']);
Route::get('/absen-datang-mhs/{id}',[MagangController::class,'absen_datang_mhs']);
Route::get('/absen-pulang-mhs/{id}',[MagangController::class,'absen_pulang_mhs']);
Route::get('/absen-izin-mhs/{id}',[MagangController::class,'absen_izin_mhs']);
Route::get('/cetak-absen-mhs-pdf', [MagangController::class, 'cetak_absenmhs_pdf']);
// Route::get('/proses-absen-mhs/{absenid}/{individ}', [MagangController::class, 'proses_absen_mhs']);

Route::get('/id-card-mhs', [MagangController::class, 'id_card_mhs']);
Route::get('/id-card-mhs-pdf', [MagangController::class, 'id_card_mhs_pdf']);
Route::get('/id-card-mhs-pdf-save', [MagangController::class, 'id_card_mhs_pdf_save']);

Route::get('/laporan-mhs', [MagangController::class, 'laporan_mhs']);
Route::get('/upload-laporan', [MagangController::class, 'upload_laporan']);
Route::post('/proses-laporan', [MagangController::class, 'proses_laporan']);
Route::get('/lihat-laporan-mhs/{id}', [MagangController::class, 'lihat_laporan_mhs']);
Route::get('/lihat-laporan-mhs-revisi/{id}', [MagangController::class, 'lihat_laporan_mhs_revisi']);
Route::get('/edit-laporan-mhs/{id}', [MagangController::class, 'edit_laporan_mhs']);
Route::put('/proses-edit-laporan-mhs/{id}', [MagangController::class, 'proses_edit_laporan_mhs']);

Route::get('/mhs/cari', [MagangController::class, 'laporan_mhs']);
Route::get('/smk/cari', [MagangController::class, 'laporan_smk']);

Route::get('penilaian-mhs', [MagangController::class, 'penilaian_mhs']);
Route::get('surat-penerimaan-mhs', [MagangController::class, 'surat_penerimaan_mhs']);
Route::get('/balasan-mhs-cetak', [MagangController::class, 'balasan_mhs_cetak']);

Route::get('surat-memo-divisi',[MagangController::class,'surat_memo_divisi']);
Route::get('cetak-surat-memo-divisi',[MagangController::class,'cetak_surat_memo_divisi']);
Route::get('/delete-data-mhs/{user_id}/{id_rekap}', [MagangController::class, 'proses_hapus_mhs']);
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
Route::get('/dokumen-mhs-kel-upload-ktp/{id}', [MagangController::class, 'show_mhs_kel_dokumen_ktp']);
Route::get('/dokumen-mhs-kel-upload-ktm/{id}', [MagangController::class, 'show_mhs_kel_dokumen_ktm']);
Route::get('/dokumen-mhs-kel-upload-bpjs/{id}', [MagangController::class, 'show_mhs_kel_dokumen_bpjs']);

Route::get('/dokumen-mhs-kel/{id}/{foto}', [MagangController::class, 'hapus_mhs_kel_dokumen']);
Route::get('/dokumen-mhs-kel-foto/{id}/{fotoID}', [MagangController::class, 'hapus_mhs_kel_foto']);

Route::post('/upload-mhs-kel-foto/{id}', [MagangController::class, 'upload_mhs_kel_foto']);
Route::post('/upload-mhs-kel-ktp/{id}', [MagangController::class, 'upload_mhs_kel_ktp']);
Route::post('/upload-mhs-kel-ktm/{id}',[MagangController::class,'upload_mhs_kel_ktm']);
Route::post('/upload-mhs-kel-bpjs/{id}',[MagangController::class,'upload_mhs_kel_bpjs']);

Route::get('/sertifikat_mhs', [MagangController::class, 'sertifikat_mhs']);
Route::get('/sertifikat_smk', [MagangController::class, 'sertifikat_smk']);
Route::get('/sertif-smk-pdf', [MagangController::class, 'sertif_smk_pdf']);
Route::get('/sertif-mhs-pdf', [MagangController::class, 'sertifikatmhspdf']);
Route::get('/surat-keterangan-mhs', [MagangController::class, 'surat_keterangan_mhs']);
Route::get('/surat-keterangan-smk', [MagangController::class, 'surat_keterangan_smk']);
Route::get('/surat-keterangan-mhs-pdf', [MagangController::class, 'surat_keterangan_mhs_pdf']);
Route::get('/surat-keterangan-smk-pdf', [MagangController::class, 'surat_keterangan_smk_pdf']);

Route::get('tugas-mhs',[MagangController::class,'tugas_mhs']);
Route::get('lihat-kegiatan-mhs/{id}',[MagangController::class,'lihat_kegiatan_mhs']);
Route::post('proses-kegiatan-mhs/{id}/{user_id}',[MagangController::class,'proses_kegiatan_mhs']);
Route::post('tambah-kegiatan-mhs',[MagangController::class,'tambah_kegiatan_mhs']);
Route::get('cetak-kegiatan-mhs-pdf',[MagangController::class,'cetak_kegiatan_mhs_pdf']);
Route::get('delete-tugas-mhs/{id}/{foto}',[MagangController::class,'delete_tugas_mhs']);
Route::get('surat-perizinan-barang-mhs',[MagangController::class,'surat_perizinan_barang_mhs']);
Route::get('surat-perizinan-barang-mhs-pdf',[MagangController::class,'surat_perizinan_barang_mhs_pdf']);
Route::get('tambah-barang-mhs/{id}',[MagangController::class,'tambah_barang_mhs']);
Route::post('proses-tambah-barang-mhs/{id}',[MagangController::class,'proses_tambah_barang_mhs']);
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

Route::get('/dokumen-smk-upload-ktp/{id}', [MagangController::class, 'show_smk_dokumen_ktp']);
Route::get('/dokumen-smk-upload-ktm/{id}', [MagangController::class, 'show_smk_dokumen_ktm']);
Route::get('/dokumen-smk-upload-bpjs/{id}', [MagangController::class, 'show_smk_dokumen_bpjs']);
Route::get('/dokumen-smk-upload-foto/{id}', [MagangController::class, 'show_smk_foto']);
Route::post('/upload-smk-foto/{id}', [MagangController::class, 'upload_smk_foto']);
Route::post('/upload-smk-ktp/{id}', [MagangController::class, 'upload_smk_ktp']);
Route::post('/upload-smk-ktm/{id}', [MagangController::class, 'upload_smk_ktm']);
Route::post('/upload-smk-bpjs/{id}', [MagangController::class, 'upload_smk_bpjs']);

Route::get('/profil-smk', [MagangController::class, 'profil_smk']);

Route::get('/absen-smk', [MagangController::class, 'absen_smk']);
Route::post('/proses-absen-masuk-smk/{individ}', [MagangController::class, 'proses_absen_masuk_smk']);
Route::post('/proses-absen-pulang-smk/{individ}', [MagangController::class, 'proses_absen_pulang_smk']);
Route::post('/proses-absen-izin-smk/{individ}', [MagangController::class, 'proses_absen_izin_smk']);
Route::get('/absen-datang-smk/{id}',[MagangController::class,'absen_datang_smk']);
Route::get('/absen-pulang-smk/{id}',[MagangController::class,'absen_pulang_smk']);
Route::get('/absen-izin-smk/{id}',[MagangController::class,'absen_izin_smk']);
Route::get('/cetak-absen-smk-pdf', [MagangController::class, 'cetak_absensmk_pdf']);

// Route::get('/proses-absen-smk/{absenid}/{individ}', [MagangController::class, 'proses_absen_smk']);

Route::get('/id-card-smk', [MagangController::class, 'id_card_smk']);
Route::get('/id-card-smk-pdf', [MagangController::class, 'id_card_smk_pdf']);
Route::get('/id-card-smk-pdf-save', [MagangController::class, 'id_card_smk_pdf_save']);

Route::get('/laporan-smk', [MagangController::class, 'laporan_smk']);
Route::get('/upload-laporan-smk', [MagangController::class, 'upload_laporan_smk']);
Route::post('/proses-laporan-smk', [MagangController::class, 'proses_laporan_smk']);
Route::get('/lihat-laporan-smk/{id}', [MagangController::class, 'lihat_laporan_smk']);
Route::get('/lihat-laporan-smk-revisi/{id}', [MagangController::class, 'lihat_laporan_smk_revisi']);

Route::get('/edit-laporan-smk/{id}', [MagangController::class, 'edit_laporan_smk']);
Route::put('/proses-edit-laporan-smk/{id}', [MagangController::class, 'proses_edit_laporan_smk']);
Route::get('/surat-penerimaan-smk', [MagangController::class, 'surat_penerimaan_smk']);
Route::get('/balasan-smk-cetak', [MagangController::class, 'balasan_smk_cetak']);

Route::get('penilaian-smk', [MagangController::class, 'penilaian_smk']);

Route::get('surat-memo-divisi-smk',[MagangController::class,'surat_memo_divisi_smk']);
Route::get('cetak-surat-memo-divisi-smk',[MagangController::class,'cetak_surat_memo_divisi_smk']);
Route::get('/delete-data-smk/{user_id}/{id_rekap}', [MagangController::class, 'proses_hapus_smk']);
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
Route::get('/dokumen-smk-kel-upload-ktp/{id}', [MagangController::class, 'show_smk_kel_dokumen_ktp']);
Route::get('/dokumen-smk-kel-upload-ktm/{id}', [MagangController::class, 'show_smk_kel_dokumen_ktm']);
Route::get('/dokumen-smk-kel-upload-bpjs/{id}', [MagangController::class, 'show_smk_kel_dokumen_bpjs']);

Route::get('/dokumen-smk-kel/{id}/{foto}', [MagangController::class, 'hapus_smk_kel_dokumen']);
Route::get('/dokumen-smk-kel-foto/{id}/{fotoID}', [MagangController::class, 'hapus_smk_kel_foto']);

Route::post('/upload-smk-kel-foto/{id}', [MagangController::class, 'upload_smk_kel_foto']);
Route::post('/upload-smk-kel-ktp/{id}', [MagangController::class, 'upload_smk_kel_ktp']);
Route::post('/upload-smk-kel-ktm/{id}', [MagangController::class, 'upload_smk_kel_ktm']);
Route::post('/upload-smk-kel-bpjs/{id}', [MagangController::class, 'upload_smk_kel_bpjs']);

Route::get('surat-perizinan-barang-smk',[MagangController::class,'surat_perizinan_barang_smk']);
Route::get('surat-perizinan-barang-smk-pdf',[MagangController::class,'surat_perizinan_barang_smk_pdf']);
Route::get('tambah-barang-smk/{id}',[MagangController::class,'tambah_barang_smk']);
Route::post('proses-tambah-barang-smk/{id}',[MagangController::class,'proses_tambah_barang_smk']);

Route::get('tugas-smk',[MagangController::class,'tugas_smk']);
Route::get('lihat-kegiatan-smk/{id}',[MagangController::class,'lihat_kegiatan_smk']);
Route::post('proses-kegiatan-smk/{id}/{user_id}',[MagangController::class,'proses_kegiatan_smk']);
Route::post('tambah-kegiatan-smk',[MagangController::class,'tambah_kegiatan_smk']);
Route::get('cetak-kegiatan-smk-pdf',[MagangController::class,'cetak_kegiatan_smk_pdf']);
Route::get('delete-tugas-smk/{id}/{foto}',[MagangController::class,'delete_tugas_smk']);
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
Route::get('/delete-data-penelitian/{id}/{id_rekap}', [PenelitianController::class, 'delete_data_penelitian']);
Route::post('/proses-berkas-penelitian', [PenelitianController::class, 'proses_berkas_penelitian']);


Route::get('/dokumen-penelitian', [PenelitianController::class, 'dokumen_penelitian']);
Route::get('dokumen-penelitian-upload-foto/{id}', [PenelitianController::class, 'dokumen_penelitian_upload_foto']);
Route::get('/dokumen-penelitian-upload-ktp/{id}', [PenelitianController::class, 'dokumen_penelitian_ktp']);
Route::get('/dokumen-penelitian-upload-ktm/{id}', [PenelitianController::class, 'dokumen_penelitian_ktm']);
Route::get('/dokumen-penelitian-upload-bpjs/{id}', [PenelitianController::class, 'dokumen_penelitian_bpjs']);
Route::post('upload-penelitian-foto/{id}', [PenelitianController::class, 'upload_penelitian_foto']);
Route::post('/upload-penelitian-ktp/{id}', [PenelitianController::class, 'upload_penelitian_ktp']);
Route::post('/upload-penelitian-ktm/{id}', [PenelitianController::class, 'upload_penelitian_ktm']);
Route::post('/upload-penelitian-bpjs/{id}', [PenelitianController::class, 'upload_penelitian_bpjs']);
Route::get('/hapus-penelitian-dokumenlain/{id}/{foto}', [PenelitianController::class, 'hapus_penelitian_dokumenlain']);
Route::get('/hapus-penelitian-foto/{id}/{fotoID}', [PenelitianController::class, 'hapus_penelitian_foto']);
Route::get('surat-penerimaan-penelitian', [PenelitianController::class, 'surat_penerimaan_penelitian']);
Route::get('/balasan-penelitian-cetak', [PenelitianController::class, 'balasan_penelitian_cetak']);
Route::get('/id-card-penelitian-pdf', [PenelitianController::class, 'id_card_penelitian_pdf']);
Route::get('profil-penelitian', [PenelitianController::class, 'profil_penelitian']);
Route::get('absen-penelitian', [PenelitianController::class, 'absen_penelitian']);
Route::get('/proses-absen-masuk-penelitian/{individ}', [PenelitianController::class, 'proses_absen_masuk_penelitian']);
Route::get('/proses-absen-pulang-penelitian/{individ}', [PenelitianController::class, 'proses_absen_pulang_penelitian']);
Route::get('/cetak-absen-penelitian-pdf', [PenelitianController::class, 'cetak_absenpenelitian_pdf']);
Route::post('/proses-absen-izin-penelitian/{indivd}', [PenelitianController::class, 'proses_absen_izin_penelitian']);
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

Route::get('surat-memo-divisi-penelitian',[PenelitianController::class,'surat_memo_divisi_penelitian']);
Route::get('cetak-surat-memo-divisi-penelitian',[PenelitianController::class,'cetak_surat_memo_divisi_penelitian']);
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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('konfirmasi-akun',[AdminController::class,'konfirmasi_akun']);
Route::put('proses-konfirmasi-akun-admin/{id}',[DivisiController::class,'proses_konfirmasi_akun_admin']);