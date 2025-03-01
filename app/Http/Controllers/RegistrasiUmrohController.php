<?php

namespace App\Http\Controllers;

use App\Models\DataAgen;
use App\Models\DataPerlengkapanUmroh;
use App\Models\JadwalKeberangkatan;
use App\Models\JenisOpsi;
use App\Models\KelengkapanRegistrasiUmroh;
use App\Models\PaketUmroh;
use App\Models\RegistrasiUmroh;
use Illuminate\Http\Request;

class RegistrasiUmrohController extends Controller
{
    public function index()
    {
        $data = RegistrasiUmroh::all();
        // return response($data);
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
        $data_perlengkapan = DataPerlengkapanUmroh::all();
        return view('pages.umroh.registrasi-umroh.create', compact('no_id', 'paket', 'jadwal', 'agen', 'status_pernikahan', 'status_mahram', 'kelengkapan_registrasi', 'data_perlengkapan'));
    }

    public function get_paket_by_id($id)
    {

        $data = PaketUmroh::with('jadwal_keberangkatan')->where('id', $id)->first();
        $tipe = $data->tipe_kamar = json_decode($data->tipe_kamar);
        $data->hotel = json_decode($data->hotel);
        $data->pesawat = json_decode($data->pesawat);

        return response()->json([
            'data' => $data,
            'tipe_kamar' => $tipe
        ]);
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
