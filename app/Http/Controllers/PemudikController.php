<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Transportasi;
use App\Transit;
use App\Pemudik;
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
        $data = Pemudik::where('kd_desa',Auth::guard('admin')->user()->kd_desa)->with('desa','kecamatan','perjalanan','kecamatan.kabupaten','kecamatan.kabupaten.provinsi')->get();
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
        }
        abort('404');
    }

    public function storeScreening(Request $request, $kd_pemudik){
        echo json_encode($request->all());
        // echo json_encode($kd_pemudik);
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
    public function create()
    {
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
        Pemudik::create($data);
        return redirect('profile');
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
