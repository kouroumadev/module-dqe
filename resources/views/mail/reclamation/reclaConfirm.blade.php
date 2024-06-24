{{-- <x-mail::message>

    Bonjour Mme/Mr, {{ $data['name'] }} ,

    votre code de confirmation est : {{ $data['date'] }}. Veillez gardez ce code.




</x-mail::message> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
</head>
<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo">
    </p>
    <h3>{{ $data['head'] }},</h3>
    <p>Votre dossier de reclamation a bien été reçu à la Caisse Nationale de Sécurité Sociale (CNSS)</p>
    <p>Le numero de votre dossier est: <span style="font-weight: bold; color: red;">{{ $data['code'] }}</span></p>
    <p>Un e-mail vous sera envoyer dès la fin du traitement de votre dossier.</p>
    <p>Si vous souhaitez prendre un rendez-vous, veuillez <a href="https://www.reclamations.cnssgn.com/rendezvous/prendre">Cliquez ici</a></p>
    <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>
</html>

