<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    protected $table = 'pm_transit';
    protected $primaryKey = 'kd_transit';

    protected $fillable = [
        'tempat_transit',
    ];
}
