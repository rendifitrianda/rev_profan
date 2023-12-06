<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dataawal;
use App\Models\Dpt;
use App\Models\Koordinator;


class AdminKoordinatorController extends Controller
{
    function index(){

        $data['list'] = Koordinator::get();
        
        return view('admin.koordinator.index', $data);
    }

    function tambah(Request $request){

        $request->validate(Koordinator::$rules,Koordinator::$pesan);

        $koordinator = new Koordinator;
        $koordinator->nama = $request->nama;
        $koordinator->email = $request->email;
        $koordinator->password = bcrypt($request->password);
        $koordinator->alamat = $request->alamat;
        $koordinator->no_tlp = $request->no_tlp;
        $koordinator->handleUploadfoto();
        $koordinator->status_akun = "Aktif";
        $simpan = $koordinator->save();

        if($simpan == 1){
            return back()->with('success', 'Data berhasil diinput !');
        }else{
            return back()->with('danger', 'Data berhasil diinput !');
        }
    }

    function edit(Request $request, Koordinator $koordinator){

        if($request->password != null){

            if($request->foto != null){

                $koordinator->handleDeletefoto();
               
                $koordinator->nama = $request->nama;
                $koordinator->email = $request->email;
                $koordinator->password = bcrypt($request->password);
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->handleUploadfoto();
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $koordinator->nama = $request->nama;
                $koordinator->email = $request->email;
                $koordinator->password = bcrypt($request->password);
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }


        }else{
            if($request->foto != null){

                $koordinator->handleDeletefoto();
               
                $koordinator->nama = $request->nama;
                $koordinator->email = $request->email;
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->handleUploadfoto();
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $koordinator->nama = $request->nama;
                $koordinator->email = $request->email;
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }
        }
 
    }

    function hapus(Koordinator $koordinator){
        $koordinator->handleDeletefoto();
        $simpan = $koordinator->delete();
        $ds = Dpt::where('koordinator_id', $koordinator->id)->delete();
        if($simpan == 1){
            return back()->with('success', 'Data berhasil dihapus !');
        }else{
            return back()->with('danger', 'Data berhasil dihapus !');
        }
    }
    

    
}
