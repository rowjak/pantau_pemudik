<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $table = 'pm_perjalanan';
    protected $primaryKey = 'kd_perjalanan';

    protected $fillable = [
        'provinsi_asal',
        'kabupaten_asal',
        'kecamatan_asal',
        'desa_asal',
        'provinsi_tujuan',
        'kabupaten_tujuan',
        'kecamatan_tujuan',
        'desa_tujuan',
        'kd_transportasi',
        'tgl_sampai',
    ];

    public function prov_asal(){
        return $this->belongsTo('App\Provinsi','provinsi_asal','kd_provinsi');
    }

    public function kab_asal(){
        return $this->belongsTo('App\Kabupaten','kabupaten_asal','kd_kabupaten');
    }

    public function kec_asal(){
        return $this->belongsTo('App\Kecamatan','kecamatan_asal','kd_kecamatan');
    }

    public function des_asal(){
        return $this->belongsTo('App\Desa','desa_asal','kd_desa');
    }

    public function transportasi(){
        return $this->belongsTo('App\Transportasi','kd_transportasi');
    }

    public function pemudik(){
        return $this->hasMany('App\Pemudik','kd_perjalanan');
    }
}
