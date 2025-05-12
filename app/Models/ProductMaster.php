<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    protected $table = 'ProductMaster';
    protected $primaryKey = 'ID';
    public $timestamps = false; // Since no created_at/updated_at

    protected $fillable = [
        'ProductName', 'SubGroupID', 'IsActive',
        'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'
    ];
    public function subgroup()
{
    return $this->belongsTo(SubGroupMaster::class, 'SubGroupID', 'id');
}
}
