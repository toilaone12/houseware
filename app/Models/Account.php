<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_account';
    protected $table = 'account';
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'phone',
        'address',
        'password',
        'id_role',
        'is_online'
    ];
    public $timestamp = true;
}
