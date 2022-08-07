<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni';
    protected $fillable = [
        'dni',
        'fk_reg',
        'fk_com',
        'email',
        'name',
        'last_name',
        'address',
        'date_reg',
        'status',
    ];
}
