<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\Desa;

class DesaImports implements ToModel
{
    
    public function model(array $row){
        return new Desa([
            'kecamatan_id' => $row[0],
            'nama_desa' => $row[1],
            'jumlah_dpt' => $row[2],
            'target' => $row[3],
        ]);
    }

}