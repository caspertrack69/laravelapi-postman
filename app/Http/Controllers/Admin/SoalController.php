<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\soal008;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Soal';
        $data = soal008::all();
        return view('admin.soal008.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_soal008 = soal008::all();
        $pagename = 'Form Input Soal';
        return view('admin.soal008.create', compact('pagename', 'data_soal008'));
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
            'txtnosoal008' => 'Required',
            'txtpertanyaan008' => 'Required',
            'txtjawaban008' => 'required',
        ]);

        $data_soal008 = new soal008([

            'nosoal008' => $request->get('txtnosoal008'),
            'pertanyaan008' => $request->get('txtpertanyaan008'),
            'jawaban008' => $request->get('txtjawaban008'),
        ]);

        //dd($data_tugas);
        $data_soal008->save();
        return Redirect('admin/soal008')->with('sukses', 'Soal berhasil disimpan');
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
        $data_soal008 = soal008::all();
        $pagename = 'Edit Soal';
        $data = soal008::find($id);
        return view('admin.soal008.edit', compact('data', 'pagename', 'data_soal008'));
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
            'txtnosoal008' => 'Required',
            'txtpertanyaan008' => 'Required',
            'txtjawaban008' => 'required',
        ]);

        $soal008=soal008::find($id);
            $soal008->nosoal008 = $request -> get('txtnosoal008');
            $soal008->pertanyaan008 = $request -> get('txtpertanyaan008');
            $soal008->jawaban008 = $request -> get('txtjawaban008');
        

        //dd($data_tugas);
        $soal008->save();
        return Redirect('admin/soal008')->with('sukses', 'Soal berhasil disimpan');
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
        $soal008 = soal008::find($id);
        $soal008->delete();
        return Redirect('admin/soal008')->with('sukses', 'Soal berhasil dihapus');
    }
}