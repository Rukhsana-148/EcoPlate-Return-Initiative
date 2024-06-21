<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    use HasFactory; 
    public function user()
    {
        return $this->belongsTo(User::class, 'buyId');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'foodId');
    }
}
