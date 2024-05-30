<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_color';
    protected $table = 'color';
    protected $fillable = [
        'name',
    ];
    public $timestamp = true;
}
