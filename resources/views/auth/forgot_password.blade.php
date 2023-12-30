<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">

    <title>Mot de passe oublié</title>
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
                    Forgot Password
                </h1>
                <p class="text-center text-muted mb-5">
                    Please enter your email address. Well's send you an link to reset your password
                </p>
                {{-- inclusion du fichier de message d'alerte --}}
            @include('alert.alertMessage')
                <form method="POST" action="{{ route('forgotPassword-p') }}" >
                    @csrf
                    <div class="mb-4">
                        <label for="email_send" class="form-label"> Email Adress </label>
                        <input type="email" class="form-control @error('email_success') is-valid @enderror @error('email_error') is-invalid @enderror" name="email_send"
                        placeholder="Enter your email adress" value="@if(Session::has('old_email')){{ Session::get('old_email') }}@endif" required>
                    </div>
                </form>


                <div class="col-12 text-center mb-3">
                    <button type="submit" class="btn btn-outline-primary">validate the email</button>
                </div>
                <p class="text-center text-muted"> Back to
                    <a href="{{ route('login') }}">login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
