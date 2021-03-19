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
            <div class="card card-form">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="box-title">Nuevo Producto</h3>
                    </div>
                </div>        
                <div class="card-body">
                    <div class="col-md-12">
                    {!!Form::open(array('url'=>'admin/products/store','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                    {{Form::token()}}
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" required value="{{old('name')}}" class="form-control name" placeholder="Nombre..." id="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" value="{{old('description')}}" class="form-control description" placeholder="Descripción..." id="description" rows="10" required></textarea>
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
                                            @foreach ($categories as $categ)
                                                <option value="{{$categ->idcategory}}">{{$categ->name_category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                                
                            </div>                                
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group {{ $errors->has('neto') ? ' has-error' : '' }}">
                                    <label for="neto">Valor Neto</label>
                                    <input type="text" name="neto" required value="{{old('neto')}}" class="form-control neto" placeholder="Valor Neto..." id="neto" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
                                <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" required value="{{old('stock')}}" class="form-control stock" id="stock" required>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">    
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')    
<script>
$("#neto").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

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

$("#enviar").click(function(e){
    if(window.confirm('¿Desea registrar nuevo Producto?')){
        submit();
    }else{
        e.preventDefault();
    }
});
</script>
@stop