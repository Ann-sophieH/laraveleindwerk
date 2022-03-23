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


    public function users(){
        return $this->hasMany(User::class); //or hasmany als
    }
}
