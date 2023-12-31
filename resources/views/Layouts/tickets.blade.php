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
    <a href="{{ route('reservation-create') }}" class="btn btn-outline-primary btn-lg">Reserver un nouveau ticket</a>
</div>

<div class="container">
    <h2>Mes Réservations</h2>
            @if($listeTickets->count() > 0)
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Billet</th>
                    <th scope="col">Trajet </th>
                    <th scope="col">Heure de depart </th>
                    <th scope="col">Code Qr</th>
                    <th scope="col">Statut </th>
                    <th scope="col">Options</th>

                  </tr>
                </thead>
                <tbody>
                  <!-- ordonne les ids par rapport a la table -->
                  @php
                      $id=1;
                  @endphp
                @foreach($listeTickets as $ticket)
                  <tr>
                    <th scope="row">{{$id}}</th>
                    <td>{{$ticket->user->prenom}} {{ $ticket->user->nom }}</td>
                    <td>{{$ticket->billet->Prix}}</td>
                    <td>{{$ticket->billet->trajet->nom}}</td>
                    <td>{{$ticket->billet->trajet->horaire->heureDep}}</td>
                    <td>{{ $ticket->codeQr }}</td>
                    <td>
                        @if ($ticket->statut == 1)
                            Valide
                        @else
                            Invalide
                        @endif
                    </td>
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
            @else
                <p>Aucune réservation pour le moment.</p>
            @endif

    </div>



</body>
</html>
