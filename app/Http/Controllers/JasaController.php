<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index()
    {
        $data = Jasa::all();
        return view('pages.setting-umroh.jasa.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.jasa.create');
    }

    public function store(Request $request)
    {
        Jasa::create($request->all());
        return redirect()->route('jasa.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = Jasa::findOrFail($id);
        return view('pages.setting-umroh.jasa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Jasa::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jasa.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = Jasa::findOrFail($id);
        $data->delete();
        return redirect()->route('jasa.index')->with('success', 'data berhasil di hapus');
    }
}
