<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id'];

    public function specs(){
        return $this->hasMany(Specification::class, 'parent_id');
    }
    //recursive function
    public function childspecs(){
        return $this->hasMany(Specification::class, 'parent_id')->with('specs'); //leest parent id ipv id
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_specification');
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_specification');
    }
}
