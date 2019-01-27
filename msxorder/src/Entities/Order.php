<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'date',
        'no_order',
        'transaction_id',
        'product',
        'notes',
        'qty',
        'price',
        'brutto',
        'disc',
        'netto',
        'tax',
        'total',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

}