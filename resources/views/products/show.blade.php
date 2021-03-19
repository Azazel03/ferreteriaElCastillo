@extends('adminlte::page')

@section('title', 'ElCastillo - Productos')

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
                            <h3 class="box-title">Detalle Producto</h3>
                        </div>
                    </div>        
                    <div class="card-body">
                        @foreach ($products as $product)                        
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Estado</label>
                                    @if ($product->status_product == 'S')
                                        <p><span class="badge badge-success">Activo</span></p>
                                    @else
                                        <p><span class="badge badge-danger">Inactivo</span></p>
                                    @endif
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Valor Neto</label>
                                    <p>${{ $product->neto }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Valor IVA</label>
                                    <p>${{ $product->iva }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <p>{{ $product->stock }}</p>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    @foreach ($category as $categ)
                                        <p>{{ $categ->name_category }}</p>
                                    @endforeach
                                </div>
                            </div> 
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    @if ($product->image != null && $product->image != '.-')
                                        <td><img src="{{asset('img/'.$product->image)}}" width="300" height="300"></td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </div>
                            </div> 
                        </div>  
                        @endforeach               
                        <br>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">                               
                                <a href="../products"><button class="btn btn-success">Volver</button></a>
                            </div>
                        </div>                           
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