<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Card extends Model
{
	// public function user()
 //    {
 //        return $this->belongsTo(User::class, 'user_id');
 //    }
    
    use HasFactory;

    protected $table = "cards";

      protected $fillable = [
        'card_no',
        'user_id',
        
            ];
 
}
