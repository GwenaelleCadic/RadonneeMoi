<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #BC856D;">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/rando') }}">
          {{-- {{ config('app.name', 'RandonneMoi') }} --}}
          RandonnezMoi
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          
          <!-- Right Side Of Navbar -->
          @guest
            @if (Route::has('register'))
                <ul class="navbar-nav ml-auto">
              <a class="nav-link" style="color: #2d6637;" href="{{ asset('rando/') }}">Accueil</a>                
              <a class="nav-link" style="color: #2d6637;" href="{{asset('search')}}">Les randonnées</a>
            @endif
            @else
             <ul class="navbar-nav ml-auto">
                <a class="nav-link" style="color: #2d6637;" href="{{ asset('rando/') }}">Accueil</a>  
                <a class="nav-link" style="color: #2d6637;" href="{{ asset('rando/create') }}">Tracer un circuit</a>  
                <a class="nav-link" style="color: #2d6637;" href="{{asset('search')}}">Les randonnées</a>
                <a class="nav-link" style="color: #2d6637;" href="{{asset('events')}}">Les événements</a>
        @endguest
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" style="color: #2d6637;" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" style="color: #2d6637;" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
              
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="titreBarre dropdown-toggle" href="#" role="button" style="position:relative;padding-left:50px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px;left:10px; border-radius:50%; margin-right: 25px;"> 
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ asset('home') }}">
                             Profil
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
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