<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxMaster extends Model
{
    protected $table = 'TaxMaster'; // Exactly as defined in your database
    protected $primaryKey = 'ID'; // UPPERCASE ID as defined in your SQL Server table

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