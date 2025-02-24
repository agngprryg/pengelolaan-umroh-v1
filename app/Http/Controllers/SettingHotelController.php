<?php

namespace App\Http\Controllers;

use App\Models\SettingHotel;
use Illuminate\Http\Request;

class SettingHotelController extends Controller
{
    public function index()
    {

        $data = SettingHotel::all();
        return view('pages.setting-umroh.setting-hotel.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.setting-hotel.create');
    }

    public function store(Request $request)
    {
        SettingHotel::create($request->all());
        return redirect()->route('setting-hotel.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = SettingHotel::findOrFail($id);
        return view('pages.setting-umroh.setting-hotel.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SettingHotel::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('setting-hotel.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = SettingHotel::findOrFail($id);
        $data->delete();
        return redirect()->route('setting-hotel.index')->with('success', 'data berhasil di hapus');
    }
}
