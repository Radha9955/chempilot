<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMaster extends Model
{
    protected $table = 'GroupMaster';

    protected $primaryKey = 'ID';

    public $timestamps = false; // disable Laravel's created_at, updated_at

    protected $fillable = [
        'GroupName',
        'IsActive',
        'CreatedDate',
        'CreatedBy',
        'ModifiedDate',
        'ModifiedBy',
        'IsNBGroup'
    ];
}

