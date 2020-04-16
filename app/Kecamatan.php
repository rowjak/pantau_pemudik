<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'pm_kecamatan';
    protected $primaryKey = 'kd_kecamatan';

    protected $fillable = [
        'kd_kecamatan',
        'kd_kabupaten',
        'nama_kecamatan'
    ];

    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten','kd_kabupaten');
    }

    public function pemudik(){
        return $this->hasMany('App\Pemudik','kd_kecamatan');
    }
}
