<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'product_category');
    }
    public function specifications(){
        return $this->belongsToMany(Specification::class, 'product_specification');
    }
}
