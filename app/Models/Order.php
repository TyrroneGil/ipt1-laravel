<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['orderNum','address','user_id','totalPrice','totalOrder'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
