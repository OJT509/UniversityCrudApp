<!--The page layout for creating a post-->
@extends('layouts/app')

@section('content')
    <div class="container">
        <!--Enabled error messages if fields are left blank-->
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <h1>{{ __('messages.makepost') }}</h1>
        <!--Utilising laravelcollective.com forms and buttons etc-->
        {!! Form::open(['action'=>'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title', __('messages.title'))}}
                {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>__('messages.entertitle')])}}
            </div>
            <div class="form-group">
                {{Form::label('comment', __('messages.comment'))}}
                {{Form::textarea('comment', '', ['class'=>'form-control', 'placeholder'=>__('messages.entertext')])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit(__('messages.submitpost'), ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection