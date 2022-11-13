@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{route('post.edit', ['id' => $post->id])}}" role="button">Edit</a>
                        <a class="btn btn-primary" href="{{route('post.delete', ['id' => $post->id])}}" role="button">Delete</a>
                    </div>

                    <div class="card-body">
                        <p>{{$post->content}}</p>
                    </div>
                    <div class="card-footer">
                        <p>{{$post->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
