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

    public function show_detail_pay($id)
    {
        $data = PembayaranHaji::where('registrasi_haji_id', $id)->get();
        return view('pages.haji.pembayaran.detail-pembayaran', compact('data'));
    }


    public function show_pay($id)
    {
        $registrasi = PembayaranHaji::with('registrasi_haji.biaya_registrasi_haji')
            ->where('registrasi_haji_id', $id)
            ->latest()
            ->first();

        // return response($registrasi);
        $data = RegistrasiHaji::all();
        $jenis_pembayaran = JenisOpsi::where('nama', 'Jenis Pembayaran')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        return view('pages.haji.pembayaran.bayar', compact('registrasi', 'data', 'jenis_pembayaran'));
    }


    public function pay(Request $request, $transaksi_id)
    {

        $pembayaran = PembayaranHaji::findOrFail($transaksi_id);

        $sisa_pembayaran = $pembayaran->sisa_pembayaran;
        $jumlah_uang = $request->jumlah_uang;

        $sisa_pembayaran_validasi = $sisa_pembayaran - $request->jumlah_uang < 0 ? 0 : $sisa_pembayaran - $request->jumlah_uang;
        $kembalian_validasi = $jumlah_uang - $pembayaran->sisa_pembayaran < 0 ? 0 : $jumlah_uang - $pembayaran->sisa_pembayaran;

        PembayaranHaji::create([
            'registrasi_haji_id' => $request->registrasi_haji_id,
            'sudah_bayar' => $request->jumlah_uang,
            'sisa_pembayaran' => $sisa_pembayaran_validasi,
            'no_kuitansi' => $request->no_kuitansi,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'kembalian' => $kembalian_validasi,
            'status' => $request->status,
            'tujuan_pembayaran' => $request->tujuan_pembayaran,
            'petugas' => $request->petugas,
        ]);

        return redirect()->route('pembayaran-haji.index')->with('success', 'pembayaran berhasil dibuat');
    }

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
