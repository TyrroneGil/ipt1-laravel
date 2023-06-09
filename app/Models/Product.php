<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unit', 'unitPrice', 'category','image_url','description','user_id'];
    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where('name','like','%'.$filters['search'].'%')
            ->orWhere('category','like','%'.$filters['search'].'%')
            ->orWhere('description','like','%'.$filters['search'].'%');
        }
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

   
}
