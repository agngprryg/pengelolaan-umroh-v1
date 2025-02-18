<?php

namespace App\Http\Controllers;

use App\Models\JenisOpsi;
use App\Models\PembayaranHaji;
use App\Models\RegistrasiHaji;
use Illuminate\Http\Request;

class PembayaranHajiController extends Controller
{

    public function index()
    {
        $data = PembayaranHaji::all();
        return view('pages.haji.pembayaran.detail-pembayaran', compact('data'));
    }


    public function show_pay($id)
    {
        $registrasi = PembayaranHaji::with('registrasi_haji.biaya_registrasi_haji')
            ->where('registrasi_haji_id', $id)
            ->firstOrFail();

        // return response($registrasi);
        $data = RegistrasiHaji::all();
        $jenis_pembayaran = JenisOpsi::where('nama', 'Jenis Pembayaran')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        return view('pages.haji.pembayaran.bayar', compact('registrasi', 'data', 'jenis_pembayaran'));
    }


    public function pay(Request $request)
    {

        // Hitung sisa pembayaran (misalnya, dari biaya registrasi - sudah bayar)
        $sisaPembayaran = $request->sudah_bayar > 0 ? $request->sisa_pembayaran - $request->sudah_bayar : 0;

        // Hitung kembalian (jika jumlah uang lebih besar dari yang harus dibayar)
        $kembalian = $request->jumlah_uang - $request->sudah_bayar;
        if ($kembalian < 0) {
            $kembalian = 0; // Tidak ada kembalian jika uang kurang dari sudah bayar
        }

        PembayaranHaji::create([
            'registrasi_haji_id' => $request->registrasi_haji_id,
            'sudah_bayar' => $request->sudah_bayar,
            'sisa_pembayaran' => $sisaPembayaran,
            'no_kuitansi' => $request->no_kuitansi,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'kembalian' => $kembalian,
            'status' => $request->status,
            'tujuan_pembayaran' => $request->tujuan_pembayaran,
            'petugas' => $request->petugas,
        ]);
        return redirect()->route('pembayaran-haji.index')->with('success', 'pembayaran berhasil dibuat');
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
