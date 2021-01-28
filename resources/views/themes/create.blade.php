@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
<link rel="stylesheet" href="{{asset('css/app.css')}}"></link>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-form">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="box-title">Nueva Categoria de Noticia</h3>
                    </div>
                </div>        
                <div class="card-body">
                    <div class="col-md-12">
                    {!!Form::open(array('url'=>'admin/themes/store','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control nombre" placeholder="Nombre..." id="nombre" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" value="{{old('descripcion')}}" class="form-control descripcion" placeholder="Descripción..." id="descripcion" rows="10" required></textarea>
                                </div>
                            </div>                            
                        </div>                        
                        <br>
                        <br>
                        <div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                    <button class="btn btn-primary guardar" type="submit" id="enviar">Guardar</button>
                                    <button class="btn btn-danger" type="reset">Cancelar</button>
                                </div>
                            </div>		
                        </div>
                    {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>    
@stop

@section('css')    

@stop

@section('js')    
<script>
$("#enviar").click(function(e){
    if(window.confirm('¿Desea registrar nueva Categoria?')){
        submit();
    }else{
        e.preventDefault();
    }
});
</script>
@stop