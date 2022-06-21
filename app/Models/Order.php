<?php

namespace App\Models;

use App\Http\Controllers\AdminRolesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'user_id',
        'address_id',
        'coupon_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderdetails()
    {
        return $this->hasMany(Orderdetail::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }



}
