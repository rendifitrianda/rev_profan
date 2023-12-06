<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dataawal;
use App\Models\Dpt;
use App\Models\Koordinator;


class KoordinatorDptController extends Controller
{
    function index(){

        $data['list'] = Dpt::with('desa')->get();
        
        return view('koordinator.dpt.index', $data);
    }

    function tambah(){
        
        $data['koordinator'] = Koordinator::get();
        $data['desa'] = Desa::get();
        return view('koordinator.dpt.tambah', $data);
    }

    function aksitambah(Request $request){
        
        $request->validate(Dpt::$rules,Dpt::$pesan);
        

        $dpt = new Dpt;
        $dpt->desa_id = $request->desa_id;
        $dpt->koordinator_id = $request->koordinator_id;
        $dpt->nik = $request->nik;
        $dpt->nama = $request->nama;
        $dpt->jk = $request->jk;
        $dpt->tmp_lahir = $request->tmp_lahir;
        $dpt->tgl_lahir = $request->tgl_lahir;
        $dpt->umur = $request->umur;
        $dpt->tlp = $request->tlp;
        $dpt->no_tps = $request->no_tps;
        $dpt->rt = $request->rt;
        $dpt->rw = $request->rw;
        $dpt->handleUploadfoto();
        $simpan = $dpt->save();

        if($simpan == 1){
            return redirect('koordinator/dpt')->with('success', 'Data berhasil ditambahkan !');
        }else{
            return back()->with('danger', 'Data gagal ditambahkan, coba ulangi kembali !');
        }
    }

    function detail($dpt){
        $data['list'] =  Dpt::with('desa.kecamatan')->findOrFail($dpt);
 
        return view('koordinator.dpt.detail', $data);
    }
    function edit($dpt){
        $data['list'] =  Dpt::with('desa.kecamatan')->findOrFail($dpt);
        $data['koordinator'] = Koordinator::get();
        $data['desa'] = Desa::get();
        return view('koordinator.dpt.edit', $data);
    }

    function aksiedit(Request $request, Dpt $dpt){
        if ($request->foto_ktp != null) {
            $dpt->handleDeletefoto();
            $dpt->desa_id = $request->desa_id;
            $dpt->koordinator_id = $request->koordinator_id;
            $dpt->nik = $request->nik;
            $dpt->nama = $request->nama;
            $dpt->jk = $request->jk;
            $dpt->tmp_lahir = $request->tmp_lahir;
            $dpt->tgl_lahir = $request->tgl_lahir;
            $dpt->umur = $request->umur;
            $dpt->tlp = $request->tlp;
            $dpt->no_tps = $request->no_tps;
            $dpt->rt = $request->rt;
            $dpt->rw = $request->rw;
            $dpt->handleUploadfoto();
            $simpan = $dpt->update();
    
            if($simpan == 1){
                return redirect('koordinator/dpt')->with('success', 'Data berhasil diupdate !');
            }else{
                return back()->with('danger', 'Data gagal diupdate, coba ulangi kembali !');
            }
        }else{
            $dpt->desa_id = $request->desa_id;
            $dpt->koordinator_id = $request->koordinator_id;
            $dpt->nik = $request->nik;
            $dpt->nama = $request->nama;
            $dpt->jk = $request->jk;
            $dpt->tmp_lahir = $request->tmp_lahir;
            $dpt->tgl_lahir = $request->tgl_lahir;
            $dpt->umur = $request->umur;
            $dpt->tlp = $request->tlp;
            $dpt->no_tps = $request->no_tps;
            $dpt->rt = $request->rt;
            $dpt->rw = $request->rw;
            $simpan = $dpt->update();
    
            if($simpan == 1){
                return redirect('koordinator/dpt')->with('success', 'Data berhasil diupdate !');
            }else{
                return back()->with('danger', 'Data gagal diupdate, coba ulangi kembali !');
            }
        }
    }

    function hapus(Dpt $dpt){
        $dpt->handleDeletefoto();
        $simpan = $dpt->delete();
    
        if($simpan == 1){
            return redirect('koordinator/dpt')->with('success', 'Data berhasil dihapus !');
        }else{
            return back()->with('danger', 'Data gagal dihapus, coba ulangi kembali !');
        }
    }


    function cari(Request $request){
        $nama = $request->nama;
        $desa = $request->desa;
        $tgl_lahir = $request->tgl_lahir;

       
    
        $dataDesa = Desa::where('nama_desa', $desa)->get();
    
        if ($dataDesa->isNotEmpty()) {
            $desaId = $dataDesa[0]->id;
    
            $dataDpt = Dataawal::with('desa.kecamatan')
                ->where('nama', $nama)
                ->where('desa_id', $desaId)
                ->whereDate('tgl_lahir', $tgl_lahir) // Use whereDate instead of where
                ->get();
    
            return response()->json([
                'status' => 200,
                'data' => $dataDpt,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => null,
            ]);
        }
    }
    
}
