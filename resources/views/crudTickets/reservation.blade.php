<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div>
    @include('Layouts.navbar2')
</div>
<div class="container mb-4">
    <h2>Réserver un ticket</h2>
</div>

    <div class="container col-md-4" > <? /* creer le cadrage et le centrer */?>
        <div class="card" >
            <div class="card-header">
                <h2>Ajouter un Ticket</h2>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="{{route('reservation-store')}}" method="post" class="row g-3 ">
                    @csrf
                    <div class="form-group">
                      <label for="billet_id" class="form-label">Billet</label>
                      <select name="billet_id" id="billet_id" class="form-control" required>
                        @foreach($billets as $billet)
                            <option value="{{ $billet->id }}">
                                @if($billet->trajet)
                                    {{ $billet->trajet->nom }} - {{ $billet->Prix }} - {{ $billet->classe->nom }}
                                @else
                                    {{ $billet->Prix }} - {{ $billet->classe->nom }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <select name="heure_depart_perso" id="heure_depart_perso" class="form-control" required>
                        <option value="">Sélectionnez une heure de depart</option>
                        @foreach($horaires as $horaire)
                            <option value="{{ $horaire->id }}">{{ $horaire->heureDep }}</option>
                        @endforeach
                    </select>
                    </div>
                      <br>
                      <div class="col-12 text-center">
                        <a href="{{ route('ticket-p') }}" class="btn btn-outline-secondary btn-lg">Annuler</a>
                        <button class="btn btn-primary btn-lg" type="submit" >Ajouter</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
