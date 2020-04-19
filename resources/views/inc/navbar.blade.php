<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #84817f;">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/rando') }}">
        <img src="{{asset('/images/logo.png')}}" style="position: relative;width: 70px; height: 60px; margin-right: 25px;"> 
          
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
              <a class="nav-link active" href="{{ asset('rando/') }}">Accueil</a>                
              <a class="nav-link" href="{{asset('search')}}">Randonnées</a>
            @endif
            @else
             <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ asset('rando/') }}">Accueil</a>  
                <a class="nav-link" href="{{ asset('rando/create') }}">Tracer</a>  
                <a class="nav-link" href="{{asset('search')}}">Randonnées</a>
                <a class="nav-link" href="{{asset('events')}}">Evénements</a>
        @endguest
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ asset('/country')}}">Inscription</a>
                      </li>
                  @endif
              @else
              
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="titreBarre dropdown-toggle" href="#" role="button" style="position:relative;padding-left:50px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('uploads/avatars/')}}/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px;left:10px; border-radius:50%; margin-right: 25px;"> 
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ asset('home') }}">
                             Profil
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              Déconnexion
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
<script>
    
</script>  