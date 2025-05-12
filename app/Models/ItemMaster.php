<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it follows convention)
    protected $table = 'ItemMaster'; 

    // Define the primary key (optional if it follows convention)
    protected $primaryKey = 'ID'; 

    // Disable the timestamps if your table doesn't have created_at and updated_at columns
    public $timestamps = false;

    // Define the columns that are mass assignable
    protected $fillable = [
        'ItemName',
        'ProductID',
        'FromPrice',
        'ToPrice',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
        'SectionID',
        'ItemCode',
    ];

    // Define the date fields if you want to cast them as Carbon instances
    protected $dates = [
        'CreatedDate',
        'ModifiedDate',
    ];

    // You can also define hidden attributes, casts, or relationships if necessary
}
