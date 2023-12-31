<div>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center  md-12 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('accueil') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('billet-p') }}">Billets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-p') }}">Contact</a>
                        </li>

                        {{-- Verification de l'auth du user --}}
          @guest
          <div >
            <a href="{{route('login')}}" class="btn btn-outline-secondary my-2 my-sm-0 ml-auto">
              <span class="icon-lock "></span>
              Connexion
            </a>
            <a href="{{route('register')}}" class="btn btn-outline-secondary my-2 my-sm-0 ml-auto">
              <span class="icon-person"></span>
              Inscription
            </a>
          </div>
          @endguest
          {{-- afficher logout et tickets en cas de connexion --}}
            @auth
            <div class="btn btn-outline-primary my-2 my-sm-0 ml-auto">
                <a href="{{route('logout-p')}}" class="small mr-3">
                  <span class="icon-lock"></span>
                  Logout
                </a>
              </div>


   <div class="col-6 col-lg-3 text-right">
       <a href="{{route('ticket-p')}}" class="small mr-3">
         <span class="icon-lock"></span>
         Tickets
       </a>
     </div>
            @endauth


                </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
