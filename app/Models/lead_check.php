<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_check extends Model
{
    use HasFactory;
    protected $fillable[
    'name',
    'lead_id',
    'ragister',
    'recharge'
    ];
}
