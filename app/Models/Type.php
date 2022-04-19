<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
        'category_id',
        'photo_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_type');
    }

}
