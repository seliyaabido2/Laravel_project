<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class btl_model extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'date1',
    'date2',
    'p_id'
    ];
}
