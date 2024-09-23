<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
 public function sells()
    {
        return $this->hasMany(Sell::class, 'foodId');
    }

}
