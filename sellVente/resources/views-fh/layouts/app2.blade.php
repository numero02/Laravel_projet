<!DOCTYPE html>
{{-- <html lang="en"> --}}
  {{-- ajout --}}
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Projet Web 2 - Collège de Maisonneuve - H20">
  <meta name="author" content="Walid Drihem, Zhongda Zhang, François Hétu">

  <title>{{config('app.name','SELLVENTE')}}</title>

  <!-- Bootstrap core CSS -->
  <link href="/second-layouts/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/second-layouts/css/shop-homepage.css" rel="stylesheet">

  {{-- new --}}
  
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- new JavaScript --}}
    <script src="{{ asset('/js/app.js') }}" defer></script>
   
    {{--
       nouvel ajout
       =====================================================
    --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


       {{-- fin de l'ajout --}}

  <!-- Complément de styles pour le projet Web 2 du Collège de Maisonneuve -->
  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <header>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./"><img src="/img/logotype.png" alt="Logo"/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          @if( (Auth::user() !== null ) && (Auth::user()->privilege == "admin"))

          <li>
            <a href="/ads/admin" class="nav-link">Liste des annonces</a>
          </li>

          @else

            <li>
              <a href="/home"  class="nav-link">Accueil</a>
            </li>

          @endif

          @if((Auth::user()!==null) && (Auth::user()->privilege == 'admin'))

          <li class="nav-item">
            <a href="/users/admin" class="nav-link">Liste des usagers</a>
          </li>
          
          @endif


          {{-- @if((Auth::user()->role == "Fournisseur") || (Auth::user()->privilege == "admin")) 
            <li> 
                {{Route::getFacadeRoot()->current()->uri()}} --}}
              {{-- @if(Route::getFacadeRoot()->current()->uri() == )    
                <a href="./ads" class="nav-link">Liste des produits et services</a>
            </li>
            @endif --}}

            <li class="nav-item active">
              <a class="nav-link" href="#">Produits<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>

            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link btn btn-primary connexion" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link btn btn-success inscription" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                    </li>
                @endif
            @else
              {{-- si authentifié --}}
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Déconnexion') }}
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

  <!-- Page Content -->
  <div class="container">

    <!-- le content de mon layouts -->
    @yield('content')
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 mb-2">
          <li class="nav-item-footer ajustment">
            <a class="nav-link" href="/">Accueil</a>
          </li>
          <li class="nav-item-footer ajustment">
            <a class="nav-link" href="#">Produits</a>
          </li>
          <li class="nav-item-footer ajustment">
            <a class="nav-link" href="#">Services</a>
          </li>
        </div>

        <div class="col-lg-4 col-md-4 mb-2">
          <a class="navbar-brand logocentre" href="/"><img src="/img/logotype.png" alt="Logo"/></a>
        </div>

        <div class="col-lg-4 col-md-4 mb-2">
          <li class="nav-item-footer">
            <a class="nav-link" href="https://www.instagram.com/"><img class="img_footer" src="/img/instagram.png" alt="instagram"/></a>
          </li>
          <li class="nav-item-footer">
            <a class="nav-link" href="https://www.facebook.com/"><img class="img_footer" src="/img/facebook.png" alt="facebook"/></a>
          </li>
          <li class="nav-item-footer">
            <a class="nav-link" href="https://www.linkedin.com/"><img class="img_footer" src="/img/linkedin.png" alt="linkedin"/></a>
          </li>
          
        </div>
      </div>

    </div>
  </footer>
  <!-- /.footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="/second-layouts/vendor/jquery/jquery.min.js"></script>
  <script src="/second-layouts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>