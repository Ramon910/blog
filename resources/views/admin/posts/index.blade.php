@extends('admin.layouts.layout')

@section('header')
    <h1>
        Posts
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Posts</li>
    </ol>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de publicaciones</h3>
            <button class="btn btn-primary pull-right " data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i>
                Crear publicacion
            </button>
        </div>
    <div class="box-body">
        <table id="posts-table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>EXTRACTO</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->excerpt}}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" target="_blank" class="btn btn-xs btn-default">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger"
                                onclick="return confirm('¿Seguro que quiere eliminar esta publicacion?')">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endpush
