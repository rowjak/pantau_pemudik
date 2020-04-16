<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Pemudik;
use App\Desa;
use App\Kecamatan;
use App\Kabupaten;
use App\Provinsi;
use DataTables;
use Auth;


class ApiPemudikController extends Controller
{

    public function pemudikKecamatan(){
        $data = Kecamatan::select('*')->where('kd_kabupaten','3325')->withCount(['pemudik'])
                ->get();
            return DataTables::of($data)
                    ->make(true);
    }

    public function pemudikDesa(){
        $data = Desa::select('*')->where('kd_kecamatan','like','3325%')->with('kecamatan')->withCount(['pemudik'])
                ->get();
            return DataTables::of($data)
                    ->addColumn('nama_kecamatan',function($data){
                        return $data->kecamatan->nama_kecamatan;
                    })
                    // ->addColumn('action',function($data){
                    //     if (Auth::user()->level == 'admin') {
                    //         $button = '<button type="button" class="btn btn-info">Edit</button>';
                    //         $button .= '<button type="button" class="btn btn-danger">Hapus</button>';
                    //     }else{
                    //         $button = '';
                    //     }

                    //     return $button;
                    // })
                    // ->rawColumns(['action'])
                    ->make(true);
    }

    public function getDesa($kd_kecamatan){
        $resp = Desa::where('kd_kecamatan',$kd_kecamatan)->orderBy('nama_desa','asc')->get();
        return response()->json(
            $resp,200
        );
    }

    public function getKecamatan($kd_kabupaten){
        $resp = Kecamatan::where('kd_kabupaten',$kd_kabupaten)->orderBy('nama_kecamatan','asc')->get();
        return response()->json(
            $resp,200
        );
    }

    public function getKabupaten($kd_provinsi){
        $resp = Kabupaten::where('kd_provinsi',$kd_provinsi)->orderBy('nama_kabupaten','asc')->get();
        return response()->json(
            $resp,200
        );
    }
}
