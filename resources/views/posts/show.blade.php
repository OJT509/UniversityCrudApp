@extends('layouts/app')
<!--Used for a more specific view of the content-->
@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <img class="showimg" src="/storage/cover_images/{{$post->cover_image}}" alt="no_image">
        <br><br>
        <h5>{{ __('messages.by') }} {{$post->user->name}}</h5>
        <div>
            {{$post->text}}
        </div>
        <div class="timestamp">
            <p>{{ __('messages.createdon') }} {{$post->created_at->format('d-m-y') }}</p>
            <p>{{ __('messages.lastupdated') }} {{$post->updated_at->format('d-m-y') }}</p>
        </div>
        <!--Authorisation for if a user is not a guest to be able to edit posts --> 
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" role="button">{{ __('messages.editpost') }}</a>

                <!--Spoofing _method as followed by instructions via laravelcollective -->
                <div style="float: right;">
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit(__('messages.deletepost'), ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                </div>
            @endif
        @endif
    </div>
@endsection