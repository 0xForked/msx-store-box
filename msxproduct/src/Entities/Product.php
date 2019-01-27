<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'unique_id',
        'thumbnail',
        'title',
        'description',
        'language',
        'pages',
        'year',
        'price',
        'publisher',
        'published_date',
        'isbns'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function author()
    {
        return $this->belongsToMany(
            'App\Entities\Author',
            'product_author'
        );
    }

    public function category()
    {
        return $this->belongsToMany(
            'App\Entities\Category',
            'product_category'
        );
    }

}