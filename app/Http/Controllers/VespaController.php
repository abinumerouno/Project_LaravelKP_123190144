<?php

namespace App\Http\Controllers;

use App\Models\Vespa;
use Illuminate\Http\Request;

class VespaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vespa = Vespa::all();
            return view('vespa.index', [
        'vespa' => $vespa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vespa.create');
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
            'nama_vespa' => 'required|unique:vespas,nama_vespa',
            'tahun' => 'required',
            'kondisi' => 'required',
            'harga' => 'required',
        ]);

        $array = $request->only([
            'nama_vespa', 'tahun', 'kondisi', 'harga'
        ]);

        $vespa = Vespa::create($array);
        return redirect()->route('vespa.index')
            ->with('success_message', 'Berhasil menambah unit baru');
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
        $vespa = Vespa::find($id);
        if (!$vespa) return redirect()->route('vespa.index')
            ->with('error_message', 'Vespa dengan id'.$id.' tidak ditemukan');
        return view('vespa.edit', [
            'vespa' => $vespa
    ]);
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
        $vespa = Vespa::find($id);
        $vespa->nama_vespa = $request->nama_vespa;
        $vespa->tahun = $request->tahun;
        $vespa->kondisi = $request->kondisi;
        $vespa->harga = $request->harga;
        $vespa->save();
        return redirect()->route('vespa.index')
            ->with('success_message', 'Berhasil mengubah unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vespa = Vespa::find($id);
            if ($vespa) $vespa->delete();
            return redirect()->route('vespa.index')
        ->with('success_message', 'Berhasil menghapus koleksi');
    }
}
