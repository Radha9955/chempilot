<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HSNMaster extends Model
{
    use HasFactory;

    protected $table = 'HSNMaster'; // Table name
    protected $primaryKey = 'ID';   // Primary key
    protected $fillable = [
        'HSNName', 
        'GSTID',
        'IsActive',
        'CreatedDate', 
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
    ];

    // Enable timestamps (if needed, for CreatedAt & UpdatedAt)
    public $timestamps = false;
}
