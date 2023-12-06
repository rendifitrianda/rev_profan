<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dataawal;
use App\Models\Dpt;

class KoordinatorDashboardController extends Controller
{
    function index(){
        return view('koordinator.dashboard');
    }

    function tampilGrafik(){
        $data = Kecamatan::with('desa.dataawal')
            ->get()
            ->map(function ($kecamatan) {
                $totalDpt = $kecamatan->desa->sum('jumlah_dpt');

                $pencapaian = $kecamatan->desa->map(function ($desa) {
                    $dptModel = Dpt::find($desa->id);
                    return $dptModel ? $dptModel->count() : 0;
                });

                $jumlahTarget = ceil(($totalDpt * 0.3) / 100);
                $jumlahPencapaian = $pencapaian->sum();

                $persentasePencapaian = $jumlahTarget != 0 ? round(($jumlahPencapaian / $jumlahTarget) * 100, 2) : 0;

                return [
                    'Kecamatan' => $kecamatan->nama_kecamatan,
                    'jumlahDesa' => count($kecamatan->desa),
                    'jumlahDpt' => $totalDpt,
                    'jumlahTarget' => $jumlahTarget,
                    'jumlahPencapaian' => $jumlahPencapaian,
                    'persentasePencapaian' => $persentasePencapaian,
                ];
            });

            

        return response()->json($data);
    }
}
