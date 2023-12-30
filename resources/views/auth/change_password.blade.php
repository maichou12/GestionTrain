<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">

    <title>Changer le mot de passe </title>
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
                    Change your Password
                </h1>
                <p class="text-center text-muted mb-5">
                    Please enter your new password
                </p>
                {{-- inclusion du fichier de message d'alerte --}}
            @include('alert.alertMessage')

                <form method="POST" action="{{ route('changePassword-p', ['token' => $activation_token ]) }}" >
                    @csrf
                    <div class="mb-4">
                        <label for="new-password" class="form-label"> New Password </label>
                        <input type="password" class="form-control mb-3 @error('password_error') is-invalid @enderror" name="new-password" id="new-password" placeholder="Enter your new password "
                        value="@if(Session::has('old-new-password')){{ Session::get('old-new-password') }}@endif">

                        <label for="new-password-confirm" class="form-label "> New Password </label>
                        <input type="password" class="form-control mb-3 @error('password_error_confirm') is-invalid @enderror"
                        name="new-password-confirm" id="new-password-confirm" placeholder="Confirm your new password "
                        value="@if(Session::has('old-new-password-confirm')){{ Session::get('old-new-password-confirm') }}@endif">
                    </div>
                    <div class="col-12 text-center mb-3">
                        <button type="submit" class="btn btn-outline-primary">validate the password</button>
                    </div>
                </form>



                <p class="text-center text-muted"> Back to
                    <a href="{{ route('login') }}">login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
