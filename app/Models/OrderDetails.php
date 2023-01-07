<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primaryKey = 'order_id';
    
    // public $timestamps = false;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];
    protected $filltable = ['order_id', 'product_id', 'quantity', 'price'];
}
