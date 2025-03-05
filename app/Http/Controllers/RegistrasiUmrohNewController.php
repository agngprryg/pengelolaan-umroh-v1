<?php

namespace App\Http\Controllers;

use App\Models\PaketUmroh;
use App\Models\RegistrasiUmrohNew;
use Illuminate\Http\Request;

class RegistrasiUmrohNewController extends Controller
{
    public function index()
    {
        $data = RegistrasiUmrohNew::all();
        return view('pages.umroh.registrasi-umroh-new.index', compact('data'));
    }

    public function get_paket_by_id($id)
    {
        $data = PaketUmroh::with('jadwal_keberangkatan')->where('id', $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function create()
    {
        $no_registrasi = now()->format('His');
        $paket_umroh = PaketUmroh::all();
        return view('pages.umroh.registrasi-umroh-new.create', compact('no_registrasi', 'paket_umroh'));
    }

    public function store(Request $request)
    {
        RegistrasiUmrohNew::create($request->all());
        return redirect()->route('registrasi-umroh-new.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = RegistrasiUmrohNew::findOrFail($id);
        return view('pages.umroh.registrasi-umroh-new.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RegistrasiUmrohNew::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('registrasi-umroh-new.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = RegistrasiUmrohNew::findOrFail($id);
        $data->delete();
        return redirect()->route('registrasi-umroh-new.index')->with('success', 'data berhasil di hapus');
    }
}
