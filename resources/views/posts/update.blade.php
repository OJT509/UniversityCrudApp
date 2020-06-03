<!--Edit a post layout-->
@extends('layouts/app')

@section('content')
    <!--Enabled error messages if fields are left blank-->
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container">
        <h1>{{ __('messages.editapost') }}</h1>
        <!--Utilising laravelcollective.com forms and buttons etc-->
        {!! Form::open(['action'=>['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title', __('messages.title'))}}
                {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>__('messages.entertitle')])}}
            </div>
            <div class="form-group">
                {{Form::label('comment', __('messages.comment'))}}
                {{Form::textarea('comment', $post->text, ['class'=>'form-control', 'placeholder'=>__('messages.entertext')])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('messages.submitpost'), ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    
@endsection