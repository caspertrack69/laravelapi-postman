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
        //
        $pagename='Data Pegawai';
        $data= Pegawai::all();
        return view('admin.pegawai.index', compact('data', 'pagename')); 
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Tugas';
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
        //
        $request->validate([
            'txtnama_tugas' => 'required',
            'txtketerangan_tugas' => 'required',
            'radiostatus_tugas' => 'required',
        ]);

        $data_tugas = new Pegawai([
            'nama_tugas' => $request->get('txtnama_tugas'),
            'ket_tugas' => $request->get('txtketerangan_tugas'),
            'status_tugas' => $request->get('radiostatus_tugas'),
        ]);

        $data_tugas->save();
        return redirect('admin/pegawai')->with('Sukses', 'Tugas Berhasil Disimpan');
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
        $pagename='Update Tugas';
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
        //
        $request->validate([
            'txtnama_tugas' => 'required',
            'txtketerangan_tugas' => 'required',
            'radiostatus_tugas' => 'required',
        ]);

        $tugas = Pegawai::find($id);
            $tugas->nama_tugas = $request->get('txtnama_tugas');
            $tugas->ket_tugas = $request->get('txtketerangan_tugas');
            $tugas->status_tugas = $request->get('radiostatus_tugas');

        $tugas->save();
        return redirect('admin/pegawai')->with('Sukses', 'Tugas Berhasil DiUpdate');
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
        $tugas = Pegawai::find($id);
        
        $tugas->delete();
        return redirect('admin/pegawai')->with('Sukses', 'Tugas Berhasil DiHapus');
    }
}
