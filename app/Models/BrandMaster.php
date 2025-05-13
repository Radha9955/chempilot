<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandMaster extends Model
{
    protected $table = 'BrandMaster'; // exact table name with case sensitivity

    protected $primaryKey = 'ID'; // use correct primary key

    public $timestamps = false; // since your table does not have Laravel's default timestamps

    protected $fillable = [
        'BrandName',
        'BrandDesc',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
        'BrandOfferTypeId'
    ];
}

