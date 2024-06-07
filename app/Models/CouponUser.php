<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'coupon_user';
    protected $fillable = [
        'id_account',
        'id_coupon',
    ];
    public $timestamp = true;
}
