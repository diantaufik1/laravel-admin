<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Pegawai';
        $data = Pegawai::all();
        return view('admin.pegawai.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename = 'Form Input Pegawai';
        return view('admin.pegawai.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $data_pegawai = new Pegawai([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
        ]);

        $data_pegawai->save();
        return redirect('admin/pegawai')->with('Sukses', 'pegawai Berhasil Disimpan');
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
        $pagename='Update Pegawai';
        $data=Pegawai::find($id);
        return view('admin.pegawai.edit', compact('data', 'pagename'));
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
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $pegawai = Pegawai::find($id);
            $pegawai->nama = $request->get('nama');
            $pegawai->alamat = $request->get('alamat');

        $pegawai->save();
        return redirect('admin/pegawai')->with('Sukses', 'Pwgawai Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        
        $pegawai->delete();
        return redirect('admin/pegawai')->with('Sukses', 'Pegawai Berhasil DiHapus');
    }
}
