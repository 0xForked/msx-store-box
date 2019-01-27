<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'unique_id',
        'thumbnail',
        'fullname',
        'email',
        'birth',
    ];

    public function product()
    {
        return $this->belongsToMany(
            'App\Entities\Product',
            'product_author'
        );
    }
}