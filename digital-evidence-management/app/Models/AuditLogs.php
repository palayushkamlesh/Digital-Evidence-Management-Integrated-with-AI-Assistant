<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    protected $fillable = [
        'users_id',
        'action',
        'module',
        'description',
        'ip_address'
    ];
}
