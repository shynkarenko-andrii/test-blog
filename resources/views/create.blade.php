@extends('layouts.app')

@section('title')
    Создать пост
@stop
@section('content')
    <div class="container">
        <div class="row">
            <h1>Создать пост</h1>
            <div id="print-error-msg">
                <ul>
                </ul>
            </div>
            <form action="{{ route('store') }}" class="form" method="post" id="form_add_post">
                {{ csrf_field() }}
                <div class="form-group @if($errors->has('title')) has-error @endif">
                    <label>Заголовок</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group @if($errors->has('content')) has-error @endif">
                    <label>Содержимое поста</label>
                    <textarea class="form-control" name="content" cols="3" rows="5">{{ old('content') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="btnSubmit">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
