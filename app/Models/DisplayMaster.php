<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayMaster extends Model
{
    use HasFactory;

    protected $table = 'DisplayMaster'; // <-- SQL Server table name (case-sensitive!)

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'DisplayName',
        'ItemID',
        'BranchID',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy'
    ];
}
