<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Coba;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Coba';
        $data=Coba::all();
        return view('admin.coba.index', compact('data', 'pagename')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_coba = Coba::all();
        $pagename = 'Form Input Coba';
        return view('admin.coba.create', compact('pagename', 'data_coba'));
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
            'nomer' => 'required',
        ]);

        $data_coba = new Coba([
            'nama' => $request->get('nama'),
            'nomer' => $request->get('nomer')
           
        ]);

        $data_coba->save();
        return redirect('admin/coba')->with('Sukses', 'Tugas Berhasil Disimpan');
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
        $data_coba=Coba::all();
        $pagename='Update Coba';
        $data=Coba::find($id);
        return view('admin.coba.edit', compact('data', 'pagename', 'data_coba'));
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
            'nomer' => 'required',
        ]);

        $coba = Coba::find($id);
            $coba->nama = $request->get('nama');
            $coba->nomer = $request->get('nomer');

        $coba->save();
        return redirect('admin/coba')->with('Sukses', 'Coba Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Coba::find($id);
        
        $tugas->delete();
        return redirect('admin/coba')->with('Sukses', 'Coba Berhasil DiHapus');
    }
}
