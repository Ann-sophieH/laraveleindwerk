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
        'address_type'
    ];


    public function users(){
        return $this->belongsToMany(User::class , 'address_user');

    }
    public function addresstype(){
        return $this->belongsTo(Addresstype::class);
    }
    public function order(){
        return $this->hasOne(Order::class);
    }


    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false ){ //only works since php 8!! older project : if(isset($filters['search']) == false
            $query->where('name_recipient', 'like', '%' . request('search') . '%')
                ->orWhere('addressline_1', 'like', '%' . request('search') . '%')
                ->orWhere('addressline_2', 'like', '%' . request('search') . '%')
                ->orWhereHas('users', function ($query){ //query tussentabel
                    $query->where('username', 'like', '%' . request('search') .'%');
                    $query->orWhere('first_name', 'like', '%'. request('search') .'%');
                    $query->orWhere('last_name', 'like', '%' . request('search') .'%');

                })

            ;


        }
    }
}
