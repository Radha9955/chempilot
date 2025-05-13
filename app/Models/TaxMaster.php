<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxMaster extends Model
{
    protected $table = 'TaxMaster';

    protected $fillable = [
        'TaxName',
        'CGST',
        'SGST',
        'IGST',
        'CESS',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];

    public $timestamps = false;
}
