<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateMaster extends Model
{
    protected $table = 'StateMaster';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'StateName', 'CountryID', 'IsActive',
        'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy', 'GSTInit'
    ];

    public function country()
    {
        return $this->belongsTo(CountryMaster::class, 'CountryID', 'ID');
    }
}
