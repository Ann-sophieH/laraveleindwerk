<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_specification');
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_specification');
    }
}
