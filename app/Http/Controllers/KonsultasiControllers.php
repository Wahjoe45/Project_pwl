<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KonsultasiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knsl = Konsultasi::latest()->paginate(5);
        return view ('knsl.index',compact('knsl'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('knsl.create');
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
            'Nama' => 'required',
            'Asal' => 'required',
            'TanggalKonsultasi' => 'required',
        ]);
        Konsultasi::create($request->all());

        return redirect()->route('knsl.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Konsultasi $knsl)
    {
        return view('knsl.show',compact('knsl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsultasi $knsl)
    {
        return view('knsl.edit', compact('knsl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konsultasi $knsl)
    {
        $request->validate([
            'Nama' => 'required',
            'Asal' => 'required',
            'Tanggal Konsultasi' => 'required',
        ]);

        $knsl->update($request->all());

        return redirect()->route('knsl.index')->with('succes','Riwayat Konsultasi Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konsultasi $knsl)
    {
        $knsl->delete();

        return redirect()->route('knsl.index')->with('succes','Riwayat Konsultasi Berhasil di Hapus');
    }
}