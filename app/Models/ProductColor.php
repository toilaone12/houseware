<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'product_color';
    protected $fillable = [
        'id_product',
        'color_path',
    ];
    public $timestamp = true;
}
