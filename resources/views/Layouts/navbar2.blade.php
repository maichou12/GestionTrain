<div>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            {{-- contrainte de reservation(tickets) --}}
            @auth
            <a class="navbar-brand" href="{{route('ticket-p')}}">Mes reservations </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            @endauth

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('accueil') }}">Accueil <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('billet-p') }}">Billets</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('trajet-p') }}">Trajets</a>
                </li>
                 {{-- contrainte de l'ath et logout --}}
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout-p') }}">Logout</a>
                      </li>
                    @endauth

              </ul>
            </div>
          </nav>
    </nav>
</div>
