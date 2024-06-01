<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_coupon';
    protected $table = 'coupon';
    protected $fillable = [
        'name',
        'code',
        'quantity',
        'type',
        'discount',
        'expiration',
    ];
    public $timestamp = true;
}
