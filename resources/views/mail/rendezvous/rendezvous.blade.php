<x-mail::message>

    Bonjour Mme/Mr, {{ $prenom }} {{ $nom }},

    votre code de confirmation est : {{ $code }}. Veillez gardez ce code.




</x-mail::message>

<!DOCTYPE html>
<html>

<head>
    <title>Mail</title>
</head>

<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo">
    </p>
    <h3>Bonjour Mme/Mr, {{ $prenom }} {{ $nom }},</h3>
    <p>Votre Rendez-vous a bien été reçu à la Caisse Nationale de Sécurité Sociale (CNSS)</p>
    <p>Le numero de votre code de confirmation est: <span
            style="font-weight: bold; color: red;">{{ $code }}</span></p>
    <p>Une e-mail de confirmation vous serez envoyé une fois que la demande sera traitée par notre équipe.</p>
    <p>Si vous souhaitez faire une reclamation, veuillez <a
            href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
    <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
