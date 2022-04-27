<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'color_product');
    }
}
