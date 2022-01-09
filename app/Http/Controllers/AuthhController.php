<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Hash;

class AuthhController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Login ======
    public function index() // nama untuk di panggil kedalam routs
    {
        return view('authh.login', [
            "title" => "Login Page"
        ]);
    }

    public function postLogin(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek apakah data user yang dikirim dalam variabel $attributes benar atau tidak, syartnya name dan field di database harus sama
        if (Auth::attempt($attributes)) {
            if (auth()->user()->role_id == 1) {
                return redirect('/admin_dash')->with('succes', 'You are now logged in');
            } elseif (auth()->user()->role_id == 0) {
                return redirect('/penuh')->with('succes', 'You are now logged in');
            } elseif (auth()->user()->role_id == 2) {
                return redirect('/Penerimaan')->with('succes', 'You are now logged in');
            } elseif (auth()->user()->role_id == 3) {
                return redirect('/profil-mhs')->with('succes', 'Selamat Anda Lolos Magang. Silahkan print form konfirmasi magang untuk di serahkan ke HCM. Selama magang selalu gunakan fitur yang sudah di sediakan jika terdapat kendala silahkan hubungi admin HCM Pak Iwan (088226199728).');
            } elseif (auth()->user()->role_id == 4) {
                return redirect('/profil-smk')->with('succes', 'Selamat Anda Lolos Magang. Silahkan print form konfirmasi magang untuk di serahkan ke HCM. Selama magang selalu gunakan fitur yang sudah di sediakan jika terdapat kendala silahkan hubungi admin HCM Pak Iwan (088226199728).');
            } elseif (auth()->user()->role_id == 5) {
                return redirect('/id-card')->with('succes', 'You are now logged in');
            } elseif (auth()->user()->role_id == 6) {
                return redirect('/data-mhs-kelompok')->with('succes', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 7) {
                return redirect('/data-smk-kelompok')->with('succes', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 8) {
                return redirect('/data-mhs')->with('succes', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 9) {
                return redirect('/data-smk')->with('succes', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 11) {
                return redirect('/dokumen-mhs')->with('succes', 'Selamat Anda lolos pada tahap interview kepribadian online. Mohon segera lengkapi data dokumen magang di bawah ini dan baca pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk mengisi berkas dokumen ini.');
            } elseif (auth()->user()->role_id == 12) {
                return redirect('/dokumen-smk')->with('succes', 'Selamat Anda lolos pada tahap interview kepribadian online. Mohon segera lengkapi data dokumen magang di bawah ini dan baca pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk mengisi berkas dokumen ini.');
            } elseif (auth()->user()->role_id == 13) {
                return redirect('/Dokumen_mhskel')->with('succes', 'Selamat Anda lolos pada tahap interview kepribadian online. Mohon segera lengkapi data dokumen magang di bawah ini dan baca pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk mengisi berkas dokumen ini.');
            } elseif (auth()->user()->role_id == 14) {
                return redirect('/sertifikat_mhs')->with('succes', 'Selamat Anda sudah menyelesaikan magang dengan tuntas.Mohon segera mencetak sertifikat anda.Akun anda akan di nonaktifkan 1 minggu setelah penerimaan sertifikat ini.');
            } elseif (auth()->user()->role_id == 15) {
                return redirect('/sertifikat_smk')->with('succes', 'Selamat Anda sudah menyelesaikan magang dengan tuntas.Mohon segera mencetak sertifikat anda.Akun anda akan di nonaktifkan 1 minggu setelah penerimaan sertifikat ini.');
            } elseif (auth()->user()->role_id == 16) {
                return redirect('/interview-mhs')->with('succes', 'Selamat Anda lolos pada tahap Pendaftaran. Mohon segera melakukan test interview dan mengupload hasilnya dengan mengikuti pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk melengkapi dokumen interview tersebut.');
            } elseif (auth()->user()->role_id == 17) {
                return redirect('/interview-smk')->with('succes', 'Selamat Anda lolos pada tahap Pendaftaran. Mohon segera melakukan test interview dan mengupload hasilnya dengan mengikuti pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk melengkapi dokumen tersebut.');
            } elseif (auth()->user()->role_id == 18) {
                return redirect('/kelola-jurusan')->with('succes', 'you are now logged in');
            } elseif (auth()->user()->role_id == 19) {
                return redirect('/selesai')->with('succes', 'you are now logged in');
            } elseif (auth()->user()->role_id == 20) {
                return redirect('/selesai-smk')->with('succes', 'you are now logged in');
            } elseif (auth()->user()->role_id == 21) {
                return redirect('/data-penelitian')->with('succes', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 22) {
                return redirect('/dokumen-penelitian')->with('succes', 'Selamat Anda lolos pada tahap Pendaftaran Penelitian. Mohon segera lengkapi data dokumen penelitian di bawah ini dan baca pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk mengisi berkas dokumen ini.');
            } elseif (auth()->user()->role_id == 23) {
                return redirect('/profil-penelitian')->with('succes', 'Selamat Anda Lolos Seleksi Penelitian. Silahkan print surat penerimaan penelitian untuk di serahkan ke HCM. Selama meneliti selalu gunakan fitur yang sudah di sediakan jika terdapat kendala silahkan hubungi admin HCM Pak Iwan (088226199728).');
            } elseif (auth()->user()->role_id == 24) {
                return redirect('/surat_penelitian')->with('succes', 'you are now logged in');
            } elseif (auth()->user()->role_id == 25) {
                return redirect('/penelitian-selesai')->with('succes', 'you are now logged in');
            } elseif (auth()->user()->role_id == 26) {
                return redirect('/penelitian-kuota-penuh')->with('succes', 'you are now logged in');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau Password salah!'
        ]);
    }
    // Login ======


    public function auth()
    {
        return view('authh.auth', [
            "title" => "Registrasi Magang & Penelitian"
        ]);
    }

    public function auth_mhs()
    {
        return view('authh.auth_mhs', [
            "title" => "Registrasi Mahasiswa"
        ]);
    }

    // Registrasi Mahasiswa Kelompok ======
    public function auth_mhs_kel()
    {
        return view('authh.auth_mhs_kel', [
            "title" => "Registrasi Kelompok"
        ]);
    }

    public function postRegMhsKel(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 6,
            'status_user' => 'Mahasiswa Kelompok',
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }
    // Registrasi Mahasiswa Kelompok ======|||

    // Registrasi Mahasiswa Individu ======
    public function auth_mhs_individu()
    {
        return view('authh.auth_mhs_individu', [
            "title" => "Registrasi Mahasiswa"
        ]);
    }

    public function postRegMhsIndiv(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 8,
            'status_user' => 'Mahasiswa',
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }
    // Registrasi Mahasiswa Individu ====== |||

    // Registrasi SMK Kelompok ======
    public function auth_smk_kel()
    {
        return view('authh.auth_smk_kel', [
            "title" => "Registrasi Kelompok"
        ]);
    }

    public function postRegSmkKel(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 7,
            'status_user' => 'SMK Kelompok',
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }
    // Registrasi SMK Kelompok ====== |||

    public function auth_smk()
    {
        return view('authh.auth_smk', [
            "title" => "Registrasi"
        ]);
    }

    // Registrasi SMK Kelompok ======
    public function auth_smk_individu()
    {
        return view('authh.auth_smk_individu', [
            "title" => "Registrasi Magang SMK"
        ]);
    }

    public function postRegSmkIndiv(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 9,
            'status_user' => 'SMK',
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }
    // Registrasi SMK Kelompok ====== |||

    // Registrasi Penelitian Mahasiswa ======
    public function authPenelitian()
    {
        return view('authh.auth-penelitian', [
            "title" => "Registrasi Penelitian Mahasiswa"
        ]);
    }

    public function postRegPenelitian(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 21,
            'status_user' => 'Penelitian',
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }

    // Registrasi Penelitian Mahasiswa ====== |||
}