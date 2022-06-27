<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JadwalControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jdwl = Jadwal::latest()->paginate(5);
        return view ('jdwl.index',compact('jdwl'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jdwl.create');
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
            'Status' => 'required',
            'JamKerja' => 'required',
        ]);
        Jadwal::create($request->all());

        return redirect()->route('jdwl.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jdwl)
    {
        return view('jdwl.show',compact('jdwl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jdwl)
    {
        return view('jdwl.edit', compact('jdwl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jdwl)
    {
        $request->validate([
            'Nama' => 'required',
            'Status' => 'required',
            'JamKerja' => 'required',
        ]);

        $jdwl->update($request->all());

        return redirect()->route('jdwl.index')->with('succes','Jadwal Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jdwl)
    {
        $jdwl->delete();

        return redirect()->route('jdwl.index')->with('succes','Jadwal Berhasil di Hapus');
    }
}