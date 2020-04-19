<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemudik extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "pm_pemudik";

    protected $primaryKey = "kd_pemudik";

    protected $fillable = [
        'no_hp', 'nik', 'nama','jenis_kelamin','usia','hub_kekerabatan','pekerjaan','alamat','kd_desa','password','kd_kecamatan', 'kd_perjalanan','prov_asal','kab_asal','kec_asal','des_asal','kd_transit'
    ];

    public function desa(){
        return $this->belongsTo('App\Desa','kd_desa');
    }

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan','kd_kecamatan');
    }

    public function perjalanan(){
        return $this->belongsTo('App\Perjalanan','kd_perjalanan');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
