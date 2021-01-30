<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $fillable = [
        'name', 'statu', 'method', 'user_id'
    ];
}
