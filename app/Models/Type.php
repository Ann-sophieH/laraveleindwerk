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
        'photo_id',
        'slug',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_type');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }

}
