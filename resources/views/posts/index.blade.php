<!--THIS PAGE IS NO LONGER USED PLEASE IGNORE-->
@extends('layouts/app')

@section('content')
    @if(count($posts) > 0)
    @foreach($posts as $p)
        <div>
            <!--Loops through all of the car titles to display and then you can click on it taking you to the "show" route for more information-->
            <h3><a href="/posts/{{$p->id}}">{{$p->title}}</a></h3>
            <p>Written on {{$p->created_at}}</p>
            <p>By {{$p->user->name}}</p>
        </div>
    @endforeach
    @else
    <p>No posts found!</p>
    @endif
@endsection