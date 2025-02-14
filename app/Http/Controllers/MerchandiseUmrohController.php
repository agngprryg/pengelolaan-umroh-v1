<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseUmroh;
use Illuminate\Http\Request;

class MerchandiseUmrohController extends Controller
{

    public function index()
    {
        $data = MerchandiseUmroh::all();
        return view('pages.setting-umroh.merchandise-umroh.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.merchandise-umroh.create');
    }

    public function store(Request $request)
    {
        MerchandiseUmroh::create($request->all());
        return redirect()->route('merchandise-umroh.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = MerchandiseUmroh::findOrFail($id);
        return view('pages.setting-umroh.merchandise-umroh.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = MerchandiseUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('merchandise-umroh.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = MerchandiseUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('merchandise-umroh.index')->with('success', 'data berhasil di update');
    }
}
