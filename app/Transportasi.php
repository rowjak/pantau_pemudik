<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'pm_media_transportasi';
    protected $primaryKey = 'kd_transportasi';

    protected $fillable = [
        'nama_kendaraan'
    ];
}
