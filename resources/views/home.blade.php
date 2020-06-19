@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">

                    <form action="{{route('add-post.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control @if($errors->has('title'))  border-danger @endif" name="title" value="{{old('title')}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control @if($errors->has('text'))  border-danger @endif" id="text" name="text" rows="3">{{ old('text') }}</textarea>
                            @error('text')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-sm">Add new post</button>
                        </div>

                    </form>

                    <hr>

                    <div class="list-group p-2">
                        @forelse($posts as $post)
                            <div>
                                <a href="{{route('post.show',$post->id)}}" class="list-group-item list-group-item-action">
                                    <div class="text-black-50">
                                        Post created by {{ $post->user->name }}
                                    </div>
                                    {{$post->title}}
                                    @can('delete', $post)
                                    <div>
                                        <form action="{{route('post.delete',$post->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm">Delete post</button>
                                        </form>
                                    </div>
                                        @endcan
                                </a>
                            </div>

                        @empty
                            <p>There are no posts yet</p>
                        @endforelse
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
