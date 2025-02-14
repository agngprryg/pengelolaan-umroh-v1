<?php

namespace App\Http\Controllers;

use App\Models\DataAgen;
use Illuminate\Http\Request;

class DataAgenController extends Controller
{
    public function index()
    {
        $data = DataAgen::all();
        return view('pages.pusat-data.data-agen.index', compact('data'));
    }

    public function create()
    {
        return view('pages.pusat-data.data-agen.create');
    }

    public function store(Request $request)
    {
        DataAgen::create($request->all());
        return redirect()->route('data-agen.index')->with('succes', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = DataAgen::findOrFail($id);
        return view('pages.pusat-data.data-agen.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = DataAgen::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('data-agen.index')->with('succes', 'data berhasil di tambahkan');
    }

    public function destroy($id)
    {
        $data = DataAgen::findOrFail($id);
        $data->delete();
        return redirect()->route('data-agen.index')->with('succes', 'data berhasil di tambahkan');
    }
}
