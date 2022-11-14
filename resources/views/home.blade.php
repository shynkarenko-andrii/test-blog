@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{route('create')}}" role="button">Создать пост</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">
                            @foreach($posts as $post)
                                <a href="{{route('post.show', ['id' => $post->id])}}"
                                   class="list-group-item list-group-item-action">{{$post->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
