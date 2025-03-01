<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\JadwalKeberangkatan;
use App\Models\JenisOpsi;
use App\Models\PaketUmroh;
use App\Models\SettingHotel;
use App\Models\SettingPesawat;
use Illuminate\Http\Request;

class PaketUmrohController extends Controller
{
    public function index()
    {
        // $data = PaketUmroh::first();
        // $fasilitas = $data->fasilitas;
        // $data = PaketUmroh::all();
        // $data = PaketUmroh::get()->flatMap(function ($paket) {
        //     return json_decode($paket->tipe_kamar, true);
        // });
        // $data = PaketUmroh::pluck('tipe_kamar')
        // $data = PaketUmroh::where('id', '15')->first();
        // $tipe_kamar = json_decode($data->tipe_kamar, true);
        // $data->hotel = json_decode($data->hotel, true);
        // return response($data);
        $data = PaketUmroh::all();
        return view('pages.setting-umroh.paket-umroh.index', compact('data'));
    }

    public function create()
    {
        $tipe_kamar = JenisOpsi::where('nama', 'Tipe Kamar')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        $jadwal_keberangkatan = JadwalKeberangkatan::all();
        $hotels = SettingHotel::all();
        $maskapai = SettingPesawat::pluck('nama_maskapai');
        $rute = SettingPesawat::pluck('rute');
        // return response($rute);
        return view('pages.setting-umroh.paket-umroh.create', compact('tipe_kamar', 'jadwal_keberangkatan', 'hotels', 'maskapai', 'rute'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string',
            'durasi' => 'required|string',
            'tipe_kamar' => 'required|array',
            'harga' => 'required|array',
            'hotel' => 'required|array',
            'lama_hari' => 'required|array',
            'pesawat' => 'required|array',
            'jadwal_keberangkatan_id' => 'required|exists:jadwal_keberangkatan,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Menggabungkan tipe_kamar dan harga menjadi satu array
        $tipeKamarData = [];
        foreach ($request->tipe_kamar as $key => $tipe) {
            $tipeKamarData[] = [
                'tipe_kamar' => $tipe,
                'harga' => $request->harga[$key]
            ];
        }

        // Menggabungkan hotel, lokasi, dan lama hari
        $hotelData = [];
        for ($i = 0; $i < count($request->hotel) / 2; $i++) {
            $hotelData[] = [
                'lokasi' => $request->hotel[$i * 2],
                'nama_hotel' => $request->hotel[$i * 2 + 1],
                'lama_hari' => $request->lama_hari[$i],
            ];
        }

        // Menggabungkan pesawat dan rute
        $pesawatData = [];
        for ($i = 0; $i < count($request->pesawat) / 2; $i++) {
            $pesawatData[] = [
                'maskapai' => $request->pesawat[$i * 2],
                'rute' => $request->pesawat[$i * 2 + 1]
            ];
        }

        // Simpan data ke database
        $paket = PaketUmroh::create([
            'nama_paket' => $request->nama_paket,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
            'tipe_kamar' => json_encode($tipeKamarData),
            'hotel' => json_encode($hotelData),
            'pesawat' => json_encode($pesawatData),
            'jadwal_keberangkatan_id' => $request->jadwal_keberangkatan_id,
            'status' => $request->status,
        ]);
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $opsis = JenisOpsi::where('nama', 'Tipe Kamar')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        $data = PaketUmroh::findOrFail($id);
        $jadwal_keberangkatan = JadwalKeberangkatan::all();
        return view('pages.setting-umroh.paket-umroh.edit', compact('data', 'opsis', 'jadwal_keberangkatan'));
    }

    public function update(Request $request, $id)
    {
        $data = PaketUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = PaketUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di hapus');
    }
}
