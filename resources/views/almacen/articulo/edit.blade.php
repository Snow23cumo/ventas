@extends('layouts.admin');
@section('contenido')

<div class="row">

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar Artículo: {{ $articulo->nombre }}</h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
</div>
</div>
    {!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true']) !!}

    {{ Form::token() }}
    
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="nombre">Nombre</label>
<input type="text" name="nombre" required class="form-control" value="{{ $articulo->nombre }}">
</div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="categoria">Categoría</label>
  <select name="idcategoria" class="form-control" id="">
    @foreach ($categorias as $cat)
    @if ($cat->idcategoria==$articulo->idcategoria)
    <option value="{{ $cat->idcategoria }}" selected>{{  $cat->nombre }}</option>
    @else
    <option value="{{ $cat->idcategoria }}">{{  $cat->nombre }}</option>
    @endif
        
    @endforeach
  </select>
</div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

        <div class="form-group">
          <label for="codigo">Código</label>
        <input type="text" name="codigo" required class="form-control"  value="{{ $articulo->codigo }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="stock">Stock</label>
        <input type="text" name="stock" required class="form-control" value="{{ $articulo->stock }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" required class="form-control" placeholder="Descripción del artículo" value="{{ $articulo->descripcion }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="imagen">Imágen</label>
        <input type="file" name="imagen" class="form-control">
        @if (($articulo->imagen)!="")
            <img src="{{ asset('imagenes/articulos/'.$articulo->imagen) }}" alt="{{ $articulo->nombre }}" height="250px" width="250px">
        @endif
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
         <a href="almacen/articulos"> <button class="btn btn-danger" type="#">Cancelar</button></a>
        </div>
      </div>
    </div>
    {!! Form::close() !!}


@endsection