<!--The dashboard you are redirected to once logged in-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.posts') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/search" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="{{ __('messages.searchposts') }}">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary search" role="button">{{ __('messages.search') }} <i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <a href="/posts/create" class="btn btn-success createbtn" role="button">{{ __('messages.createpost') }} <i class="fas fa-pencil-alt"></i></a>
                    @if(count($posts) > 0)
                        @foreach($posts as $p)
                            <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="700">
                                <!--Loops through all of the car titles to display and then you can click on it taking you to the "show" route for more information-->
                                <hr class="homeHr">
                                <h3><a class="test" href="/posts/{{$p->id}}">{{$p->title}}</a></h3>
                                <p>{{ __('messages.createdon') }} {{$p->created_at->format('d-m-y') }}</p>
                                <p>{{ __('messages.lastupdated') }} {{$p->updated_at->format('d-m-y') }}</p>
                                <div class="createdBy">
                                    <p><i>{{ __('messages.by') }} {{$p->user->name}}</i><img class="avatar" src="{{asset($p->user->avatar)}}" alt="avatar"></p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No posts found!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
