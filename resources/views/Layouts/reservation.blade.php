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
                        <label for="user" class="form-label">User</label>
                        <input type="text" class="form-control" id="user" value="" name="user" >
                      </div>
                    <div class="form-group">
                      <label for="prix" class="form-label">Billet</label>
                      <input type="text" class="form-control" id="prix" value="" name="prix" required>
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
