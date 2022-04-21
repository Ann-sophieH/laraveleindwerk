<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresstype extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_type'
    ];

    public function addresses(){
        $this->hasMany(Address::class);
    }
}
