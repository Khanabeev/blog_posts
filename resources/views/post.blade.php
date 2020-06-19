@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/home">Back</a>
                <div class="card">
                    <div class="card-header font-weight-bold text-uppercase text-center">{{$post->title}}</div>

                    <div class="card-body">
                        <h5>Author: {{$post->user->name}}</h5>
                        <hr>
                        <p>{{$post->text}}</p>
                    </div>

                    <div class="card-footer">
                        @auth
                        <form action="{{route('reply.store',$post->id)}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="reply">Add reply</label>
                                <textarea class="form-control @if($errors->has('reply'))  border-danger @endif" id="reply" name="reply" rows="3">{{ old('reply') }}</textarea>
                                @error('reply')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info btn-sm">Submit</button>
                            </div>

                        </form>
                        @endauth


                        <div>
                            Replies:
                        </div>
                        <ul class="list-group">
                            @if($post->replies->count())
                                @foreach($post->replies as $reply)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-black-50">{{$reply->user->name}}</span>
                                            @if($reply->isBestReply())
                                            <span class="text-info">Best reply!!!</span>
                                            @endif
                                        </div>
                                        {{$reply->text}}
                                        @can('update',$post)
                                        <div class="mt-3">
                                            <form action="{{route('best-reply.store',$reply->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-outline-info" type="submit">Best reply?</button>
                                            </form>
                                        </div>
                                            @endcan
                                    </li>
                                @endforeach
                            @else
                                <p>There is no reply yet...</p>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
