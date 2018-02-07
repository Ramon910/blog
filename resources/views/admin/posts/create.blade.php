@extends('admin.layouts.layout')

@section('header')
    <h1>
        Posts
            <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box box-body">
                        <div class="form-group">
                            <label for="">Titulo de la publicación</label>
                            <input type="text" name="title" class="form-control" placeholder="Escribe el titulo">
                        </div>
                        <div class="form-group">
                            <label for="">Cuerpo de la publicación</label>
                            <textarea id="editor" class="form-control" name="body" rows="10" placeholder="Escribe el contenido"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box box-body">
                        <!-- Date -->
                        <div class="form-group">
                            <label>Fecha de publicación:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="">Categorias</label>
                            <select name="category_id" class="form-control">
                                <option value="">Elegir Categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Etiquetas</label>
                            <select name="tags[]"
                                    class="form-control select2"
                                    multiple="multiple"
                                    data-placeholder="selecciona una o mas etiquetas"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Estracto de la publicación</label>
                            <textarea name="excerpt" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <!-- bootstrap datepicker -->
    <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- CK Editor -->
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
    $('#datepicker').datepicker({
    autoclose: true
    })
    CKEDITOR.replace('editor')
    $('.select2').select2()
    </script>

@endpush












