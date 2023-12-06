<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;

use App\Imports\DesaImports;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class KoordinatorDesaController extends Controller
{
    function index(){
        $data['kecamatan'] = Kecamatan::get();
        $data['list'] = Desa::with('kecamatan')->get();
        return view('koordinator.desa.index', $data);
    }

    function ambilDataIndex(){
        
        $datas = Desa::with('kecamatan')->get();
        return DataTables::of($datas)
            ->addColumn('kecamatan_nama', function ($desa) {
                return $desa->kecamatan->nama_kecamatan;
            })
            ->rawColumns(['action'])
            ->make(true);

        
        return DataTables::of($data)->make(true);
    }

    
}
