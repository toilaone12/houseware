<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    protected $table = 'order';
    protected $fillable = [
        'id_account',
        'code',
        'fullname',
        'phone',
        'address',
        'email',
        'note',
        'subtotal',
        'feeship',
        'discount',
        'total',
        'payment',
        'status',
        'is_cancel',
        'date_updated',
    ];
    public $timestamp = true;
}
