@extends('adminlte::page')

@section('title', 'Categorias')

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
                        <h3 class="box-title">Editar Categoria</h3>
                    </div>
                </div>        
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="/admin/themes/update/{{$categoria->id}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        {{Form::token()}}
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                        <label for="titulo">Nombre</label>
                                        <input type="text" name="nombre" required value="{{ $categoria->name }}" class="form-control titulo" placeholder="Título..." id="titulo" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                        <label for="descripcion">Descripción</label>
                                        <textarea name="descripcion" value="{{old('descripcion')}}" class="form-control descripcion" placeholder="Descripción..." id="descripcion" rows="10" required>{{ $categoria->description }}</textarea>
                                    </div>
                                </div>               
                            </div>
                            
                            <br>
                            <br>
                            <div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary editar" type="submit" id="editar">Guardar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                    </div>
                                </div>		
                            </div>
                        <!--</form>-->
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

/*$("#editar").click(function(e){
    if(window.confirm('¿Desea editar noticia?')){
        submit();
    }else{
        e.preventDefault();
    }
});*/
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#articulo').summernote();
});
</script>
@stop