<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory;
    protected $fillable=['file'];
    protected $uploads= 'assets/img/';


    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

    public function users(){
        return $this->morphedByMany(User::class, 'photoable');
    }
    public function products(){
        return $this->morphedByMany(Product::class, 'photoable');
    }
    public function posts(){
        return $this->morphedByMany(Post::class, 'photoable');
    }
    public function types(){
        return $this->hasMany(Type::class);
    }


}
