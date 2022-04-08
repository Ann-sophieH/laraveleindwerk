<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name_recipient',
        'addressline_1',
        'addressline_2',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
        //1 address can in reality have multiple users, to keep errors w shipping addresses to a low
        //the user from the same address will just have to repeat it
        //catches user error in filling in the address fields
    }


    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false ){ //only works since php 8!! older project : if(isset($filters['search']) == false
            $query->where('name_recipient', 'like', '%' . request('search') . '%')
                ->orWhere('addressline_1', 'like', '%' . request('search') . '%')
                ->orWhere('addressline_2', 'like', '%' . request('search') . '%');


        }
    }
}
