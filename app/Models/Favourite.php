<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_favourite';
    protected $table = 'favourite';
    protected $fillable = [
        'id_account',
        'product_path',
    ];
    public $timestamp = true;
}
