<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recharge extends Model
{
    use HasFactory;
    protected $fillable[
    'name',
    'lead_id',
    'ragister',
    'recharge'
    ];
}
