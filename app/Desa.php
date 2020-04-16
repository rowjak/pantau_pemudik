<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'pm_desa';
    protected $primaryKey = 'kd_desa';

    protected $fillable = [
        'kd_desa',
        'kd_kecamatan',
        'nama_desa'
    ];

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan','kd_kecamatan');
    }

    public function pemudik(){
        return $this->hasMany('App\Pemudik','kd_desa');
    }
}
