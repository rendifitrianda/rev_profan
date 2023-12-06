<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dataawal;

use Yajra\DataTables\DataTables; 
 

class KoordinatorDataawalController extends Controller
{
    function index(){
        return view('koordinator.data_awal.index');
    }

    function detail($dataawal){
        $data['list'] =  Dataawal::with('desa.kecamatan')->findOrFail($dataawal);
        
        return view('koordinator.data_awal.detail', $data);
    }

    
    function indexData(Request $request){
        $datas = Dataawal::with('desa')->get();
        return DataTables::of($datas)
            ->addColumn('kecamatan_nama', function ($desa) {
                return $desa->desa->nama_desa;
            })
            ->rawColumns(['action'])
            ->make(true);

        
        return DataTables::of($data)->make(true);
    }
}
