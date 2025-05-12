<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubGroupMaster extends Model
{
    protected $table = 'SubGroupMaster'; // Matches your SQL Server table name
    protected $primaryKey = 'ID'; // Since your PK is 'ID' in uppercase

    protected $fillable = [
        'SubGroupName',
        'GroupID',
        'DiscountPct',
        'TaxPct',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];

    protected $casts = [
        'IsActive' => 'boolean',
        'DiscountPct' => 'decimal:2',
        'TaxPct' => 'decimal:2',
        'CreatedDate' => 'datetime',
        'ModifiedDate' => 'datetime',
    ];

    public $timestamps = false; // Disable Laravel's default timestamps
}