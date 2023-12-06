<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataawal extends Model
{
    use HasFactory;
    protected $table = 'data_awal';
    protected $fillable = [
        'desa_id',
        'no_tps',
        'nik',
        'nama',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'umur',
        'tlp',
        'rt',
        'rw',
    ];


    static $rules = [
        'desa_id' => ['required'],
        'no_tps' => ['required'],
        'nik' => ['required'],
        'nama' => ['required'],
        'jk' => ['required'],
        'tmp_lahir' => ['required'],
        'tgl_lahir' => ['required'],
        'umur' => ['required'],
        'tlp' => ['required'],
        'rt' => ['required'],
        'rw' => ['required'],
        
    ];
    static $pesan = [
        'desa_id.required' => 'Harus diisi tidak boleh kosong !',
        'no_tps.required' => 'Harus diisi tidak boleh kosong !',
        'nik.required' => 'Harus diisi tidak boleh kosong !',
        'nama.required' => 'Harus diisi tidak boleh kosong !',
        'jk.required' => 'Harus diisi tidak boleh kosong !',
        'tmp_lahir.required' => 'Harus diisi tidak boleh kosong !',
        'tgl_lahir.required' => 'Harus diisi tidak boleh kosong !',
        'umur.required' => 'Harus diisi tidak boleh kosong !',
        'tlp.required' => 'Harus diisi tidak boleh kosong !',
        'rt.required' => 'Harus diisi tidak boleh kosong !',
        'rw.required' => 'Harus diisi tidak boleh kosong !',

       
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
