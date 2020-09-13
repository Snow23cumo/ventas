<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    // nombre de la tabla en db
    protected $table = 'articulo';

    // campos

    protected $primaryKey = 'idarticulo';
    public $timestamps = false;

    protected $fillable = [
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];

    protected $guarded = [
    ];
}
