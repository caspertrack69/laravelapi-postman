<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Tugas';
        $data = Task::all();
        return view('admin.tugas.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kategori = kategori::all();
        $pagename = 'Form Input Tugas';
        return view('admin.tugas.create', compact('pagename', 'data_kategori'));
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
        $request ->validate([
            'nama_tugas'=>'required',
            'optionid_kategori'=>'required',
            'txtketerangan_tugas'=>'required',
            'radiostatus_tugas'=>'required',
        ]);
        $data_tugas = new Task([
            'nama_tugas'=> $request->get('nama_tugas'),
            'id_kategori'=> $request->get('optionid_kategori'),
            'ket_tugas'=> $request->get('txtketerangan_tugas'),
            'status_tugas'=> $request->get('radiostatus_tugas'),
        ]);
        // dd($data_tugas);
        $data_tugas->save();
        return redirect('admin/tugas')->with('sukses','tugas berhasil didimpan');
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
