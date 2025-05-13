<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GSTMaster extends Model
{
    use HasFactory;

    protected $table = 'GSTMaster'; // Table name in the database
    protected $primaryKey = 'ID';  // Primary key column name
    public $timestamps = false;     // If you use the `timestamps` field, leave this as true
    protected $fillable = [
        'GSTName', 'GroupID', 'FromAmount', 'ToAmount', 'FromDate', 'ToDate', 
        'TaxID', 'IsActive', 'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'
    ];
}
