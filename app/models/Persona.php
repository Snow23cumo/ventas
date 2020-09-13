<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // nombre de la tabla en db
    protected $table = 'persona';

    // campos

    protected $primaryKey = 'idpersona';
    public $timestamps = false;

    protected $fillable = [
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email'
    ];

    protected $guarded = [];
}
