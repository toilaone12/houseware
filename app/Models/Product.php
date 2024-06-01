<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_product';
    protected $table = 'product';
    protected $fillable = [
        'id_category',
        'image',
        'name',
        'quantity',
        'discount',
        'price',
        'thumbnail_path',
        'description',
        'technical',
    ];
    public $timestamp = true;
}
