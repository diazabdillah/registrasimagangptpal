<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\DaftarRuangan;
use App\Models\JadwalSertifikasi;
use App\Models\PeminjamanRuangan;
use App\Models\Training;
use App\Models\UnitKerja;
use App\Models\SkemaBNSP;
use App\Models\JumlahAsesor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function showInfoBeasiswa()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Info Beasiswa Managemen';
            $data = DB::table('beasiswa')->orderByDesc('id')->simplePaginate(10);

            return view('services.info_beasiswa', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputInfoBeasiswa()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Info Beasiswa';

            return view('services.input-info_beasiswa', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputInfoBeasiswa(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'institusi' => 'required',
            'url' => 'required'
        ]);

        Beasiswa::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'institusi' => $request->institusi,
            'url' => $request->url,
        ]);

        session()->flash('succes', 'Info Beasiswa sudah di upload!');
        return redirect('/show-info-beasiswa');
    }

    public function editInfoBeasiswa($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Info Beasiswa';
            $data = DB::table('beasiswa')->where('id', $id)->first();

            return view('services.edit-info_beasiswa', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateInfoBeasiswa(Request $request, $id)
    {
        DB::table('beasiswa')->where('id', $id)
            ->update([
                'nama_beasiswa' => $request->nama_beasiswa,
                'institusi' => $request->institusi,
                'url' => $request->url,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-info-beasiswa');
    }

    public function deleteInfoBeasiswa($id)
    {
        DB::table('beasiswa')->where('id', $id)->delete();
        return redirect('/show-info-beasiswa')->with('succes', 'Info Beasiswa Anda Berhasil DiHapus');
    }

    public function showTraining()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Training Managemen';
            $data = DB::table('training')->orderByDesc('id')->simplePaginate(10);

            $training = DB::table('training')->get();

            foreach ($training as $t){
                if (now() < $t->tanggal_mulai){
                    $status = "Segera Akan Datang";
                    DB::table('training')->where('id', $t->id)->update([
                        'status' => $status
                    ]);
                } else if ((now() >= $t->tanggal_mulai) && (now() < $t->tanggal_selesai)) {
                    $status = "Sedang Berlangsung";
                    DB::table('training')->where('id', $t->id)->update([
                        'status' => $status
                    ]);
                } else {
                    $status = "Selesai";
                    DB::table('training')->where('id', $t->id)->update([
                        'status' => $status
                    ]);
                }
            }

            return view('services.training', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputTraining()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Training';

            return view('services.input-training', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputTraining(Request $request)
    {
        $request->validate([
            'nama_training' => 'required',
            'penyelenggara' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tempat' => 'required',
            'peserta_sprint' => 'required',
            'peserta_hadir' => 'required'
        ]);

        $file = $request->file('fileTraining');
        if ($file == null) {
            $nama_file = "-";
        } else {
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'DokumenTraining';
            $file->move($tujuan_upload, $nama_file);
        }
        $status = "Segera Akan Datang";


        Training::create([
            'nama_training' => $request->nama_training,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tempat' => $request->tempat,
            'peserta_sprint' => $request->peserta_sprint,
            'peserta_hadir' => $request->peserta_hadir,
            'fileTraining' => $nama_file,
            'status' => $status,
        ]);

        session()->flash('succes', 'Training sudah di upload!');
        return redirect('/show-training');
    }

    public function editTraining($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Training';
            $data = DB::table('training')->where('id', $id)->first();

            return view('services.edit-training', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateTraining(Request $request, $id)
    {
        if ($request->file('fileTraining') == null) {
            $trainingLama = Training::find($id);
            $fileLama = $trainingLama->fileTraining;

            DB::table('training')->where('id', $id)
                ->update([
                    'nama_training' => $request->nama_training,
                    'penyelenggara' => $request->penyelenggara,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'tempat' => $request->tempat,
                    'peserta_sprint' => $request->peserta_sprint,
                    'peserta_hadir' => $request->peserta_hadir,
                    'fileTraining' => $fileLama,
                ]);
        } else {
            $trainingLama = Training::find($id);
            File::delete('DokumenTraining/' . $trainingLama->fileTraining);

            $file = $request->file('fileTraining');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'DokumenTraining';
            $file->move($tujuan_upload, $nama_file);

            DB::table('training')->where('id', $id)
                ->update([
                    'nama_training' => $request->nama_training,
                    'penyelenggara' => $request->penyelenggara,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'tempat' => $request->tempat,
                    'peserta_sprint' => $request->peserta_sprint,
                    'peserta_hadir' => $request->peserta_hadir,
                    'fileTraining' => $nama_file,
                ]);
        }

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-training');
    }

    public function deleteTraining($id)
    {
        $trainingLama = Training::find($id);
        File::delete('DokumenTraining/' . $trainingLama->fileTraining);

        DB::table('training')->where('id', $id)->delete();
        return redirect('/show-training')->with('succes', 'Data Training Anda Berhasil DiHapus');
    }

    public function showPeminjamanRuangan()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Peminjaman Ruangan Managemen';
            $dataRuangan = DB::table('daftar_ruangan')->orderByDesc('id')->simplePaginate(10);
            $dataPeminjam = DB::table('peminjaman_ruangan')->orderByDesc('id')->simplePaginate(10);

            return view('services.peminjaman_ruangan', [
                'ti' => $ti,
                'dataRuangan' => $dataRuangan,
                'dataPeminjam' => $dataPeminjam
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputDaftarRuangan()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Daftar Ruangan';

            return view('services.input-daftar_ruangan', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputDaftarRuangan(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'fasilitas' => 'required',
            'kapasitas' => 'required',
            'foto_ruangan' => 'required'
        ]);

        $file = $request->file('foto_ruangan');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'Foto Ruangan';
        $file->move($tujuan_upload, $nama_file);
        $status = "Available";

        DaftarRuangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'fasilitas' => $request->fasilitas,
            'kapasitas' => $request->kapasitas,
            'foto_ruangan' => $nama_file,
            'status' => $status,
        ]);

        session()->flash('succes', 'Daftar Ruangan sudah di upload!');
        return redirect('/show-peminjaman-ruangan');
    }

    public function availableRuangan($id)
    {
        $available = "Available";

        DB::table('daftar_ruangan')->where('id', $id)
            ->update([
                'status' => $available,
            ]);
        return redirect('/show-peminjaman-ruangan');
    }

    public function unavailableRuangan($id)
    {
        $unavailable = "Unavailable";

        DB::table('daftar_ruangan')->where('id', $id)
            ->update([
                'status' => $unavailable,
            ]);
        return redirect('/show-peminjaman-ruangan');
    }

    public function editDaftarRuangan($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Daftar Ruangan';
            $data = DB::table('daftar_ruangan')->where('id', $id)->first();

            return view('services.edit-daftar_ruangan', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateDaftarRuangan(Request $request, $id)
    {
        $ruangan = DaftarRuangan::find($id);
        File::delete('Foto Ruangan/' . $ruangan->foto_ruangan);

        $file = $request->file('foto_ruangan');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'Foto Ruangan';
        $file->move($tujuan_upload, $nama_file);

        DB::table('daftar_ruangan')->where('id', $id)
            ->update([
                'nama_ruangan' => $request->nama_ruangan,
                'fasilitas' => $request->fasilitas,
                'kapasitas' => $request->kapasitas,
                'foto_ruangan' => $nama_file,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-peminjaman-ruangan');
    }

    public function deleteDaftarRuangan($id)
    {
        $ruangan = DaftarRuangan::find($id);
        File::delete('Foto Ruangan/' . $ruangan->foto_ruangan);

        DB::table('daftar_ruangan')->where('id', $id)->delete();
        return redirect('/show-peminjaman-ruangan')->with('succes', 'Data Daftar Ruangan Anda Berhasil DiHapus');
    }

    public function prosesInputPeminjamanRuangan(Request $request)
    {
        $request->validate([
            'pilih_ruangan' => 'required',
            'nama_peminjam' => 'required',
            'divisi' => 'required',
            'departemen' => 'required',
            'no_telp' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keperluan' => 'required'
        ]);

        $status = "Proses";

        PeminjamanRuangan::create([
            'pilih_ruangan' => $request->pilih_ruangan,
            'nama_peminjam' => $request->nama_peminjam,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
            'no_telp' => $request->no_telp,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => $status,
        ]);

        session()->flash('succes', 'Pengajuan Peminjaman Ruangan sudah berhasil diajukan!');
        return redirect('/peminjaman_ruangan');
    }

    public function editPeminjamanRuangan($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Peminjaman Ruangan';
            $data = DB::table('peminjaman_ruangan')->where('id', $id)->first();

            return view('services.edit-peminjaman_ruangan', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updatePeminjamanRuangan(Request $request, $id)
    {
        DB::table('peminjaman_ruangan')->where('id', $id)
            ->update([
                'pilih_ruangan' => $request->pilih_ruangan,
                'nama_peminjam' => $request->nama_peminjam,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen,
                'no_telp' => $request->no_telp,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'keperluan' => $request->keperluan,
                'status' => $request->status,
            ]);

        session()->flash('succes', 'Data Peminjaman Ruangan anda berhasil di update');
        return redirect('/show-peminjaman-ruangan');
    }

    public function deletePeminjamanRuangan($id)
    {
        DB::table('peminjaman_ruangan')->where('id', $id)->delete();
        return redirect('/show-peminjaman-ruangan')->with('succes', 'Data Peminjaman Ruangan Anda Berhasil DiHapus');
    }

    public function showUnitKerja()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Informasi Unit Kerja Managemen';
            $data = DB::table('unit_kerja')->orderByDesc('id')->simplePaginate(10);

            return view('services.unit_kerja', [
                'ti' => $ti,
                'data' => $data
            ])->with('i');
        } else {
            return redirect()->back();
        }
    }

    public function inputUnitKerja()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Informasi Unit Kerja';

            return view('services.input-unit_kerja', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputUnitKerja(Request $request)
    {
        $request->validate([
            'kode_divisi' => 'required',
            'divisi' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'File Unit Kerja';
        $file->move($tujuan_upload, $nama_file);

        UnitKerja::create([
            'kode_divisi' => $request->kode_divisi,
            'divisi' => $request->divisi,
            'file' => $nama_file,
        ]);

        session()->flash('succes', 'Data Informasi Unit Kerja sudah di upload!');
        return redirect('/show-unit-kerja');
    }

    public function editUnitKerja($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Informasi Unit Kerja';
            $data = DB::table('unit_kerja')->where('id', $id)->first();

            return view('services.edit-unit_kerja', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateUnitKerja(Request $request, $id)
    {
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'File Unit Kerja';
        $file->move($tujuan_upload, $nama_file);

        DB::table('unit_kerja')->where('id', $id)
            ->update([
                'kode_divisi' => $request->kode_divisi,
                'divisi' => $request->divisi,
                'file' => $nama_file,
            ]);

        session()->flash('succes', 'Data Informai anda berhasil di update');
        return redirect('/show-unit-kerja');
    }

    public function deleteUnitKerja($id)
    {
        DB::table('unit_kerja')->where('id', $id)->delete();
        return redirect('/show-unit-kerja')->with('succes', 'Data Informasi Unit Kerja Anda Berhasil DiHapus');
    }

    public function showInformasiLSP()
    {
        if (auth()->user()->role_id == 1) {
            $ti = 'Informasi LSP Managemen';
            $data_js = DB::table('jadwal_sertifikasi')->orderByDesc('id')->simplePaginate(10);
            $data_sb = DB::table('skema_bnsp')->orderByDesc('id')->simplePaginate(10);
            $data_ja = DB::table('jumlah_asesor')->orderByDesc('id')->simplePaginate(10);

            return view('services.informasi_lsp', [
                'ti' => $ti,
                'data_js' => $data_js,
                'data_sb' => $data_sb,
                'data_ja' => $data_ja
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function inputJadwalSertifikasi()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Jadwal Sertifikasi';

            return view('services.input-jadwal_sertifikasi', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputJadwalSertifikasi(Request $request)
    {
        $request->validate([
            'nama_training' => 'required',
            'penyelenggara' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tempat' => 'required',
            'peserta_sprint' => 'required',
            'peserta_hadir' => 'required',
            'fileSertifikasi' => 'required'
        ]);

        $file = $request->file('fileSertifikasi');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'DokumenSertifikatTraining';
        $file->move($tujuan_upload, $nama_file);

        JadwalSertifikasi::create([
            'nama_training' => $request->nama_training,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tempat' => $request->tempat,
            'peserta_sprint' => $request->peserta_sprint,
            'peserta_hadir' => $request->peserta_hadir,
            'fileSertifikasi' => $nama_file,
        ]);

        session()->flash('succes', 'Training sudah di upload!');
        return redirect('/show-informasi-lsp');
    }

    public function editJadwalSertifikasi($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Sertifikat Training';
            $data = DB::table('jadwal_sertifikasi')->where('id', $id)->first();

            return view('services.edit-jadwal_sertifikasi', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateJadwalSertifikasi(Request $request, $id)
    {
        if ($request->file('fileSertifikasi') == null){
            $sertifLama = JadwalSertifikasi::find($id);
            $nama_file = $sertifLama->fileSertifikasi;
        } else {
            $sertifLama = JadwalSertifikasi::find($id);
            File::delete('DokumenSertifikatTraining/' . $sertifLama->fileSertifikasi);

            $file = $request->file('fileSertifikasi');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'DokumenSertifikatTraining';
            $file->move($tujuan_upload, $nama_file);
        }

        DB::table('jadwal_sertifikasi')->where('id', $id)
            ->update([
                'nama_training' => $request->nama_training,
                'penyelenggara' => $request->penyelenggara,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'tempat' => $request->tempat,
                'peserta_sprint' => $request->peserta_sprint,
                'peserta_hadir' => $request->peserta_hadir,
                'fileSertifikasi' => $nama_file,
            ]);

        session()->flash('succes', 'Data anda berhasil di update');
        return redirect('/show-informasi-lsp');
    }

    public function deleteJadwalSertifikasi($id)
    {
        $sertifLama = JadwalSertifikasi::find($id);
        File::delete('DokumenSertifikatTraining/' . $sertifLama->fileSertifikasi);

        DB::table('jadwal_sertifikasi')->where('id', $id)->delete();
        return redirect('/show-informasi-lsp')->with('succes', 'Data Jadwal Sertifikasi Anda Berhasil DiHapus');
    }

    public function inputSkemaBNSP()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Skema BNSP';

            return view('services.input-skema_bnsp', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputSkemaBNSP(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required',
            'nama_skema' => 'required',
            'level' => 'required',
            'bidang' => 'required'
        ]);

        SkemaBNSP::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'level' => $request->level,
            'bidang' => $request->bidang,
        ]);

        session()->flash('succes', 'Skema BNSP sudah di upload!');
        return redirect('/show-informasi-lsp');
    }

    public function editSkemaBNSP($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Skema BNSP';
            $data = DB::table('skema_bnsp')->where('id', $id)->first();

            return view('services.edit-skema_bnsp', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateSkemaBNSP(Request $request, $id)
    {
        DB::table('skema_bnsp')->where('id', $id)
            ->update([
                'kode_skema' => $request->kode_skema,
                'nama_skema' => $request->nama_skema,
                'level' => $request->level,
                'bidang' => $request->bidang,
            ]);

        session()->flash('succes', 'Data Informai anda berhasil di update');
        return redirect('/show-informasi-lsp');
    }

    public function deleteSkemaBNSP($id)
    {
        DB::table('skema_bnsp')->where('id', $id)->delete();
        return redirect('/show-informasi-lsp')->with('succes', 'Skema BNSP Anda Berhasil DiHapus');
    }

    public function inputJumlahAsesor()
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Jumlah Assesor';

            return view('services.input-jumlah_asesor', ['ti' => $ti]);
        } else {
            return redirect()->back();
        }
    }

    public function prosesInputJumlahAsesor(Request $request)
    {
        $request->validate([
            'nomor_registrasi' => 'required',
            'nama_assessor' => 'required'
        ]);

        JumlahAsesor::create([
            'nomor_registrasi' => $request->nomor_registrasi,
            'nama_assessor' => $request->nama_assessor,
        ]);

        session()->flash('succes', 'Data Assesor sudah di upload!');
        return redirect('/show-informasi-lsp');
    }

    public function editJumlahAsesor($id)
    {
        if (auth()->user()->role_id == 1) {

            $ti = 'Data Jumlah Assesor';
            $data = DB::table('jumlah_asesor')->where('id', $id)->first();

            return view('services.edit-jumlah_asesor', [
                'ti' => $ti,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateJumlahAsesor(Request $request, $id)
    {
        DB::table('jumlah_asesor')->where('id', $id)
            ->update([
                'nomor_registrasi' => $request->nomor_registrasi,
                'nama_assessor' => $request->nama_assessor,
            ]);

        session()->flash('succes', 'Data Asesor anda berhasil di update');
        return redirect('/show-informasi-lsp');
    }

    public function deleteJumlahAssesor($id)
    {
        DB::table('jumlah_asesor')->where('id', $id)->delete();
        return redirect('/show-informasi-lsp')->with('succes', 'Data Asesor Anda Berhasil DiHapus');
    }
}