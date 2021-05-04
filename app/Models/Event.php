<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $table = "events";

    protected $fillable = [
    	'event_name',
    	'message',
    	'event_start',
    	'event_end'
    ];
}