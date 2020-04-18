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

    // public function pemudik(){
    //     return $this->hasMany('App\Pemudik','kd_provinsi');
    // }
}
