<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    // public function card()
    // {
    // 	return $this->belongsTo(card::class, 'card_id');
    // }

     protected $fillable = [
        'ref_no',
        'paytype',
        'pledge_id',
        'user_id',
        'card_id',
        'purpose_id',
        'amount',
        'date',
    ];
}

