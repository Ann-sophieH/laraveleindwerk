<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class, 'product_specification');
    }
    public function colors(){
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function scopeFilter($query, array $filters)
    { //scope+naam functie in casu Filter
        //array filters komt uit de filter array opgehaald met search variabele (opgehaald als array)
        //oude wijze: if(isset($filters['search']) == false

        if ($filters['search'] ?? false) { //php 8!!
            $query->where('name', 'like', '%' . request('search') . '%')
                //->orWhere('color', 'like', '%' . request('search') . '%')
                ->orWhere('price', 'like', '%' . request('search') . '%')
                ->orWhere('details', 'like', '%' . request('search') . '%');

        }

    }
}
