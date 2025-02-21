<?php

namespace App\Http\Controllers;

use App\Models\DataCabang;
use App\Models\DataPerlengkapanUmroh;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class DataPerlengkapanUmrohController extends Controller
{
    public function index()
    {
        //
    }

    public function stok_pusat()
    {
        $data = DataPerlengkapanUmroh::all();
        return view('pages.inventory.stok-pusat.index', compact('data'));
    }

    public function stok_cabang(Request $request)
    {
        $data_cabang = DataCabang::all();
        $cabang = $request->input('cabang');
        $get_cabang_by_id = DataCabang::with('perlengkapan_umroh')->find($cabang);
        // $get_cabang_by_id = DataCabang::with('perlengkapan_umroh')->where('id', $cabang)->first();
        // return response($get_cabang_by_id);
        return view('pages.inventory.stok-cabang.index', compact('data_cabang', 'cabang', 'get_cabang_by_id'));
    }

    public function create_pusat()
    {
        return view('pages.inventory.stok-pusat.create');
    }

    public function create_cabang()
    {
        $data_cabang = DataCabang::all();
        $data_perlengkapan = DataPerlengkapanUmroh::all();
        return view('pages.inventory.stok-cabang.create', compact('data_cabang', 'data_perlengkapan'));
    }

    public function store_pusat(Request $request)
    {
        DataPerlengkapanUmroh::create($request->all());
        return redirect()->route('stok-pusat')->with('success', 'data berhasil di tambahkan');
    }

    public function store_cabang(Request $request)
    {
        // Validasi input
        $request->validate([
            'data_cabang_id' => 'required|exists:data_cabang,id',
            'data_perlengkapan_umroh_id' => 'required|exists:data_perlengkapan_umroh,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        // Cari cabang
        $cabang = DataCabang::findOrFail($request->data_cabang_id);

        // Cari perlengkapan di tabel data_perlengkapan_umroh
        $perlengkapan = DataPerlengkapanUmroh::findOrFail($request->data_perlengkapan_umroh_id);

        // Cek apakah stok mencukupi sebelum dikurangi
        if ($perlengkapan->stok < $request->jumlah) {
            return redirect()->route('stok-cabang')->with('error', 'Stok tidak mencukupi!');
        }

        // Cek apakah perlengkapan sudah ada di pivot
        $existingPerlengkapan = $cabang->perlengkapan_umroh()->wherePivot('data_perlengkapan_umroh_id', $request->data_perlengkapan_umroh_id)->first();

        if ($existingPerlengkapan) {
            // Jika sudah ada, tambahkan jumlahnya
            $currentJumlah = $existingPerlengkapan->pivot->jumlah;
            $newJumlah = $currentJumlah + $request->jumlah;

            // Update jumlah di pivot
            $cabang->perlengkapan_umroh()->updateExistingPivot($request->data_perlengkapan_umroh_id, ['jumlah' => $newJumlah]);
        } else {
            // Jika belum ada, tambahkan data baru
            $cabang->perlengkapan_umroh()->attach($request->data_perlengkapan_umroh_id, ['jumlah' => $request->jumlah]);
        }

        // Kurangi stok di tabel data_perlengkapan_umroh
        $perlengkapan->decrement('stok', $request->jumlah);

        return redirect()->route('stok-cabang')->with('success', 'Data berhasil diperbarui dan stok dikurangi');
    }



    public function show_pusat($id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        return view('pages.inventory.stok-pusat.edit', compact('data'));
    }

    public function show($id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        return view('pages.pusat-data.data-perlengkapan.edit', compact('data'));
    }

    public function update_pusat(Request $request, $id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('stok-pusat')->with('success', 'data berhasil di update');
    }

    public function update(Request $request, $id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('stok-cabang')->with('success', 'data berhasil di update');
    }

    public function destroy_pusat($id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('stok-pusat')->with('success', 'data berhasil di hapu');
    }

    public function destroy($id)
    {
        $data = DataPerlengkapanUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('stok-cabang')->with('success', 'data berhasil di hapu');
    }
}
