<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     // nombre de la tabla en db
     protected $table = 'categoria';

     // campos
 
     protected $primaryKey = 'idcategoria';
     public $timestamps = false;
 
     protected $fillable = [
         'nombre',
         'descripcion',
         'condicion'
     ];
 
     protected $guarded = [
     ];
}
