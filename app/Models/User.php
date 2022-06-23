<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;
    use softDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function photos()
    {
        return $this->morphToMany(Photo::class, 'photoable');
        //users could have multiple pics, for pfp/tables always latest added chosen
    }
    public function addresses(){
        return $this->belongsToMany(Address::class, 'address_user');

    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function newsletter(){
        return $this->belongsTo(Newsletter::class);
    }


    public function socialiteLogin(){
        return $this->hasMany(SocialiteLogin::class);
    }
    public function isAdmin(){
        foreach ($this->roles as $role){
            if($role->name == 'administrator' && $this->is_active == 1){
                return true;
            }
        }
    }
    public function isAuthor(){
        foreach ($this->roles as $role){
            if($role->name == 'author' && $this->is_active == 1){
                return true;
            }
        }
    }
    public function isClient(){
        foreach ($this->roles as $role){
            if($role->name == 'client' ){
                return true;
            }
        }
    }
    public function scopeFilter($query, array $filters){ //scope+name function = Filter
        //array filters komt uit de filter array opgehaald met search variabele (opgehaald als array)
        //oude wijze: if(isset($filters['search']) == false

        if($filters['search'] ?? false ){ //php 8!!
            $query->where('username', 'like', '%' . request('search') . '%')
                ->orWhere('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');


        }

    }
}
