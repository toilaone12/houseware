<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detail';
    protected $table = 'detail_order';
    protected $fillable = [
        'id_order',
        'id_product',
        'code',
        'image',
        'name',
        'id_color',
        'quantity',
        'price',
    ];
    public $timestamp = true;
}
