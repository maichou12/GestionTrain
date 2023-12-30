<h1> salut, {{$name}} veuillez confirmer votre email ! </h1>

<p>veuillez activer votre compte en copiant et collant le code d'activation. .
    <br>
    code d'activation : {{$activation_code}}
    <br>
    Ou en cliquant sur le lien suivant :
    <br>
    <a href="{{ route('activationLink-p', ['token' => $activation_token]) }}" target="_blank"> Confirmez votre compte</a>
</p>

<p>
    Train Express Regional (TER) Dakar
</p>

