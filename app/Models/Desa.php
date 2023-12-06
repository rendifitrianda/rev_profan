<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $fillable = [
        'kecamatan_id',
        'nama_desa',
        'jumlah_dpt',
        'target'
    ];


    static $rules = [
        'kecamatan_id' => ['required'],
        'nama_desa' => ['required', 'unique:desa'],
        'jumlah_dpt' => ['required'],
        'target' => ['required'],
        
    ];
    static $pesan = [
        'kecamatan_id.required' => 'Harus diisi tidak boleh kosong !',
        'nama_desa.required' => 'Harus diisi tidak boleh kosong !',
        'jumlah_dpt.required' => 'Harus diisi tidak boleh kosong !',
        'target.required' => 'Harus diisi tidak boleh kosong !',
        'nama_desa.unique' => 'Sudah ada silahkan input lain !',
       
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function dpt()
    {
        return $this->belongsTo(DPT::class);
    }
    public function dataawal()
    {
        return $this->hasMany(Dataawal::class);
    }
}
