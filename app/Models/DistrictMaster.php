<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictMaster extends Model
{
    protected $table = 'DistrictMaster';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'DistrictName',
        'StateID',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];
}
