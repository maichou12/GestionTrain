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
                <td>{{ $ticket-> }}</td>
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

