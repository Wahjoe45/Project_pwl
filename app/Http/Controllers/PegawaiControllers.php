<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pgw = Pegawai::latest()->paginate(5);
        return view ('pgw.index',compact('pgw'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pgw.create');
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
            'NamaPegawai' => 'required',
            'Asal' => 'required',
            'Status' => 'required',
        ]);
        Pegawai::create($request->all());

        return redirect()->route('pgw.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pgw)
    {
        return view('pgw.show',compact('pgw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pgw)
    {
        return view('pgw.edit', compact('pgw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pgw)
    {
        $request->validate([
            'NIP' => 'required',
            'NamaPegawai' => 'required',
            'Asal' => 'required',
            'Status' => 'required',
        ]);

        $pgw->update($request->all());

        return redirect()->route('pgw.index')->with('succes','Pegawai Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pgw)
    {
        $pgw->delete();

        return redirect()->route('pgw.index')->with('succes','Pegawai Berhasil di Hapus');
    }
}
