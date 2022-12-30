<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sell_detail(){
        return $this->hasMany(Sell_detail::class)->orderBy('created_at','DESC');
    }
    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
