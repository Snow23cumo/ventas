<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    // nombre de la tabla en db
    protected $table = 'venta';

    // campos

    protected $primaryKey = 'idventa';
    public $timestamps = false;

    protected $fillable = [
        'idcliente',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'
    ];

    protected $guarded = [];
}
