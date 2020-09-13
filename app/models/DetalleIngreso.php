<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    // nombre de la tabla en db
    protected $table = 'detalle_ingreso';

    // campos

    protected $primaryKey = 'iddetalle_ingreso';
    public $timestamps = false;

    protected $fillable = [
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];

    protected $guarded = [];
}
