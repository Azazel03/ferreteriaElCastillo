@extends('adminlte::page')

@section('title', 'ElCastillo - Productos')

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
                        <h3 class="box-title">Editar Producto</h3>
                    </div>
                </div>        
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{url('admin/products/update',$product->idproduct)}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        {{Form::token()}}
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" required value="{{ $product->name }}" class="form-control name" placeholder="Nombre..." id="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description">Descripción</label>
                                        <textarea name="description" class="form-control description" placeholder="Descripción..." id="description" rows="10" required>{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">                                
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group {{ $errors->has('categoria') ? ' has-error' : '' }}">
                                            <label for="categoria">Categoria</label>
                                            <select name="categoria" class="form-control categoria" required id="categoria">
                                                <option value="">Seleccioné Categoria</option>
                                                @foreach ($categorias as $categ)
                                                    @if ($categ->idcategory == $product->idcategory)
                                                        <option value="{{$categ->idcategory}}" selected>{{ $categ->name_category }}</option>
                                                    @else
                                                        <option value="{{$categ->idcategory}}">{{ $categ->name_category }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                
                                </div>                                
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group {{ $errors->has('neto') ? ' has-error' : '' }}">
                                        <label for="neto">Valor Neto</label>
                                        <input type="text" name="neto" required value="{{ $product->neto }}" class="form-control neto" placeholder="Valor Neto..." id="neto" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
                                    <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" required value="{{ $product->stock }}" class="form-control stock" id="stock" required>
                                    </div>
                                </div>                                
                            </div>                            
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
                                    <div class="form-group {{ $errors->has('status_product') ? ' has-error' : '' }}">
                                        <label for="status_product">Estado</label>
                                        <select name="status_product" class="form-control status_product" required id="status_product">
                                            <option value="">Seleccioné Estado</option>
                                            @if ($product->status_product == 'S')
                                                <option value="S" selected>Activo</option>
                                                <option value="N">Inactivo</option>
                                            @else
                                                <option value="S">Activo</option>
                                                <option value="N" selected>Inactivo</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <br>    
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group {{ $errors->has('imagen') ? ' has-error' : '' }}">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-group">
                                    </div>
                                    <div id="imagePreview"></div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary editar" type="submit" id="editar">Editar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                    </div>
                                </div>		
                            </div>
                        </form>
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
(function(){
	function filePreview(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#imagePreview').html("<img src='"+e.target.result+"' id='imagen_cargada'/>");
			}
		}
		reader.readAsDataURL(input.files[0]);
	}
	$('#imagen').change(function(){
		filePreview(this);
	});
	$('#reset').click(function(e){
		$('#imagePreview').html("<img src='' id='imagen_cargada'/>");
	});
})();


</script>
@stop