<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    protected $table = 'CompanyMaster';
    protected $primaryKey = 'ID'; // Explicitly defining the primary key
    
    protected $fillable = [
        'CompanyName',
        'AddressLine1',
        'AddressLine2',
        'AddressLine3',
        'CityID',
        'PinCode',
        'Phone',
        'MobilePhone',
        'WhatsAppNo',
        'Email',
        'TIN',
        'GST',
        'Logo',
        'Website',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
        'CompanyCode',
    ];

    public $timestamps = false;
    
    // Relationship with CityMaster
    public function city()
    {
        return $this->belongsTo(CityMaster::class, 'CityID', 'ID');
    }
}