<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchMaster extends Model
{
    protected $table = 'BranchMaster';  // Explicit table name
    protected $primaryKey = 'ID';       // Custom primary key
    public $timestamps = false;         // Disable Laravel's auto timestamps

    protected $fillable = [
        'BranchCode',
        'BranchName',
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
        'CompanyID',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];

    // Relationships

    public function city()
    {
        return $this->belongsTo(CityMaster::class, 'CityID');
    }

    // public function company()
    // {
    //     return $this->belongsTo(CompanyMaster::class, 'CompanyID');
    // }

    public function creator()
    {
        return $this->belongsTo(User::class, 'CreatedBy');
    }

    public function modifier()
    {
        return $this->belongsTo(User::class, 'ModifiedBy');
    }
}
