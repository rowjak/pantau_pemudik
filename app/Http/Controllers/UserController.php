<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Kecamatan;
use App\Desa;
use DataTables;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::where('level','desa')->with('desa','desa.kecamatan')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('desa',function($data){
                    return \ucwords(\strtolower($data->desa->nama_desa));
                })
                ->addColumn('kecamatan',function($data){
                    return \ucwords(\strtolower($data->desa->kecamatan->nama_kecamatan));
                })
                ->addColumn('action',function($data){
                    $button = '<form method="post" action="'.route('user.destroy',[$data->kd_admin]).'" onsubmit="return confirm(\'Apakah anda yakin akan menghapus data ini ?\')">'.csrf_field().method_field('delete').'<a href="'.route('user.edit',[$data->kd_admin]).'" class="btn btn-warning rounded text-white"><i class="material-icons">edit</i></a> <button type="submit" class="btn btn-danger rounded text-white"><i class="material-icons">delete</i></button></form>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::where('kd_kabupaten','3325')->orderBy('nama_kecamatan')->get();
        return view('user.create',compact('kecamatan'));
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

        $validasi = Validator::make($data,[
            'username' => 'required|max:255|min:1',
            'kd_desa' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails())
        {
            return redirect()->route('user.create')->withErrors($validasi)->withInput();
        }

        $data['password'] = \Hash::make($data['password']);
        unset($data['kd_kecamatan']);
        $data['level'] = 'desa';

        Admin::create($data);
        return redirect()->route('user.index')->with('status','Data Berhasil Disimpan');
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
        $user = Admin::with('desa')->findOrFail($id);
        $kecamatan = Kecamatan::where('kd_kabupaten','3325')->orderBy('nama_kecamatan')->get();
        $desa = Desa::where('kd_kecamatan',$user->desa->kd_kecamatan)->orderBy('nama_desa')->get();
        return view('user.edit',compact('user','kecamatan','desa'));
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
        $user = Admin::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'username' => 'required|max:255|min:1',
            'kd_desa' => 'required',
            'password' => 'sometimes'
        ]);


        if ($validasi->fails())
        {
            return redirect()->route('user.edit',[$id])->withErrors($validasi)->withInput();
        }


        if ($request->password != '') {
            $data['password'] = \Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        unset($data['kd_kecamatan']);
        $data['level'] = 'desa';

        $user->update($data);

        return redirect()->route('user.index')->with('status','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete($user);

        return redirect()->route('user.index')->with('status','Data User Berhasil Dihapus!');
    }
}
