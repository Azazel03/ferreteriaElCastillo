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
                        <h3 class="box-title">Editar Noticia</h3>
                    </div>
                </div>        
                <div class="card-body">
                    <div class="col-md-12">
                    
                        <form action="/admin/news/update/{{$noticias->id}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        {{Form::token()}}
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" required value="{{ $noticias->title }}" class="form-control titulo" placeholder="Título..." id="titulo" required>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                        <label for="articulo">Artículo</label>
                                        <textarea name="articulo" class="form-control articulo" placeholder="Artículo..." id="articulo" rows="10" required>{{ $noticias->article }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group {{ $errors->has('valorizacion_manual') ? ' has-error' : '' }}">
                                            <label for="inicio">Banner Inicio</label>
                                            <select name="inicio" class="form-control inicio" id="inicio" required>
                                                @if ($noticias->inicio == "S")                                                
                                                    <option value="S" selected>Si</option>
                                                    <option value="N">No</option>
                                                @else
                                                    <option value="S">Si</option>
                                                    <option value="N" selected>No</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group {{ $errors->has('tecnico') ? ' has-error' : '' }}">
                                            <label for="categoria">Categoria</label>
                                            <select name="categoria" class="form-control categoria" required id="categoria">
                                                <option value="">Seleccioné Categoria</option>
                                                @foreach ($categorias as $categ)
                                                    @if ($categ->id == $noticias->theme)
                                                        <option value="{{$categ->id.'_'.$categ->name}}" selected>{{$categ->name}}</option>
                                                    @else
                                                        <option value="{{$categ->id.'_'.$categ->name}}">{{$categ->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
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
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <label for="categoria">Imagen en Base de Datos</label>
                                    <img src="{{asset('img/'.$noticias->image)}}" width="300" height="300">
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
                        </form>
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
        $('#articulo').summernote({
    height: 200,                 // set editor height
  });
});
</script>
@stop