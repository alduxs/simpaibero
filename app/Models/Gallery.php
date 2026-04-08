<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\Image;


class Gallery extends Model
{
    protected $primaryKey = 'galleryId';
/*
     public function getProduct() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'galleryProductId', 'productId');
    }*/
    public function getImagenes()
    {
        return $this->hasMany(Image::class, 'galleryId');
    }
}
