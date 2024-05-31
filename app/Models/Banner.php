<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_banner';
    protected $table = 'banner';
    protected $fillable = [
        'image',
    ];
    public $timestamp = true;
}
