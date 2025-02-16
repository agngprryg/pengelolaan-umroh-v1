<?php

namespace App\Http\Controllers;

use App\Models\BankPenerimaSetoran;
use App\Models\DataAgen;
use App\Models\KelengkapanRegistrasiHaji;
use App\Models\RegistrasiHaji;
use Illuminate\Http\Request;

class RegistrasiHajiController extends Controller
{

    public function index()
    {
        $data = RegistrasiHaji::all();
        return view('pages.haji.registrasi-haji.index', compact('data'));
    }

    public function create()
    {
        $agen = DataAgen::all();
        $bps = BankPenerimaSetoran::all();
        $kelengkapan_registrasi = KelengkapanRegistrasiHaji::orderBy('urutan_tampil', 'asc')->get();
        $no_registrasi = now()->format('YmdHis');

        return view('pages.haji.registrasi-haji.create', compact('no_registrasi', 'agen', 'bps', 'kelengkapan_registrasi'));
    }

    public function store(Request $request)
    {
        // $alamatLengkap = "{$request->jalan}, Desa {$request->desa}, Kec. {$request->kecamatan}, Kab. {$request->kabupaten}, Prov. {$request->provinsi}, Kode Pos {$request->kode_pos}";
        // $data = $request->except(['alamat_calon']);
        // $data['alamat_calon'] = $alamatLengkap;

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('logos', 'public');
        }
        $data = $request->except(['foto']);
        $data['foto'] = $fotoPath;

        RegistrasiHaji::create($data);
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
