<!--The navbar to be included across all webpages to allow consistency-->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}" tabindex="1">
          {{ config('app.name', 'AWP') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          <ul class="navbar-nav" role="navigation">
            <li class="nav-item active">
              <a class="nav-link" href="/" tabindex="2" role="button">{{__('messages.home')}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/about" tabindex="3" role="button">{{__('messages.about')}}</a>
            </li>
            <!--Only shows the create button if the user is logged in-->
            @if(!Auth::guest())
            <li class="nav-item active">
              <a class="nav-link" href="/posts/create" tabindex="4">{{__('messages.create')}}</a>
            </li>
            @endif
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}" tabindex="5">{{__('messages.login')}}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}" tabindex="6">{{__('messages.register')}}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" tabindex="7" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                          <img class="avatar" src="{{asset(Auth::user()->avatar)}}" alt="avatar">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="/home" class="dropdown-item">{{__('messages.dashboard')}}</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('messages.logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>
