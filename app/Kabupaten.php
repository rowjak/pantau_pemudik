<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'pm_kabupaten';
    protected $primaryKey = 'kd_kabupaten';

    protected $fillable = [
        'kd_kabupaten',
        'kd_provinsi',
        'nama_kabupaten'
    ];

    public function provinsi(){
        return $this->belongsTo('App\Provinsi','kd_provinsi');
    }

    public function kecamatan(){
        return $this->hasMany('App\Kecamatan','kd_kabupaten');
    }

    public function pemudik(){
        return $this->hasMany('App\Pemudik','kab_asal');
    }
}
