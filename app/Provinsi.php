<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'pm_provinsi';
    protected $primaryKey = 'kd_provinsi';

    protected $fillable = [
        'kd_provinsi',
        'nama_provinsi'
    ];

    // public function pemudik()
    // {
    //     return $this->hasManyThrough(
    //         'App\Kecamatan',
    //         'App\Pemudik',
    //         ''
    //     );
    // }

    public function pemudik(){
        return $this->hasMany('App\Pemudik','prov_asal');
    }
    public function byKab(){
        return $this->hasMany('App\Pemudik','kab_asal');
    }
    public function byKec(){
        return $this->hasMany('App\Pemudik','kec_asal');
    }
    public function byDes(){
        return $this->hasMany('App\Pemudik','des_asal');
    }
}
