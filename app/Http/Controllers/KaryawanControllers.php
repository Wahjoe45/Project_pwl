<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::latest()->paginate(5);
        return view ('karyawan.index',compact('karyawan'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('karyawan.create');
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
            'NIP' => 'required',
            'NamaKaryawan' => 'required',
            'Asal' => 'required',
            'Status' => 'required',
        ]);
        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show',compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'NIP' => 'required',
            'NamaKaryawan' => 'required',
            'Asal' => 'required',
            'Status' => 'required',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('succes','Data Berhasil di Hapus');
    }
}
