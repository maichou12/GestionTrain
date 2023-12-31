<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets</title>
</head>
<body style="background-color: #eef0f1; color: #3a0c0c;">

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
    La liste des Horaires
</h1>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Heure de depart</th>
      <th scope="col">Heure d'arrivé </th>
      <th scope="col">Options</th>

    </tr>
  </thead>
  <tbody>
    <!-- ordonne les ids par rapport a la table -->
    @php
        $id=1;
    @endphp
  @foreach($listeHoraires as $horaire)
    <tr>
      <th scope="row">{{$id}}</th>
      <td>{{$horaire->heureDep}}</td>
      <td>{{$horaire->heureAr}}</td>
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
