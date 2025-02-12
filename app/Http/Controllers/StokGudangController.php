<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Gudang;
use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokGudangController extends Controller
{

    public function index()
    {
        $stokGudangs = StokGudang::with('gudang')->get();
        $gudangs = Gudang::all();
        $distributors = Distributor::all();
        return response()->json($stokGudangs);
        return view('pages.produk.stok-gudang.index', compact('stokGudangs', 'gudangs', 'distributors'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
