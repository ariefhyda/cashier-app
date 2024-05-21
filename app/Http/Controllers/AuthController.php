<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordEmail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function index()
    {
        // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada
        if ($user) {
            // jika user nya memiliki level admin
            if ($user->level == 'admin') {
                // arahkan ke halaman admin ya
                return redirect()->intended('kasir');
            }
            // jika user nya memiliki level user
            else if ($user->level == 'user') {
                // arahkan ke halaman user
                return redirect()->intended('kasir');
            }
        }
        return view('auth.login');
    }
    //
    public function proses_login(Request $request)
    {
        // kita buat validasi pada saat tombol login di klik
        // validas nya username & password wajib di isi
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        // ambil data request username & password saja
        $credential = $request->only('username', 'password');

        // cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($credential)) {
            // kalau berhasil simpan data user ya di variabel $user
            $user =  Auth::user();
            // cek lagi jika level user admin maka arahkan ke halaman admin
            if ($user->level == 'admin') {
                return redirect()->intended('kasir');
            }
            // tapi jika level user nya user biasa maka arahkan ke halaman user
            else if ($user->level == 'kasir') {
                return redirect()->intended('kasir');
            }
            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesan error juga kalau login gagal ya
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function forgot_password()
    {
        // tampilkan view register
        return view('auth.forgot_password');
    }


    // aksi form forgot password
    public function proses_forgot_password(Request $request)
    {
        //. kita buat validasi nih buat proses_forgot_password
        // validasinya yaitu semua field wajib di isi
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        // kalau gagal kembali ke halaman forgot_password dengan munculkan pesan error
        if ($validator->fails()) {
            return redirect('/forgot_password')
                ->withErrors($validator)
                ->withInput();
        }

        $cekEmail = User::where('email', $request->email)->first();

        if ($cekEmail) {
            // kalau berhasil isi reset token
            $email = $request->email;
            $token = Str::random(20);

            // masukkan semua data pada request ke table reset token
            PasswordResetToken::create([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);

            // kalo berhasil arahkan ke halaman forgot_password
            return redirect()->route('forgot_password')->with('sukses', 'Berhasil mengirim link reset password');
        } else {
            // kalo gagal arahkan ke halaman forgot_password
            return redirect()->route('forgot_password')->with('gagal', 'Email tidak terdaftar');
        }
    }

    public function sendMail()
    {
        $content = [
            'nama' => 'aaa',
            'token' => 'aaa',
        ];
        Mail::to("hyda.arif@gmail.com")->send(new ForgotPasswordEmail($content));

        return "Email telah dikirim";
    }

    public function FunctionName() {

    }

    public function logout(Request $request)
    {
        // logout itu harus menghapus session nya

        $request->session()->flush();

        // jalan kan juga fungsi logout pada auth

        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('login');
    }
}
