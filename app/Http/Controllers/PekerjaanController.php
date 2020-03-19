<?php

namespace App\Http\Controllers;

use App\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::paginate(10);
        return view('pekerjaan.index', ['pekerjaans' => $pekerjaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerjaan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pekerjaan' => 'required|unique:pekerjaan',
        ]);
  
        $data = new Pekerjaan;
        $data->nama_pekerjaan = $request->nama_pekerjaan;
        $data->save();
  
        return redirect()->route('pekerjaan.index')->with('success','Berhasil menambahkan pekerjaan : ' . $request->nama_pekerjaan );
    }

    /**
     * Display the specified resource.
     *
     * @param  Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pekerjaan::findOrFail($id);

        return view('pekerjaan.edit',['pekerjaan' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pekerjaan' => [
                'required',
                Rule::unique('pekerjaan')->ignore($id,'id_pekerjaan')
            ],
        ]);
  
        $data = Pekerjaan::find($id);
        $data->nama_pekerjaan = $request->nama_pekerjaan;
        $data->save();
  
        return redirect()->route('pekerjaan.index')->with('success','Berhasil mengubah pekerjaan : ' . $request->nama_pekerjaan );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index')->with('success','Berhasil Menghapus pekerjaan');
    }
}
