<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $uploads= 'assets/img/';

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

}
