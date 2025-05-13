<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityMaster extends Model
{
    protected $table = 'CityMaster';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'CityName',
        'DistrictID',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];
   public function district()
{
    return $this->belongsTo(DistrictMaster::class, 'DistrictID');
}
}
