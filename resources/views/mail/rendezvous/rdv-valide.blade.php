{{-- <x-mail::message>
    Bonjour Mme/Mr, {{ $prenom }} {{ $nom }},

    votre Rendez-vous à été validé et votre code de confirmation est : {{ $code }}. Veillez gardez ce code.

    Date : {{ $date_rendezvous }} à {{ $heure_rendezvous }}
    Heure : {{ $heure_rendezvous }}
    Lieu : {{ $agence }}
</x-mail::message> --}}
<!DOCTYPE html>
<html>

<head>
    <title>Mail</title>
</head>

<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo" style="width: 500" height="100">
    </p>
    <h3>Bonjour Mme/Mr, {{ $prenom }} {{ $nom }},</h3>
    <p>Votre Rendez-vous a bien été reçu à la Caisse Nationale de Sécurité Sociale (CNSS)</p>
    <p>Le numero de votre code de confirmation est: <span
            style="font-weight: bold; color: red;">{{ $code }}</span></p>
    <p>Date : {{ $date_rendezvous }} .</p>
    <p>Heure : {{ $heure_rendezvous }} .</p>
    <p>Lieu : {{ $agence }} .</p>
    <p>Si vous souhaitez faire une reclamation, veuillez <a
            href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
    <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
