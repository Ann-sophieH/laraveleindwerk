<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use softDeletes;

    //protected $guarded=['id'];
    protected $fillable=['category_id', 'title','slug', 'body_short', 'body_long','blockquote' ,'sticky'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
    }
    public function postcomments(){
        return $this->hasMany(Comment::class);
    }

    /**:filtering**/
    public function scopeFilter($query, array $filters){ //scope+naam functie in casu Filter
        //array filters komt uit de filter array opgehaald met search variabele (opgehaald als array)
        //oude wijze: if(isset($filters['search']) == false

        if($filters['search'] ?? false ){ //php 8!!
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

    }
}
