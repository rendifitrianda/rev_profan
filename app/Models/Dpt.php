<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dpt extends Model
{
    use HasFactory;
    protected $table = 'dpt';
    protected $fillable = [
        'desa_id',
        'koordinator_id',
        'nik',
        'nama',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'umur',
        'tlp',
        'no_tps',
        'rt',
        'rw',
        'foto_ktp',
    ];


    static $rules = [
        'desa_id'=> ['required'],
        'koordinator_id'=> ['required'],
        'nik'=> ['required'],
        'nama'=> ['required'],
        'jk'=> ['required'],
        'tmp_lahir'=> ['required'],
        'tgl_lahir'=> ['required'],
        'umur'=> ['required'],
        'tlp'=> ['required'],
        'no_tps'=> ['required'],
        'rt'=> ['required'],
        'rw'=> ['required'],
        'foto_ktp'=> ['required'],
        
    ];
    static $pesan = [
        'kecamatan_id.required' => 'Harus diisi tidak boleh kosong !',
        'desa_id.required'=> 'Harus diisi tidak boleh kosong !',
        'koordinator_id.required'=> 'Harus diisi tidak boleh kosong !',
        'nik.required'=> 'Harus diisi tidak boleh kosong !',
        'nama.required'=> 'Harus diisi tidak boleh kosong !',
        'jk.required'=> 'Harus diisi tidak boleh kosong !',
        'tmp_lahir.required'=> 'Harus diisi tidak boleh kosong !',
        'tgl_lahir.required'=> 'Harus diisi tidak boleh kosong !',
        'umur.required'=> 'Harus diisi tidak boleh kosong !',
        'tlp.required'=> 'Harus diisi tidak boleh kosong !',
        'no_tps.required'=> 'Harus diisi tidak boleh kosong !',
        'rt.required'=> 'Harus diisi tidak boleh kosong !',
        'rw.required'=> 'Harus diisi tidak boleh kosong !',
        'foto_ktp.required'=> 'Harus diisi tidak boleh kosong !',
        
       
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'id', 'desa_id');
    }

    public function koordinator()
    {
        return $this->belongTo(Koordinator::class);
    }

    function handleUploadfoto(){
        if(request()->hasFile('foto_ktp')){
            $this->handleDeletefoto();
            $foto_ktp = request()->file('foto_ktp');
            $destination = "Dpt";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto_ktp->extension();
            $url = $foto_ktp->storeAs($destination, $filename);
            $this->foto_ktp = "app/".$url;
            $this->save;
        }
    }
    function handleDeletefoto(){
        $foto_ktp= $this->foto_ktp;
        if($foto_ktp){
            $path = public_path($foto_ktp);
            if(file_exists($path)){
                unlink($path);
            }
            return true;
        }
    }
}
