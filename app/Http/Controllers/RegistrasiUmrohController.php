<?php

namespace App\Http\Controllers;

use App\Models\DataAgen;
use App\Models\JadwalKeberangkatan;
use App\Models\JenisOpsi;
use App\Models\KelengkapanRegistrasiUmroh;
use App\Models\MerchandiseUmroh;
use App\Models\PaketUmroh;
use App\Models\RegistrasiUmroh;
use Illuminate\Http\Request;

class RegistrasiUmrohController extends Controller
{
    public function index()
    {
        $data = RegistrasiUmroh::all();
        return view('pages.umroh.registrasi-umroh.index', compact('data'));
    }

    public function create(Request $request)
    {
        $no_id = now()->format('YmdHis');
        $paket = PaketUmroh::all();
        $jadwal = JadwalKeberangkatan::all();
        $agen = DataAgen::all();
        $status_pernikahan = JenisOpsi::where('nama', 'Status Pernikahan')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();

        $status_mahram = JenisOpsi::where('nama', 'Status Mahram')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        $kelengkapan_registrasi = KelengkapanRegistrasiUmroh::orderBy('urutan_tampil', 'asc')->get();
        $merchandise = MerchandiseUmroh::orderBy('urutan_tampil', 'asc')->get();
        return view('pages.umroh.registrasi-umroh.create', compact('no_id', 'paket', 'jadwal', 'agen', 'status_pernikahan', 'status_mahram', 'kelengkapan_registrasi', 'merchandise'));
    }

    public function get_paket_by_id($id)
    {

        $data = PaketUmroh::with('jadwal_keberangkatan')->where('id', $id)->first();
        $tipeKamarList = [];
        if (is_array($data->tipe_kamar) && is_array($data->harga) && count($data->tipe_kamar) === count($data->harga)) {
            foreach ($data->tipe_kamar as $index => $tipe_kamar) {
                $tipeKamarList[] = [
                    'nama' => $tipe_kamar,
                    'harga' => $data->harga[$index]
                ];
            }
        } else {
            $data = [
                'status' => '500',
                'message' => 'data eror jumlah kolom tidak sama'
            ];
            return $data;
        }

        return response()->json([
            'data' => $data,
            'tipe_kamar' => $tipeKamarList
        ]);

        // return response()->json($data);
    }

    public function store(Request $request)
    {
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('logos', 'public');
        }
        $data = $request->except(['foto']);
        $data['foto'] = $fotoPath;

        $registrasi = RegistrasiUmroh::create($data);
        //kurangi sisa kursi
        $registrasi->update(['sisa_kursi' => $registrasi->sisa_kursi - 1]);
        return redirect()->route('registrasi-umroh.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
