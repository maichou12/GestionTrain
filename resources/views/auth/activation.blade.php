<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        {{-- Verification de l'auth du user --}}
          @guest
          <div >
            <a href="{{route('login')}}" class="btn btn-outline-secondary my-2 my-sm-0 ml-auto">
              <span class="icon-lock"></span>
              Connexion
            </a>
            <a href="{{route('register')}}" class="btn btn-outline-secondary my-2 my-sm-0 ml-auto">
              <span class="icon-person"></span>
              Inscription
            </a>
          </div>
          @endguest
          {{-- afficher logout en cas de connexion --}}
            @auth
            <div class="btn btn-outline-primary my-2 my-sm-0 ml-auto">
                <a href="{{route('logout-p')}}" class="small mr-3">
                  <span class="icon-lock"></span>
                  Logout
                </a>
              </div>
            @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4 mx-auto mt-5">
                <h1 class="text-center text-muted mb-3 mt5">
                    Account Activation
                </h1>
                {{-- inclusion du fichier de message d'alerte --}}
            @include('alert.alertMessage')

                <form method="POST" action="{{ route('activationCode-p', ['token' => $token ]) }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="activationcode" class="form-label"> Activation code</label>
                        <input type="text" class="form-control  @if (Session::has('danger')) is-invalid @endif" name ="activationcode" id="activationcode" value="@if(Session::has('activationcode')) {{ Session::get('activationcode') }} @endif">
                    </div>
                </form>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="#"> Change your email adress</a>
                    </div>

                    <div class="col-md-6 text-end">
                        <a href="{{ route('resendcode-p', ['token' => $token]) }}"> Resend the activation code</a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Activate</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
