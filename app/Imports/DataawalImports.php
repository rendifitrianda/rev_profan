<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Dataawal;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DataawalImports implements ToModel
{
    public function model(array $row)
    {
        // Convert Excel date to Carbon instance
        $tgl_lahir = Date::excelToDateTimeObject($row[6])->format('Y-m-d');

        return new Dataawal([
            'desa_id' => $row[0],
            'no_tps' => $row[1],
            'nik' => $row[2],
            'nama' => $row[3],
            'jk' => $row[4],
            'tmp_lahir' => $row[5],
            'tgl_lahir' => $tgl_lahir, // Use the converted date here
            'umur' => $row[7],
            'tlp' => $row[8],
            'rt' => $row[9],
            'rw' => $row[10],
        ]);
    }
}
