<?php

namespace App\Http\Controllers;

use App\Models\BankPenerimaSetoran;
use App\Models\BiayaRegistrasiHaji;
use App\Models\DataAgen;
use App\Models\JenisOpsi;
use App\Models\KelengkapanRegistrasiHaji;
use App\Models\PembayaranHaji;
use App\Models\RegistrasiHaji;
use Illuminate\Http\Request;
use Monolog\Registry;

class RegistrasiHajiController extends Controller
{

    public function index()
    {
        // $test = RegistrasiHaji::with('biaya_registrasi_haji', 'pembayaran_haji')->get();
        // return response($test);
        $data = RegistrasiHaji::all();
        return view('pages.haji.registrasi-haji.index', compact('data'));
    }

    public function create()
    {
        $agen = DataAgen::all();
        $bps = BankPenerimaSetoran::all();
        $kelengkapan_registrasi = KelengkapanRegistrasiHaji::orderBy('urutan_tampil', 'asc')->get();
        $no_registrasi = now()->format('YmdHis');
        $status_pernikahan = JenisOpsi::where('nama', 'Status Pernikahan')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();

        $jenis_haji = JenisOpsi::where('nama', 'Jenis Haji')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();

        $biaya_registrasi = BiayaRegistrasiHaji::all();
        return view('pages.haji.registrasi-haji.create', compact('no_registrasi', 'agen', 'bps', 'kelengkapan_registrasi', 'status_pernikahan', 'jenis_haji', 'biaya_registrasi'));
    }

    public function store(Request $request)
    {
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('logos', 'public');
        }
        $data = $request->except(['foto']);
        $data['foto'] = $fotoPath;

        $registrasi = RegistrasiHaji::create($data);
        $registrasi->load('biaya_registrasi_haji');
        $no_kuitansi = now()->format('is');
        PembayaranHaji::create([
            'registrasi_haji_id' => $registrasi->id,
            'sudah_bayar' => 0,
            'sisa_pembayaran' => $registrasi->biaya_registrasi_haji->jumlah_biaya,
            'no_kuitansi' => 'INV' . $no_kuitansi,
            'tanggal_pembayaran' => now()->format('Y-m-d'),
            'jenis_pembayaran' => null,
            'jumlah_uang' => 0,
            'kembalian' => 0,
            'status' => 'belum lunas',
            'tujuan_pembayaran' => 'Pendaftaran Awal',
            'petugas' => null
        ]);
        return redirect()->route('registrasi-haji.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = RegistrasiHaji::findOrFail($id);
        $agen = DataAgen::all();
        $bps = BankPenerimaSetoran::all();
        $kelengkapan_registrasi = KelengkapanRegistrasiHaji::orderBy('urutan_tampil', 'asc')->get();

        return view('pages.haji.registrasi-haji.view', compact('data', 'agen', 'bps', 'kelengkapan_registrasi'));
    }

    public function edit($id)
    {
        $no_registrasi = now()->format('YmdHis');
        $data = RegistrasiHaji::findOrFail($id);
        $agen = DataAgen::all();
        $bps = BankPenerimaSetoran::all();
        $kelengkapan_registrasi = KelengkapanRegistrasiHaji::orderBy('urutan_tampil', 'asc')->get();

        return view('pages.haji.registrasi-haji.edit', compact('no_registrasi', 'data', 'agen', 'bps', 'kelengkapan_registrasi'));
    }

    public function update(Request $request, $id)
    {
        $data = RegistrasiHaji::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('registrasi-haji.index')->with('success', 'data berhasil di Update');
    }

    public function destroy($id)
    {
        $data = RegistrasiHaji::findOrFail($id);
        $data->delete();
        return redirect()->route('registrasi-haji.index')->with('success', 'data berhasil Dihapus');
    }
}
