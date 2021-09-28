<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu030;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Menu';
        $data = Menu030::all();
        return view('admin.menu.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename = 'Form Input Menu';
        return view('admin.menu.create', compact('pagename'));
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
            'kodeM' => 'required',
            'namaM' => 'required',
            'hargaM' => 'required',
        ]);

        $data_pegawai = new Menu030([
            'kodeMenu' => $request->get('kodeM'),
            'namaMenu' => $request->get('namaM'),
            'hargaMenu' => $request->get('hargaM'),
        ]);

        $data_pegawai->save();
        return redirect('admin/menu')->with('Sukses', 'Berhasil Disimpan');
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
        $pagename='Update Menu';
        $data=Menu030::find($id);
        return view('admin.menu.edit', compact('data', 'pagename'));
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
            'kodeMe' => 'required',
            'namaMe' => 'required',
            'hargaMe' => 'required',
        ]);

        $tugas = Menu030::find($id);
            $tugas->kodeMenu = $request->get('kodeMe');
            $tugas->namaMenu = $request->get('namaMe');
            $tugas->hargaMenu = $request->get('hargaMe');

        $tugas->save();
        return redirect('admin/menu')->with('Sukses', 'Tugas Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Menu030::find($id);
        
        $pegawai->delete();
        return redirect('admin/menu')->with('Sukses', 'Berhasil DiHapus');
    }
}
