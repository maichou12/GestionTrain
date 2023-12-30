<h1> Cher(e), {{$name}}</h1>

<p>
    Vous recevez cet e-mail car vous avez demande la reinitialisation du mot de passe pour votre compte sur TER DAKAR. Veuillez cliquer sur le lien ci-dessous pour completer le processus de reinitialisation du mot de passe :
</p>

<p>Lien :
    <br>
    <a href="{{ route('changePassword-p', ['token' => $activation_token] ) }}" target="_blank"> Confirmez votre compte</a>
</p>

<p>
   Cordialement l'equipe du Train Express Regional (TER) Dakar
</p>

