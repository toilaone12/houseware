<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cart';
    protected $table = 'cart';
    protected $fillable = [
        'id_account',
        'id_product',
        'image',
        'name',
        'id_color',
        'quantity',
        'price',
    ];
    public $timestamp = true;
}
