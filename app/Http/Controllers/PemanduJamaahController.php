<?php

namespace App\Http\Controllers;

use App\Models\PemanduJamaah;
use Illuminate\Http\Request;

class PemanduJamaahController extends Controller
{
    public function index()
    {
        $data = PemanduJamaah::all();
        return view('pages.setting-umroh.pemandu-jamaah.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.pemandu-jamaah.create');
    }

    public function store(Request $request)
    {
        PemanduJamaah::create($request->all());
        return redirect()->route('pemandu-jamaah.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = PemanduJamaah::findOrFail($id);
        return view('pages.setting-umroh.pemandu-jamaah.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PemanduJamaah::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pemandu-jamaah.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = PemanduJamaah::findOrFail($id);
        $data->delete();
        return redirect()->route('pemandu-jamaah.index')->with('success', 'data berhasil di hapus');
    }
}
