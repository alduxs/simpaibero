<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $primaryKey = 'relatedProductId';

    public function product()
    {
        // El segundo parámetro es la llave foránea en RelatedProduct
        // El tercero es la llave primaria en Product
        return $this->belongsTo(Product::class, 'relatedProductRelatedId', 'productId');
    }

}
