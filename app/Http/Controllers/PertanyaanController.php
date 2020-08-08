<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Pertanyaan';
        $pertanyaan = DB::table('pertanyaan')->get();
        return view('pertanyaan.index', compact('title', 'pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pertanyaan';
        return view('pertanyaan.create', compact('title'));
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
            'judul' => 'required',
            'isi' => 'required'
        ]);

        DB::table('pertanyaan')->insert([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect(url('/pertanyaan'))->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Pertanyaan';
        $p = DB::table('pertanyaan')->where('id', $id)->first();
        return view('pertanyaan.show', compact('title', 'p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Perbaharui Pertanyaan';
        $p = DB::table('pertanyaan')->where('id', $id)->first();
        return view('pertanyaan.edit', compact('title', 'p'));
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
            'judul' => 'required',
            'isi' => 'required'
        ]);

        DB::table('pertanyaan')->where('id', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal_diperbaharui' => new DateTime()
        ]);

        return redirect(url('/pertanyaan'))->with('status', 'Data Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pertanyaan')->where('id', $id)->delete();

        return redirect(url('/pertanyaan'))->with('status', 'Data berhasil dihapus');
    }
}