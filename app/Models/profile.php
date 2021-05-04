<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    public $timestamps = true;

   
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'status',
        'street',
        'city',
        'country',
        'phone_no',
        'zip_code',
        'image',
        'sex',
        'dob',
        'email'
            ];
}
