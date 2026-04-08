<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Point;


class Map extends Model
{
    protected $primaryKey = 'mapId';

    public function mapsPoints()
    {
        // Usamos hasMany para obtener la colección completa
        return $this->hasMany(Point::class, 'pointMapId', 'mapId');
    }
}
