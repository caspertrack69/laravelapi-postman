<?php

namespace App\Http\Controllers\Admin;
use App\mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Mahasiswa';
        $data = mahasiswa::all();
        return view('admin.mahasiswa.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_mahasiswa = mahasiswa::all();
        $pagename = 'Form Input Mahasiswa';
        return view('admin.mahasiswa.create', compact('pagename', 'data_mahasiswa'));
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
            'txtnama_mahasiswa' => 'Required',
            'txtnim_mahasiswa' => 'Required',
            'txtprogram_studi' => 'required',
        ]);

        $data_mahasiswa = new mahasiswa([

            'nama' => $request->get('txtnama_mahasiswa'),
            'nim' => $request->get('txtnim_mahasiswa'),
            'prodi' => $request->get('txtprogram_studi'),
        ]);

        //dd($data_tugas);
        $data_mahasiswa->save();
        return Redirect('admin/mahasiswa')->with('sukses', 'Mahasiswa berhasil disimpan');
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
        $data_mahasiswa = mahasiswa::all();
        $pagename = 'Update Mahasiswa';
        $data = mahasiswa::find($id);
        return view('admin.mahasiswa.edit', compact('data', 'pagename', 'data_mahasiswa'));
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
            'txtnama_mahasiswa' => 'Required',
            'txtnim_mahasiswa' => 'Required',
            'txtprogram_studi' => 'required',
        ]);

        $mahasiswa=mahasiswa::find($id);
            $mahasiswa->nama = $request -> get('txtnama_mahasiswa');
            $mahasiswa->nim = $request -> get('txtnim_mahasiswa');
            $mahasiswa->prodi = $request -> get('txtprogram_studi');
        

        //dd($data_tugas);
        $mahasiswa->save();
        return Redirect('admin/mahasiswa')->with('sukses', 'mahasiswa berhasil disimpan');
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
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();
        return Redirect('admin/mahasiswa')->with('sukses', 'mahasiswa berhasil dihapus');
    }
}