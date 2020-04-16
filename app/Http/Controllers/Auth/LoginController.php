<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Provinsi;
use App\Transportasi;
use App\Perjalanan;
use App\Pemudik;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(){
        return view('auth.login_new');
    }

    public function postAdmin(Request $request)
    {
        if (Auth::guard('pemudik')->check()) {
            Auth::guard('pemudik')->logout();
        }

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/');
        }else{
            echo 'jiah password salah';
        }
    }

    public function postLogin(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'no_hp' => 'required|numeric|min:1',
            // recaptchaFieldName() => recaptchaRuleName()
        ]);

        if ($validasi->fails())
        {
            return var_dump($validasi->errors());
        }

        if (Auth::guard('pemudik')->attempt(['no_hp' => $request->no_hp, 'password' => '123'])) {
            return redirect()->intended('profile');
        }else{
            $request->session()->put('no_hp', $request->no_hp);
            return redirect('daftar');
        }
    }

    public function daftar(){
        $provinsi = Provinsi::orderBy('nama_provinsi','asc')->get();
        $transportasi = Transportasi::orderBy('nama_kendaraan','asc')->get();
        return view('profile.daftar',compact('provinsi','transportasi'));
    }

    public function storeDaftar(Request $request){
        $data = $request->all();
        $data['tgl_sampai'] = date('Y-m-d',strtotime($data['tgl_sampai']));

        $perjalanan = array(
            'provinsi_asal' => $data['provinsi_asal'],
            'kabupaten_asal' => $data['kabupaten_asal'],
            'kecamatan_asal' => $data['kecamatan_asal'],
            'desa_asal' => $data['desa_asal'],
            'provinsi_tujuan' => $data['provinsi_tujuan'],
            'kabupaten_tujuan' => $data['kabupaten_tujuan'],
            'kecamatan_tujuan' => $data['kecamatan_tujuan'],
            'desa_tujuan' => $data['desa_tujuan'],
            'kd_transportasi' => $data['transportasi'],
            'tgl_sampai' => $data['tgl_sampai']
        );

        $kd_perjalanan = Perjalanan::create($perjalanan)->kd_perjalanan;

        $pemudik = array(
            'kd_perjalanan' => $kd_perjalanan,
            'no_hp' => $data['no_hp'],
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'usia' => $data['usia'],
            'hub_kekerabatan' => $data['hub_kekerabatan'],
            'pekerjaan' => $data['pekerjaan'],
            'alamat' => $data['alamat'],
            'kd_kecamatan' => $data['kecamatan_tujuan'],
            'kd_desa' => $data['desa_tujuan'],
            'password' => \Hash::make('123')
        );

        Pemudik::create($pemudik);

        $request->session()->forget('no_hp');

        if (Auth::guard('pemudik')->attempt(['no_hp' => $data['no_hp'], 'password' => '123'])) {
            return redirect()->intended('profile');
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('pemudik')->check()) {
            Auth::guard('pemudik')->logout();
        }

        return redirect('/');

    }
}
