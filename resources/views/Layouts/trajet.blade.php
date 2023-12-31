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
    @include('Layouts.navbar2')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<br>
<div class="text-center">
    <a href="{{ route('accueil') }}" class="btn btn-outline-primary btn-lg">Retour à la page d'acceuil</a>
</div>
<h1>
    La liste des trajets
</h1>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Zone de départ</th>
      <th scope="col">Zone d'arrivée </th>
      <th scope="col">Heure de depart</th>
      <th scope="col">Options</th>

    </tr>
  </thead>
  <tbody>
    <!-- ordonne les ids par rapport a la table -->
    @php
        $id=1;
    @endphp
  @foreach($listeTrajets as $trajet)
    <tr>
      <th scope="row">{{$id}}</th>
      <td>{{$trajet->nom}}</td>
      <td>{{$trajet->gareDepart->nom}}</td>
      <td>{{$trajet->gareArrive->nom}}</td>
      <td>{{$trajet->horaire->heureDep}}</td>
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
