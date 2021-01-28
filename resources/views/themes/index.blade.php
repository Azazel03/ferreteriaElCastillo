@extends('adminlte::page')

@section('title', 'Categoria Noticias')

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
                        <h5 class="card-title">Información Categorias Noticias</h5>
                        <a href="{{ url('admin/themes/create') }}" class="btn btn-primary" class="btn-agregar-noticia" id="btn-agregar-noticia"><span class="fa fa-plus"></span> Agregar Categoria</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered mydatatable" id="mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($themes as $categorias)          
                                        <tr>
                                            <td>{{ $categorias->name }}</td>
                                            <td>{{ $categorias->description }}</td>
                                            @if ($categorias->estado == 'S')
                                                <td><span class="badge badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Inactivo</span></td>
                                            @endif
                                            <td><a href=""><button class="btn btn-danger">Editar</button></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
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