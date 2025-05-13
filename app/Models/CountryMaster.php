<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryMaster extends Model
{
    protected $table = 'CountryMaster';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'CountryName',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];
}
