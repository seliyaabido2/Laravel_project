<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
              'start_date',
              'end_date',
              'event_status',
              'city',
              'type_of_event',
              'apartmant_name',
              'apartmant_code',
              'apartmant_adress',
              'event_organiser',
              'apartmant_google_link',
    ];
}
