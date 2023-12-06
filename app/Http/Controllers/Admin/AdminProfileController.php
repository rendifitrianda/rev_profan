<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Koordinator;
use App\Models\Admin;


class AdminProfileController extends Controller
{
    function index(){
        $data['list'] = Auth::guard('admin')->user();
        return view('admin.profile.index', $data);
    }

    function edit(Request $request, Admin $admin){
        
        if($request->password != null){
            if($request->foto != null){
                $admin->handleDeletefoto();
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->handleUploadfoto();
                $simpan = $admin->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $simpan = $admin->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }
        }else{
            if($request->foto != null){
                $admin->handleDeletefoto();
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->handleUploadfoto();
                $simpan = $admin->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }else{
                $admin->nama = $request->nama;
                $admin->email = $request->email;
                $simpan = $admin->update();
        
                if($simpan == 1){
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('danger', 'Data berhasil diupdate !');
                }
            }
        }
    
    }

    function logout(){
        $cek = Auth::guard('admin')->logout();
        if($cek == 1){
            return redirect('/')->with('success', 'Logout success !');
        }else{
            return back()->with('danger', 'Gagal logout coba kembali !');
        }
    }

    
    
}
