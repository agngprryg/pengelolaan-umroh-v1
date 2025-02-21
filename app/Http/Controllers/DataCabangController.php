<?php

namespace App\Http\Controllers;

use App\Models\DataCabang;
use Illuminate\Http\Request;

class DataCabangController extends Controller
{

    public function index()
    {

        $data = DataCabang::with('perlengkapan_umroh')->get();
        // return response($data);

        $data = DataCabang::all();
        return view('pages.pusat-data.data-cabang.index', compact('data'));
    }

    public function create()
    {
        return view('pages.pusat-data.data-cabang.create');
    }

    public function store(Request $request)
    {
        DataCabang::create($request->all());
        return redirect()->route('data-cabang.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = DataCabang::findOrFail($id);
        return view('pages.pusat-data.data-cabang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = DataCabang::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('data-cabang.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = DataCabang::findOrFail($id);
        $data->delete();
        return redirect()->route('data-cabang.index')->with('success', 'data berhasil ditambahkan');
    }
}
