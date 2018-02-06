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
                    <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div
@endsection