<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;

use App\Imports\DesaImports;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class AdminDesaController extends Controller
{
    function index(){
        $data['kecamatan'] = Kecamatan::get();
        $data['list'] = Desa::with('kecamatan')->get();
        return view('admin.desa.index', $data);
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

    function tambah(Request $request){
        
        $request->validate(Desa::$rules,Desa::$pesan);
        
        $desa = new Desa;
        $desa->kecamatan_id = $request->kecamatan_id;
        $desa->nama_desa = $request->nama_desa;
        $desa->jumlah_dpt = $request->jumlah_dpt;
        $desa->target = $request->target;
        $simpan = $desa->save();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil ditambahkan !');
        }else{
            return back()->with('danger', 'Data gagal ditambahkan, coba ulangi kembali !');
        }
    }

    function edit(Desa $desa,Request $request){
     
        $desa->kecamatan_id = $request->kecamatan_id;
        $desa->nama_desa = $request->nama_desa;
        $desa->jumlah_dpt = $request->jumlah_dpt;
        $desa->target = $request->target;
        $simpan = $desa->update();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil diupdate !');
        }else{
            return back()->with('danger', 'Data gagal diupdate, coba ulangi kembali !');
        }
    }

    function uploadFile(Request $request){
        $file = $request->file('file');
        Excel::import(new DesaImports, $file);
        return back()->with('success', 'Data berhasil diupload !');
    }
}
