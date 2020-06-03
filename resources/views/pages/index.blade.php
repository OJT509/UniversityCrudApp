@extends('layouts/app')

@section('content')
  <div>
    <div class="jumbotron text-center">
    <h1 tabindex=8>{{__('messages.welcome')}}</h1>
        <p tabindex=9>{{__('messages.tagline')}}</p>
        @if(Auth::guest())
          <p><a class="btn btn-primary btn-lg" href="/login" tabindex="9" role="button">{{__('messages.login')}} <i class="fas fa-sign-in-alt"></i></a> <a class="btn btn-success btn-lg" href="/register"  tabindex="11" role="button">{{__('messages.register')}} <i class="fas fa-user-plus"></i></a></p>
        @else
          <p><a class="btn btn-success btn-lg" href="{{ route('logout') }}"  tabindex="12" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('messages.logout') }} <i class="fas fa-sign-out-alt"></i></a></p>
        @endif
    </div>
    <!--
        Source for card layout: Bootstrap. (n.d). Cards. Retrieved from https://getbootstrap.com/docs/4.3/components/card/
    -->
    <div class="container">
        <div class="card-group">
            <div class="card topPicks slideInLeft">
              <img src="https://www.extremetech.com/wp-content/uploads/2019/05/637873-tesla-model-s-2019-640x360.jpg" class="card-img-top" alt="tesla-image">
              <div class="card-body">
                <h5 class="card-title" tabindex="13">{{__('messages.electric')}}</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="card topPicks slideInUp">
              <img src="https://car-images.bauersecure.com/pagefiles/73715/1752x1168/887_landroverdiscovery.jpg?mode=max&quality=90&scale=down" class="card-img-top" alt="jaguar-image">
              <div class="card-body">
                <h5 class="card-title" tabindex="14">{{__('messages.jaguar')}}</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="card topPicks slideInRight">
              <img src="https://car-images.bauersecure.com/pagefiles/16638/1040x585/6_vw_golf_gti.jpg" class="card-img-top" alt="golf-gti-image">
              <div class="card-body">
                <h5 class="card-title" tabindex="15">{{__('messages.golf')}}</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
    </div>
@endsection

