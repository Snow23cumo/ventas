<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    // nombre de la tabla en db
    protected $table = 'detalle_venta';

    // campos

    protected $primaryKey = 'iddetalle_venta';
    public $timestamps = false;

    protected $fillable = [
        'idventa',
        'idarticulo',
        'cantidad',
        'precio_venta',
        'descuento'
    ];

    protected $guarded = [];
}
