<?php

namespace App\Http\Controllers;

use App\Models\DataOpsi;
use App\Models\JenisOpsi;
use Illuminate\Http\Request;

class DataOpsiController extends Controller
{
    public function index()
    {
        $data_opsi = DataOpsi::with('jenis_opsi')->get();
        return view('pages.pusat-data.data-opsi.index', compact('data_opsi'));
    }

    public function create()
    {
        $opsis = JenisOpsi::all();
        return view('pages.pusat-data.data-opsi.create', compact('opsis'));
    }

    public function store(Request $request)
    {
        DataOpsi::create($request->all());
        return redirect()->route('data-opsi.index')->with('success', 'data berhasil ditambahkan');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataOpsi::findOrFail($id);
        $data->delete($data);
        return redirect()->route('data-opsi.index')->with('success', 'data berhasil di hapus');
    }
}
