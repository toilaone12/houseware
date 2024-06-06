<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_review';
    protected $table = 'review';
    protected $fillable = [
        'id_product',
        'id_account',
        'fullname',
        'rating',
        'review',
        'id_reply',
        'is_update',
    ];
    public $timestamp = true;
}
