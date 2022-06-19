<?php



namespace App\Http\Controllers;



use App\Models\Obat;

use Illuminate\Http\Request;



class ObatController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {

        $obats = Obat::latest()->paginate(5);



        return view('obats.index',compact('obats'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {

        return view('obats.create');

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

            'nama' => 'required',

            'keterangan' => 'required',

            'resep' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $input = $request->all();



        if ($resep = $request->file('resep')) {

            $destinationPath = 'resep/';

            $profileImage = date('YmdHis') . "." . $resep->getClientOriginalExtension();

            $resep->move($destinationPath, $profileImage);

            $input['resep'] = "$profileImage";

        }



        Obat::create($input);



        return redirect()->route('obats.index')

                        ->with('success','Obat created successfully.');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $obat
     * @return \Illuminate\Http\Response
     */

    public function show(Obat $obat)

    {

        return view('obats.show',compact('obat'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $obat
     * @return \Illuminate\Http\Response
     */

    public function edit(Obat $obat)

    {

        return view('obats.edit',compact('obat'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $obat
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Obat $obat)

    {

        $request->validate([

            'nama' => 'required',

            'keterangan' => 'required'

        ]);



        $input = $request->all();



        if ($resep = $request->file('resep')) {

            $destinationPath = 'resep/';

            $profileImage = date('YmdHis') . "." . $resep->getClientOriginalExtension();

            $resep->move($destinationPath, $profileImage);

            $input['resep'] = "$profileImage";

        }else{

            unset($input['resep']);

        }



        $obat->update($input);



        return redirect()->route('obats.index')

                        ->with('success','Obat updated successfully');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $obat
     * @return \Illuminate\Http\Response
     */

    public function destroy(Obat $obat)

    {

        $obat->delete();



        return redirect()->route('obats.index')

                        ->with('success','Obat deleted successfully');

    }

}
