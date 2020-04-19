<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportasi;
use App\Transit;
use App\Pemudik;
use App\Desa;
use App\Kecamatan;
use App\Kabupaten;
use App\Provinsi;
use App\Perjalanan;
use Auth;
use DataTables;

class PemudikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemudik.index');
    }

    public function getPemudik(){
        if (Auth::guard('admin')->user()->level == 'admin') {
            $data = Pemudik::with('desa','kecamatan','perjalanan','kecamatan.kabupaten','kecamatan.kabupaten.provinsi')->get();
        }else{
            $data = Pemudik::where('kd_desa',Auth::guard('admin')->user()->kd_desa)->with('desa','kecamatan','perjalanan','kecamatan.kabupaten','kecamatan.kabupaten.provinsi')->get();
        }
        return DataTables::of($data)
                ->addColumn('alamat_asal',function($data){
                    if ($data->perjalanan != "") {
                        return \ucwords(\strtolower($data->perjalanan->des_asal->nama_desa.', Kecamatan '.$data->perjalanan->kec_asal->nama_kecamatan.', Kabupaten '.$data->perjalanan->kab_asal->nama_kabupaten.', Provinsi '.$data->perjalanan->prov_asal->nama_provinsi));
                    }else{
                        return '-';
                    }
                })
                ->addColumn('alamat_tujuan',function($data){
                    return \ucwords(\strtolower($data->desa->nama_desa.', Kecamatan '.$data->kecamatan->nama_kecamatan));
                })
                ->addColumn('action',function($data){
                    $button = '<button type="button" class="btn btn-sm btn-info"><i class="material-icons">edit</i></button>';
                    $button .= '<button type="button" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function screening($kd_pemudik){
        $pemudik = Pemudik::findOrFail($kd_pemudik);
        if (Auth::guard('pemudik')->check()) {
            if (Auth::guard('pemudik')->user()->kd_perjalanan == $pemudik->kd_perjalanan) {
                # code...
                return view('pemudik.screening',compact('pemudik'));
            }else{
                abort('404');
            }
        }else if(Auth::guard('admin')->check()){
            return view('pemudik.screening',compact('pemudik'));
        }
        abort('404');
    }

    public function storeScreening(Request $request, $kd_pemudik){
        echo json_encode($request->all());
        // echo json_encode($kd_pemudik);
    }

    public function storePerjalanan(Request $request){
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
            'password' => \Hash::make('123'),
            'prov_asal' => $data['prov_asal'],
            'kab_asal' => $data['kab_asal'],
            'kec_asal' => $data['kec_asal'],
            'des_asal' => $data['des_asal']
        );

        $kd_pemudik = Pemudik::create($pemudik)->kd_pemudik;

        return redirect()->route('screening',[$kd_pemudik]);
    }

    public function laporkan(){
        $kecamatan = Kecamatan::where('kd_kabupaten','like','3325%')->orderBy('nama_kecamatan','asc')->get();
        $transportasi = Transportasi::orderBy('nama_kendaraan','asc')->get();
        $transit = Transit::orderBy('tempat_transit','asc')->get();
        return view('pemudik.laporkan',compact('kecamatan','transportasi','transit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $term = trim($request->q);
            if (empty($term)) {
                return \Response::json([]);
            }
            $data = Pemudik::with('desa','kecamatan','perjalanan','kecamatan.kabupaten','kecamatan.kabupaten.provinsi')->whereNotNull('no_hp')->where('nama','like','%'.$term.'%')->get();

            $formatted_select = [];

            foreach ($data as $row) {
                $formatted_select[] = ['id' => $row->kd_perjalanan, 'text' => \ucwords(\strtolower($row->nama.' - '.$row->desa->nama_desa.' - '.$row->kecamatan->nama_kecamatan.' - '.$row->kecamatan->kabupaten->nama_kabupaten))];
            }

            return \Response::json($formatted_select);

        }
        $kecamatan = Kecamatan::where('kd_kabupaten','like','3325%')->orderBy('nama_kecamatan','asc')->get();
        $transportasi = Transportasi::orderBy('nama_kendaraan','asc')->get();
        $transit = Transit::orderBy('tempat_transit','asc')->get();
        return view('pemudik.create',compact('kecamatan','transportasi','transit'));
    }

    public function daftar(){
        $provinsi = Provinsi::orderBy('nama_provinsi','asc')->get();
        $transportasi = Transportasi::orderBy('nama_kendaraan','asc')->get();
        return view('pemudik.daftar',compact('provinsi','transportasi'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $perjalanan = Perjalanan::findOrFail($data['kd_perjalanan']);
        $data['prov_asal'] = $perjalanan['provinsi_asal'];
        $data['kab_asal'] = $perjalanan['kabupaten_asal'];
        $data['kec_asal'] = $perjalanan['kecamatan_asal'];
        $data['des_asal'] = $perjalanan['desa_asal'];
        $kd_pemudik = Pemudik::create($data)->kd_pemudik;
        return redirect()->route('screening',[$kd_pemudik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
