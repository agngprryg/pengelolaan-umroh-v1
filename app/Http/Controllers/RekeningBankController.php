<?php

namespace App\Http\Controllers;

use App\Models\RekeningBank;
use Illuminate\Http\Request;

class RekeningBankController extends Controller
{

    public function index()
    {
        $data = RekeningBank::all();
        return view('pages.setting-haji.rekening-bank.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-haji.rekening-bank.create');
    }

    public function store(Request $request)
    {
        RekeningBank::create($request->all());
        return redirect()->route('rekening-bank.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = RekeningBank::findOrFail($id);
        return view('pages.setting-haji.rekening-bank.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RekeningBank::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('rekening-bank.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = RekeningBank::findOrFail($id);
        $data->delete();
        return redirect()->route('rekening-bank.index')->with('success', 'data berhasil di hapus');
    }
}
