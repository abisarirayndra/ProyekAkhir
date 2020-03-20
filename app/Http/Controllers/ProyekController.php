<?php

namespace App\Http\Controllers;

use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = Proyek::paginate(10);
        return view('proyek.index', ['proyeks' => $proyek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyek.add');
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
            'id_proyek' => 'required|unique:proyek',
            'deskripsi_proyek' => 'required|unique:proyek',
        ]);
  
        $data = new Proyek;
        $data->id_proyek = $request->id_proyek;
        $data->deskripsi_proyek = $request->deskripsi_proyek;
        $data->status_proyek = '1';
        $data->save();
  
        return redirect()->route('proyek.index')->with('success','Berhasil menambahkan proyek : ' . $request->deskripsi_proyek );
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
        $data = Proyek::findOrFail($id);

        return view('proyek.edit',['proyek' => $data]);
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
        $this->validate($request, [
            'deskripsi_proyek' => [
                'required',
            ],
            'status_proyek' => 'required|max:1|',
            'id_proyek' => [
                'required',
                Rule::unique('proyek')->ignore($id,'id_proyek','deskripsi_proyek')
            ],
        ]);
  
        $data = Proyek::find($id);
        $data->deskripsi_proyek = $request->deskripsi_proyek;
        $data->status_proyek = $request->status_proyek;
        $data->save();
  
        return redirect()->route('proyek.index')->with('success','Berhasil mengubah proyek : ' . $request->nama_proyek );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success','Berhasil Menghapus proyek');
    }
}
