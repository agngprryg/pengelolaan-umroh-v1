<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakAmplopController extends Controller
{

    public function handle_search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!$keyword) {
            return view('pages.cetak-amplop.index', ['data_pengguna' => []]);
        }

        $data_pengguna = DataPengguna::where('username', 'LIKE', '%' . $keyword . '%')->get();
        return view('pages.cetak-amplop.index', compact('data_pengguna', 'keyword'));
    }

    public function export_pdf(Request $request)
    {
        $keyword = $request->input('keyword');

        $data_pengguna = DataPengguna::where('username', 'LIKE', '%' . $keyword . '%')->get();
        $pdf = Pdf::loadView('pages.cetak-amplop.pdf', compact('data_pengguna', 'keyword'));
        return $pdf->download("cetak_amplop.pdf");
    }
}
