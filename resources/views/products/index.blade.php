@extends('adminlte::page')

@section('title', 'ElCastillo - Productos')

@section('content_header')
<link rel="stylesheet" href="{{asset('css/app.css')}}"></link>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Información Productos</h5>
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary" class="btn-agregar-producto" id="btn-agregar-producto"><span class="fa fa-plus"></span> Agregar Producto</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered mydatatable" id="mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Neto</th>
                                            <th>IVA</th>
                                            <th>Stock</th>
                                            <th>Imagen</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $producto)          
                                        <tr>
                                            <td>{{ $producto->name }}</td>
                                            <td>{{ $producto->description }}</td>
                                            <td>${{ $producto->neto }}</td>
                                            <td>${{ $producto->iva }}</td>
                                            <td>{{ $producto->stock }}</td>
                                            @if ($producto->image != null && $producto->image != '.-')
                                                <td><img src="{{asset('img/'.$producto->image)}}" width="60" height="60"></td>
                                            @else
                                                <td>n/a</td>
                                            @endif                                            
                                            <td><a href="{{url('admin/products',$producto->idproduct)}}"><button class="btn btn-success">Detalles</button></a> <a href="{{url('admin/products/edit',$producto->idproduct)}}"><button class="btn btn-warning">Editar</button></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Neto</th>
                                            <th>IVA</th>
                                            <th>Stock</th>
                                            <th>Imagen</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <link rel="stylesheet" href="{{asset('css/datatables/bootstrap-v4.3.1.min.css')}}"></link>
    <link rel="stylesheet" href="{{asset('css/datatables/bootstrap4.min.css')}}"></link>
    <link rel="stylesheet" href="{{asset('css/datatables/jquery.dataTables.min.css')}}"></link>
    <link rel="stylesheet" href="{{asset('css/datatables/responsive.dataTables.min.css')}}"></link>
@stop

@section('js')    
    <script src="{{asset('js/datatables/popper-datatables.min.js')}}"></script>
    <script src="{{asset('js/datatables/bootstrap-datatables.min.js')}}"></script>
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.responsive.min.js')}}"></script> 
    <script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $('.mydatatable').DataTable({
            responsive: true,
            dom: "Bfrtip",
        });
    </script>
@stop