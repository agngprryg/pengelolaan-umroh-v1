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
        $kelengkapan_registrasi = KelengkapanRegistrasiUmroh::orderBy('urutan_tampil', 'asc')->get();
        $merchandise = MerchandiseUmroh::orderBy('urutan_tampil', 'asc')->get();
        return view('pages.umroh.registrasi-umroh.create', compact('no_id', 'paket', 'jadwal', 'agen', 'status_pernikahan', 'kelengkapan_registrasi', 'merchandise'));
    }

    public function get_paket_by_id($nama)
    {
        $data = JadwalKeberangkatan::whereHas('paket_umroh', function ($query) use ($nama) {
            $query->where('nama_paket', urldecode($nama));
        })->first();
        return response()->json([
            'jadwal' => $data,
            'paket_umroh' => $data->paket_umroh,
            'fasilitas' => $data->paket_umroh->fasilitas
        ]);
    }

    public function store(Request $request)
    {
        $sisa_kursi = JadwalKeberangkatan::findOrFail($request->jadwal_id);

        if ($sisa_kursi->jumlah_seat > 0) {
            $sisa_kursi->decrement('jumlah_seat', 1);
        } else {
            return response()->json(['error' => 'Seat sudah habis'], 400);
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('logos', 'public');
        }
        $data = $request->except(['foto']);
        $data['foto'] = $fotoPath;

        RegistrasiUmroh::create($data);
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
