<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dataawal;

use App\Imports\DataawalImports;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;    

class AdminDataawalController extends Controller
{
    function index(){

    
        return view('admin.data_awal.index');
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

    function edit(Dataawal $dataawal){

        $data['list'] =  $dataawal;
        
        return view('admin.data_awal.edit', $data);
    }

    function editAksi(Dataawal $dataawal, Request $request){

        $dataawal->no_tps = $request->no_tps;
        $dataawal->nik = $request->nik;
        $dataawal->nama = $request->nama;
        $dataawal->jk = $request->jk;
        $dataawal->tmp_lahir = $request->tmp_lahir;
        $dataawal->tgl_lahir = $request->tgl_lahir;
        $dataawal->umur = $request->umur;
        $dataawal->tlp = $request->tlp;
        $dataawal->rt = $request->rt;
        $dataawal->rw = $request->rw;
        $simpan = $dataawal->update();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil diupdate !');
        }else{
            return back()->with('danger', 'Data gagal diupdate, coba ulangi kembali !');
        }
    }

    function hapus(Dataawal $dataawal){
        $simpan = $dataawal->delete();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil dihapus !');
        }else{
            return back()->with('danger', 'Data gagal dihapus, coba ulangi kembali !');
        }
    }
    function detail($dataawal){
        $data['list'] =  Dataawal::with('desa.kecamatan')->findOrFail($dataawal);
        
        return view('admin.data_awal.detail', $data);
    }
    

    function uploadFile(Request $request){
        $file = $request->file('file');
        Excel::import(new DataawalImports, $file);

        return back()->with('success', 'Data berhasil diupload !');
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
