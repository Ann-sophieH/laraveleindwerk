<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function specifications(){
        return $this->belongsToMany(Specification::class, 'category_specification');
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

}
