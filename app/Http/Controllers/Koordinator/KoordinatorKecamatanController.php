<?php

namespace App\Http\Controllers\Koordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KoordinatorKecamatanController extends Controller
{
    function index(){
        $data['list'] = Kecamatan::get();
        return view('koordinator.kecamatan.index', $data);
    }

}
