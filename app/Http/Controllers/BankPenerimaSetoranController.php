<?php

namespace App\Http\Controllers;

use App\Models\BankPenerimaSetoran;
use Illuminate\Http\Request;

class BankPenerimaSetoranController extends Controller
{
    public function index()
    {
        $data = BankPenerimaSetoran::all();
        return view('pages.setting-haji.bank-penerima-setoran.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-haji.bank-penerima-setoran.create');
    }

    public function store(Request $request)
    {
        BankPenerimaSetoran::create($request->all());
        return redirect()->route('bank-penerima-setoran.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = BankPenerimaSetoran::findOrFail($id);
        return view('pages.setting-haji.bank-penerima-setoran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = BankPenerimaSetoran::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('bank-penerima-setoran.index')->with('success', 'data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = BankPenerimaSetoran::findOrFail($id);
        $data->delete();
        return redirect()->route('bank-penerima-setoran.index')->with('success', 'data berhasil ditambahkan');
    }
}
