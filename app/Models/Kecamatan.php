<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kecamatan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'kecamatan';
    protected $fillable = [
        'id',
        'nama_kecamatan',
    ];

    static $rules = [
        'nama_kecamatan' => ['required', 'unique:kecamatan'],
        
    ];
    static $pesan = [
        'nama_kecamatan.required' => 'Harus diisi tidak boleh kosong !',
        'nama_kecamatan.unique' => 'Sudah ada silahkan input lain !',
       
    ];

  
    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
  
    public function dataawal()
    {
        return $this->hasMany(Dataawal::class);
    }
    
}
