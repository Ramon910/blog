@extends('admin.layouts.layout')

@section('header')
    <h1>
        POSTS
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
    @if($post->photos->count())
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">

                            @foreach($post->photos as $photo)
                                {!! Form::open(['route' => ['admin.photos.destroy', $photo], 'method' => 'DELETE']) !!}
                                <!--<form action="{{ route('admin.photos.destroy', $photo) }}" method="POST">
                                    {{ csrf_field() }}{{ method_field('DELETE') }} -->
                                    <div class="col-md-2">
                                        {{ Form::bsSubmit('<i class="fa fa-remove">', ['class' => 'btn btn-danger btn-xs', 'style' => '"position: absolute"']) }}
                                        <!--<button class="btn btn-danger btn-xs" style="position: absolute;"><i class="fa fa-remove"></i> -->
                                        <img src="{{ Storage::url($photo->url) }}" class="img-responsive">
                                    </div>
                                <!-- </form> -->
                                {!! Form::close() !!}
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        {!! Form::model($post,['route' => ['admin.posts.update', $post], 'method' => 'PUT']) !!}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

                            {{ Form::bsText('title',
                                            'Titulo del posts',
                                             old('title', $post->title) ,
                                             ['placeholder' => 'Escribe aqui el titulo'])}}

                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            {{ Form::bsTextArea('body',
                                                'Contenido de la publicacion',
                                                 old('body', $post->body),
                                                 ['id' => 'editor',
                                                 'class'=> 'form-control',
                                                 'rows' => '10',
                                                 'placeholder' => 'Escribe el contenido de la publicacion'
                                                 ] ) }}
                            <!--<label for="">Contenido de la publicación</label>
                            <textarea name="body" id="editor"
                                      class="form-control" rows="10"
                                      placeholder="Escribe el contenido de la publicación">{{ old('body', $post->body) }}</textarea>-->
                            {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
                            {{ Form::bsTextArea('iframe',
                                                'Audio o video de la publicacion',
                                                 old('iframe', $post->iframe),
                                                 ['class'=> 'form-control',
                                                 'rows' => '2',
                                                 'placeholder' => 'Escribe el contenido de la publicacion'
                                                 ] ) }}
                            <!--<label>Audio o video de la publicación</label>
                            <textarea name="iframe"
                                      class="form-control" rows="2"
                                      placeholder="Escribe el contenido de la publicación">{{ old('iframe', $post->iframe) }}</textarea>-->
                            {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group date">
                                {{ Form::bsText('published_at',
                                                'Fecha de publicacion',
                                                old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null),
                                                 ['class' => 'form-control pull-right',
                                                  'id' => 'datepicker'])}}
                                <!--<label>Fecha de publicación:</label>
                                <input type="text" name="published_at"
                                       value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
                                       class="form-control pull-right"
                                       id="datepicker">-->
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                           <!-- {{ Form::bsSelect('category_id', ['L'=> 'large'], '',['class' => 'form-control select2']) }}-->
                            <label for="">Categorías</label>
                            <select name="category_id" class="form-control select2">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                            <label>Etiquetas</label>
                            <select name="tags[]"
                                    class="form-control select2" multiple="multiple"
                                    data-placeholder="Selecciona una o más etiquetas"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                            {{ Form::bsTextArea('excerpt',
                                                'Extracto de la publicacion',
                                                 old('excerpt', $post->excerpt),
                                                 ['class'=> 'form-control',
                                                  'rows' => '5'
                                                 ])}}
                           <!-- <label for="">Extracto de la publicación</label>
                            <textarea name="excerpt" class="form-control"
                            >{{ old('excerpt', $post->excerpt) }}</textarea>-->
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">

                            <div class="dropzone">

                            </div>

                        </div>

                        <div class="form-group">
                            {{ Form::bsSubmit('Guardar Publicacion', ['class'=>'btn btn-primary btn-block']) }}
                            <!--<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>-->
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $('#datepicker').datepicker({
            autoclose: true
        })
        CKEDITOR.replace('editor')
        $('.select2').select2({

            tags: true

        })

        var myDropzone = new Dropzone('.dropzone', {

            url: '/admin/posts/{{ $post->slug }}/photos',
            acceptedFiles: 'image/*',
            paramName: 'photo',
            maxFilesize: 2,
            dictDefaultMessage: 'Arrastra aquí tus fotos para la subida',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

        });
        myDropzone.on('error', function(file, res) {

            var msg = res.errors.photo[0];
            $('.dz-error-message:last > span').text(msg);

        });
        Dropzone.autoDiscover = false;
    </script>
@endpush