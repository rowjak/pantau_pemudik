<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Transit;

class TransitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transit = Transit::orderBy('tempat_transit','asc')->get();
        return view('transit.index',compact('transit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transit.create');
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
            'tempat_transit' => 'required|max:255|min:1'
        ]);

        if ($validasi->fails())
        {
            return redirect()->route('transit.create')->withErrors($validasi)->withInput();
        }

        Transit::create($data);
        return redirect()->route('transit.index')->with('status','Data Berhasil Disimpan');
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
        $transit = Transit::findOrFail($id);
        return view('transit.edit',compact('transit'));
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
        $transit = Transit::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'tempat_transit' => 'required|max:255|min:1'
        ]);

        if ($validasi->fails())
        {
            return redirect()->route('transit.edit',[$id])->withErrors($validasi)->withInput();
        }

        $transit->update($data);

        return redirect()->route('transit.index')->with('status','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transit = Transit::findOrFail($id);
        $transit->delete($transit);

        return redirect()->route('transit.index')->with('status','Data Tempat Transit Berhasil Dihapus!');
    }
}
