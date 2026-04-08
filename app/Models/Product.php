<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\category;
use App\Models\Gallery;
use App\Models\Image;


class Product extends Model
{
    protected $primaryKey = 'productId';

    public function getCategoria() : BelongsTo
    {
        return $this->belongsTo(category::class, 'productCategoryId', 'categoryId');
    }

    public function getGallery() : BelongsTo
    {
        return $this->belongsTo(Gallery::class, 'productGalleryId', 'galleryId');
    }

    // Relación directa a la primera imagen (Muy útil para la portada)
    public function portada()
    {
        // Usamos hasOne a través de la relación de galería
        return $this->hasOne(Image::class, 'imageGalleryId', 'productGalleryId')->oldest();
    }

    public function imagenes()
    {
        // Usamos hasMany para obtener la colección completa
        return $this->hasMany(Image::class, 'imageGalleryId', 'productGalleryId')->orderBy('imagePosition', 'asc');
    }

    /**
     * Relación para obtener los productos relacionados.
     */
    public function relacionados()
    {
        return $this->belongsToMany(
            Product::class,              // El modelo relacionado (él mismo)
            'related_products',           // El nombre de tu tabla pivote
            'relatedProductOriginalId',  // FK del producto que consultas
            'relatedProductRelatedId'    // FK del producto relacionado
        )->with(['portada','getCategoria']);            // Cargamos automáticamente la portada de cada uno
    }

}
