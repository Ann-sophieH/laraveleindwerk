<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable=['file'];
    protected $uploads= 'assets/img/';

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

}
