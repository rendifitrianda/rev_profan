<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Koordinator;
use App\Models\Admin;


class KoordinatorProfileController extends Controller
{
    function index(){
        $data['list'] = Auth::guard('koordinator')->user();
        return view('koordinator.profile.index', $data);
    }

    function edit(Request $request, Koordinator $koordinator){
        
        if($request->password != null){
            if($request->foto != null){
                $koordinator->handleDeletefoto();
                $koordinator->nama = $request->nama;
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->email = $request->email;
                $koordinator->password = bcrypt($request->password);
                $koordinator->handleUploadfoto();
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $koordinator->nama = $request->nama;
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->email = $request->email;
                $koordinator->password = bcrypt($request->password);
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
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->email = $request->email;
                $koordinator->handleUploadfoto();
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $koordinator->nama = $request->nama;
                $koordinator->alamat = $request->alamat;
                $koordinator->no_tlp = $request->no_tlp;
                $koordinator->email = $request->email;
                $simpan = $koordinator->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }
        }
    
    }

    function logout(){
        $cek = Auth::guard('koordinator')->logout();
        if($cek == 1){
            return redirect('/')->with('success', 'Logout success !');
        }else{
            return back()->with('danger', 'Gagal logout coba kembali !');
        }
    }

    
    
}
