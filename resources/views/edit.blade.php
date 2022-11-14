@extends('layouts.app')

@section('title')
    Редактировать пост
@stop
@section('content')
    <div class="container">
        <div class="row">
            <h1>Редактировать пост</h1>
            <form action="{{ route('update', ['id' => $post->id ]) }}" class="form" method="post">
                {{ csrf_field() }}
                <div class="form-group @if($errors->has('title')) has-error @endif">
                    <label>Заголовок</label>
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group @if($errors->has('content')) has-error @endif">
                    <label>Содержимое поста</label>
                    <textarea class="form-control" name="content" cols="3" rows="5">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
