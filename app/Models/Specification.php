<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'parent_id'];

    public function specs(){
        return $this->hasMany(Specification::class, 'parent_id');
    }
    //recursive function
    public function childspecs(){
        return $this->hasMany(Specification::class, 'parent_id')->with('specs' )->withTrashed(); //leest parent id ipv id
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'product_specification');
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_specification');
    }
    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
        //acctually i only need 1 picture per spec but to keep all photo relations neatly in the
        //photoables pivot table ill make a many-relationship
        //upon update ill delete old picture  ->>nice to have !!
    }
}
