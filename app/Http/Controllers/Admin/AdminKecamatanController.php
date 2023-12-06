<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;

class AdminKecamatanController extends Controller
{
    function index(){
        $data['list'] = Kecamatan::get();
        return view('admin.kecamatan.index', $data);
    }

    function tambah(Request $request){

        $request->validate(Kecamatan::$rules,Kecamatan::$pesan);
        
        $kecamatan = new Kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $simpan = $kecamatan->save();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil diinput !');
        }else{
            return back()->with('danger', 'Data berhasil diinput !');
        }
    }

    function edit(Kecamatan $kecamatan,Request $request){
     
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $simpan = $kecamatan->update();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil diupdate !');
        }else{
            return back()->with('danger', 'Data gagal diupdate, coba ulangi kembali !');
        }
    }
}
