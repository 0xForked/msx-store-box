<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'date',
        'ref_id',
        'no_order',
        'tr_status',
        'notes',
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