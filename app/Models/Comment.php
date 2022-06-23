<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',

        'user_id',
        'body',
        'parent_id',
        'is_active'
    ];
    public function comments(){
        return $this->hasMany(Comment::class, 'parent_id');//reads id
    }
    //recursive function
    public function childcomments(){ // only reads parent_id table to read records
        return $this->hasMany(Comment::class, 'parent_id')->with('comments' );//->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
   /* public function replies(){
        return $this->hasMany(Reply::class);
    }*/
   /* public function postcommentreplies(){
        // return $this->hasMany(PostCommentReply::class);
    }*/
}
