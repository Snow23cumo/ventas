@extends('layouts.admin');
@section('contenido')

<div class="row">

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Nuevo Artículo</h3>
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
    {!! Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
    {{ Form::token() }}
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="nombre">Nombre</label>
<input type="text" name="nombre" required class="form-control" placeholder="Nombre del artículo" value="{{ old('nombre') }}">
</div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="categoria">Categoría</label>
  <select name="idcategoria" class="form-control" id="">
    @foreach ($categorias as $cat)
        <option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option>
    @endforeach
  </select>
</div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

        <div class="form-group">
          <label for="codigo">Código</label>
        <input type="text" name="codigo" required class="form-control" placeholder="Código del artículo" value="{{ old('codigo') }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="stock">Stock</label>
        <input type="text" name="stock" required class="form-control" placeholder="Stock del artículo" value="{{ old('stock') }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" required class="form-control" placeholder="Descripción del artículo" value="{{ old('descripcion') }}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="imagen">Imágen</label>
        <input type="file" name="imagen" required class="form-control">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>
   
     
    {!! Form::close() !!}
  

@endsection