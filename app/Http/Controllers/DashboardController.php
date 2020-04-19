<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Pemudik;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Desa;
use DataTables;
use Auth;
use Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->is('/')) {
            if (Auth::guard('pemudik')->check()) {
                return redirect()->intended('profile');
            }
        }
        if($request->ajax()){
            $data = Provinsi::orderBy('nama_provinsi','asc')->withCount('pemudik')->get();
            return DataTables::of($data)
                ->addColumn('action',function($data){
                    $button = '<a href="'.route('dashboard.kabupaten',[$data->kd_provinsi]).'" class="btn btn-sm btn-success rounded text-white">Detail</a>';
                    return $button;
                })
                ->make(true);
        }
        return view('dashboard.index');
    }

    public function kabupaten($kd_provinsi, Request $request){
        $nama_provinsi = Provinsi::where('kd_provinsi',$kd_provinsi)->first();
        if($request->ajax()){
            $data = Kabupaten::where('kd_provinsi',$kd_provinsi)->with('provinsi')->withCount('pemudik')->get();
            return DataTables::of($data)
                ->addColumn('action',function($data){
                    $button = '<a href="'.route('dashboard.kecamatan',[$data->kd_kabupaten]).'" class="btn btn-sm btn-success rounded text-white">Detail</a>';
                    return $button;
                })
                ->addColumn('nama_provinsi',function($data){
                    return $data->provinsi->nama_provinsi;
                })
                ->make(true);
        }
        return view('dashboard.index',compact('nama_provinsi'));
    }

    public function kecamatan($kd_kabupaten, Request $request){
        $nama_kabupaten = Kabupaten::where('kd_kabupaten',$kd_kabupaten)->first();
        if($request->ajax()){
            $data = Kecamatan::where('kd_kabupaten',$kd_kabupaten)->with('kabupaten','kabupaten.provinsi')->withCount('asalpemudik')->get();
            return DataTables::of($data)
                ->addColumn('action',function($data){
                    $button = '<a href="'.route('dashboard.desa',[$data->kd_kecamatan]).'" class="btn btn-sm btn-success rounded text-white">Detail</a>';
                    return $button;
                })
                ->addColumn('nama_kabupaten',function($data){
                    return $data->kabupaten->nama_kabupaten;
                })
                ->addColumn('nama_provinsi',function($data){
                    return $data->kabupaten->provinsi->nama_provinsi;
                })
                ->make(true);
        }
        return view('dashboard.index',compact('nama_kabupaten'));
    }

    public function desa($kd_kecamatan,Request $request){
        $nama_kecamatan = Kecamatan::where('kd_kecamatan',$kd_kecamatan)->first();
        if($request->ajax()){
            $data = Desa::where('kd_kecamatan',$kd_kecamatan)->with('kecamatan','kecamatan.kabupaten','kecamatan.kabupaten.provinsi')->withCount('asalpemudik')->get();
            return DataTables::of($data)
                ->addColumn('nama_kecamatan',function($data){
                    return $data->kecamatan->nama_kecamatan;
                })
                ->addColumn('nama_kabupaten',function($data){
                    return $data->kecamatan->kabupaten->nama_kabupaten;
                })
                ->addColumn('nama_provinsi',function($data){
                    return $data->kecamatan->kabupaten->provinsi->nama_provinsi;
                })
                ->make(true);
        }
        return view('dashboard.index',compact('nama_kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
