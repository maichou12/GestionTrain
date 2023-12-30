<!-- navbar-->
<nav class="site-nav mb-5">
    <div class="pb-2 top-bar mb-3">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-9">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block">Vous avez une question ?</span></a>
            <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block">+221 76 172 72 33</span></a>
            <a href="#" class="small mr-3"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block">TERDK@gmail.sn</span></a>
          </div>
          {{-- Verification de l'auth du user --}}
          @guest
          <div class="col-6 col-lg-3 text-right">
            <a href="{{route('login')}}" class="small mr-3">
              <span class="icon-lock"></span>
              Connexion
            </a>
            <a href="{{route('register')}}" class="small">
              <span class="icon-person"></span>
              Inscription
            </a>
          </div>
          @endguest
          {{-- afficher logout en cas de connexion --}}
            @auth
            <div class="col-6 col-lg-3 text-right">
                <a href="{{route('logout-p')}}" class="small mr-3">
                  <span class="icon-lock"></span>
                  Logout
                </a>
              </div>
            @endauth

        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="{{route('accueil')}}" class="logo menu-absolute m-0">TER DAKAR <span class="text-primary">.</span></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li class="active"><a href="{{route('accueil')}}">Accueil</a></li>
            <li><a class="@if (Request::route()->getName()=='train-p') active @endif" href="{{route('train-p')}}">Trains</a></li>

            <li class="@if (Request::route()->getName()=='horaire-p') active @endif" ><a href="{{route('horaire-p')}}">Horaires</a></li>

            <li class="@if (Request::route()->getName()=='reservation-p') active @endif" ><a href="{{route('reservation-p')}}">Reservations</a></li>
            <li class="@if (Request::route()->getName()=='about-p') active @endif" ><a href="{{route('about-p')}}">A Propos</a></li>
            <li class="@if (Request::route()->getName()=='contact-p') active @endif" ><a href="{{route('contact-p')}}">Contact</a></li>
          </ul>

          <a href="#" class="btn-book btn btn-secondary btn-sm menu-absolute">Reserver</a>

          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>
