<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [ 
        'shoe_id',
        'users_id',
        'payment_total',
        'payment_date'
    ];
}