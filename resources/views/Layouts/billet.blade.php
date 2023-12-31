<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets</title>
</head>
<body style="background-color: #eef0f1; color: #3a0c0c;">
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
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<br>

<h1>
    La liste des billets
</h1>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix </th>
      <th scope="col">Trajet </th>
      <th scope="col">Classe </th>
      <th scope="col">Options</th>

    </tr>
  </thead>
  <tbody>
    <!-- ordonne les ids par rapport a la table -->
    @php
        $id=1;
    @endphp
  @foreach($listeBillets as $billet)
    <tr>
      <th scope="row">{{$id}}</th>
      <td>{{$billet->nom}}</td>
      <td>{{$billet->Prix}}</td>
      <td>{{$billet->classe_id }}</td>
      <td>{{$billet->trajet_id }}</td>
      <td>
        <a href="#" class="btn btn-outline-info ">Infos</a>


    </tr>
    <!-- auto incrementation de l'id de la table -->
    @php
        $id+=1;
    @endphp
    @endforeach
  </tbody>
</table>
</body>
</html>
