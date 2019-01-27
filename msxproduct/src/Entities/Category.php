<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'desc',
    ];

    public function product()
    {
        return $this->belongsToMany(
            'App\Entities\Product',
            'product_category'
        );
    }

}