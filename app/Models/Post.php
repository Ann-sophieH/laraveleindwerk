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
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'body_short', 'body_long', 'blockquote', 'sticky', 'active'];

    public function user()
    {
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

    public function postcomments()
    {
        return $this->hasMany(Comment::class);
    }

    /**:filtering**/
    public function scopeFilter($query, array $filters)
    { //scope+naam functie in casu Filter
        //array filters komt uit de filter array opgehaald met search variabele (opgehaald als array)
        //oude wijze: if(isset($filters['search']) == false

        if ($filters['search'] ?? false) { //php 8!!
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body_long', 'like', '%' . request('search') . '%')
                ->orWhere('body_short', 'like', '%' . request('search') . '%')
                ->orWhereHas('user', function ($query) { //query tussentabel
                    $query->where('username', 'like', '%' . request('search') . '%');
                    $query->orWhere('first_name', 'like', '%' . request('search') . '%');
                    $query->orWhere('last_name', 'like', '%' . request('search') . '%');

                })
                ->orWhereHas('category', function ($query) { //query tussentabel
                    $query->where('name', 'like', '%' . request('search') . '%');


                });


        }
    }
}
