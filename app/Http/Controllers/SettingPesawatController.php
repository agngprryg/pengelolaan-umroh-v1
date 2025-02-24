<?php

namespace App\Http\Controllers;

use App\Models\SettingPesawat;
use Illuminate\Http\Request;

class SettingPesawatController extends Controller
{
    public function index()
    {
        $data = SettingPesawat::all();
        return view('pages.setting-umroh.setting-pesawat.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.setting-pesawat.create');
    }

    public function store(Request $request)
    {
        SettingPesawat::create($request->all());
        return redirect()->route('setting-pesawat.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = SettingPesawat::findOrFail($id);
        return view('pages.setting-umroh.setting-pesawat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SettingPesawat::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('setting-pesawat.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = SettingPesawat::findOrFail($id);
        $data->delete();
        return redirect()->route('setting-pesawat.index')->with('success', 'data berhasil di delete');
    }
}
