
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    {!! Form::open(['route' => ['admin.posts.store', '#create'], 'method' => 'POST']) !!}
    <!--<form action="{{ route('admin.posts.store', '#create') }}" method="POST">-->
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Titulo  de la nueva publicacion</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                        {{ Form::bsText('title',
                                        '',
                                        old('title'),
                                        ['class' => 'form-control',
                                         'id' => 'post-title',
                                         'placeholder' => 'Escribe el titulo',
                                         'required',
                                         'autofocus'
                                         ])}}
                        <!--<input id="post-title"
                               type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               placeholder="Escribe el titulo"
                               required
                               autofocus
                        >-->
                        {!! $errors->first('title', '<span clas="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::bsSubmit('Cerrar', ['class'=>'btn btn-default pull-left', 'data-dismiss' => 'modal']) }}
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
                    {{ Form::bsSubmit('Crear Publicacion', ['class'=>'btn btn-primary']) }}
                    <!--<button class="btn btn-primary">Crear Publicacion</button>-->
                </div>
            </div>
        </div>
    {{ Form::close() }}
    <!--</form>-->
</div>

@push('scripts')
    <script>
        if(window.location.hash === '#create'){
            $('#post-title').focus();
            $('#myModal').modal('show');
        }

        $('#myModal').on('hide.bs.modal', function () {
            window.location.hash = '#';
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush











