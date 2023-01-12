<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellMenu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sell_detail(){
        return $this->hasMany(SellDetailMenu::class)->orderBy('created_at','DESC');
    }
    public function user(){
        return $this->hasOne('App\Models\UserMenu', 'id', 'user_menu_id');
    }
}
