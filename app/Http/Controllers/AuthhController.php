<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
                return redirect('/admin_dash')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 2) {
                return redirect('/Penerimaan')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 3) {
                return redirect('/profil-mhs')->with('success', 'Selamat Anda Lolos Magang. Silahkan print form konfirmasi magang untuk di serahkan ke HCM. Selama magang selalu gunakan fitur yang sudah di sediakan jika terdapat kendala silahkan hubungi admin HCM.');
            } elseif (auth()->user()->role_id == 4) {
                return redirect('/Profil_smk')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 5) {
                return redirect('/id-card')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 6) {
                return redirect('/data-mhs-kelompok')->with('success', 'Selamat Datang di Registrasi Magang PT PAL Indonesia.Mohon Lengkapi semua data Kelompok anda untuk diproses ke tahap lanjut, jika sudah di lengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 7) {
                return redirect('/data-smk-kelompok')->with('success', 'Lengkapi semua data yang diminta untuk diproses lebih lanjut, jika sudah dilengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 8) {
                return redirect('/data-mhs')->with('success', 'Lengkapi semua data yang diminta untuk diproses lebih lanjut, jika sudah dilengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 9) {
                return redirect('/data-smk')->with('success', 'Lengkapi semua data yang diminta untuk diproses lebih lanjut, jika sudah dilengkapi anda tidak perlu mengirimkan ulang');
            } elseif (auth()->user()->role_id == 10) {
                return redirect('/regis-step2')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 11) {
                return redirect('/dokumen-mhs')->with('success', 'Selamat Anda lolos pada tahap interview kepribadian online. Mohon segera lengkapi data dokumen magang di bawah ini dan baca pentunjuk yang sudah di berikan. Kami beri waktu 5 hari kerja untuk mengisi berkas dokumen ini.');
            } elseif (auth()->user()->role_id == 12) {
                return redirect('/Dokumen_smk')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 13) {
                return redirect('/Dokumen_mhskel')->with('success', 'You are now logged in');
            } elseif (auth()->user()->role_id == 14) {
                return redirect('/sertifikat_mhs')->with('success', 'Selamat Anda sudah menyelesaikan magang dengan tuntas.di mohon untuk segera mencetak sertifikat anda.akun anda akan di nonaktifkan 1 minggu setelah penerimaan sertifikat ini.');
            } elseif (auth()->user()->role_id == 16) {
                return redirect('/interview-mhs')->with('success', 'you are now logged in');
            } elseif (auth()->user()->role_id == 17) {
                return redirect('/interview-smk')->with('success', 'you are now logged in');
            } elseif (auth()->user()->role_id == 18) {
                return redirect('/admindivisi')->with('success','you are now logged in');
            } elseif (auth()->user()->role_id == 19) {
                return redirect('/testinterviewsmk')->with('success','you are now logged in');
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
            'name' => 'required|min:3|max:50|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 6,
            'status_user' => 'Kelompok',
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
            'password' => bcrypt($request->password),
            'role_id' => 8,
            'status_user' => 'Individu',
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
            'name' => 'required|min:3|max:50|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 7,
            'status_user' => 'Kelompok SMK',
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
            'password' => bcrypt($request->password),
            'role_id' => 9,
            'status_user' => 'Individu SMK',
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
            'password' => bcrypt($request->password),
            'role_id' => 10,
            'rememberToken' => str::random(60)
        ]);

        session()->flash('succes', 'Terimakasih telah mendaftar, login sekarang!');
        return redirect('/login');
    }
    // Registrasi Penelitian Mahasiswa ====== |||
}
