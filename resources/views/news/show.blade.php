@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
<link rel="stylesheet" href="{{asset('css/app.css')}}"></link>
<script src="{{asset('js/app.js')}}"></script>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-form">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="box-title">Nueva Noticia</h3>
                        </div>
                    </div>        
                    <div class="card-body">
                        @foreach ($newspaper as $noticias)
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <p>{{ $noticias->title }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        @if ($noticias->estado == 'S')
                                            <p>Activo</p>
                                        @else
                                            <p>Inactivo</p>
                                        @endif    
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <p>{{ $noticias->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Artículo</label>
                                        <p>{!! $noticias->article !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        @if ($noticias->image != null or $noticias->image != '')
                                            <td><img src="{{asset('img/'.$noticias->image)}}" width="300" height="300"></td>
                                        @else
                                            <td>n/a</td>
                                        @endif
                                    </div>
                                </div>                                
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Banner Inicio</label>
                                        @if ($noticias->inicio == 'S')
                                            <p>Si</p>
                                        @else
                                            <p>No</p>
                                        @endif 
                                    </div>
                                </div>                               
                            </div>                
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">                               
                                    <a href="../news"><button class="btn btn-success">Volver</button></a>
                                </div>
                            </div>
                        @endforeach    
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

@stop