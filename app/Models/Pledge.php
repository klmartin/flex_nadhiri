<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    use HasFactory;
    protected $table = 'pledges';
    public $timestamps = true;

   
    protected $fillable = [
        'amount',
        'user_id',
        'purpose',
        'total'
            ];

    public function payments()
    	{
        	return $this->hasMany('App\Models\Payment');
    	}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

