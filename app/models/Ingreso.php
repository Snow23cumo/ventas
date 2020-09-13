<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    // nombre de la tabla en db
    protected $table = 'ingreso';

    // campos

    protected $primaryKey = 'idingreso';
    public $timestamps = false;

    protected $fillable = [
        'idproveedor',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
    ];

    protected $guarded = [];
}
