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
    <p>Votre dossier de reclamation numero:  <span style="font-weight: bold; color: red;">{{ $data['code'] }}</span> a été traité avec succès par la Caisse Nationale de Sécurité Sociale (CNSS)</p>
    <p>Vous trouverez ci-joint un document(PDF) pour plus de détails.</p>
    <p>La CNSS vous remercie pour votre patience et votre bonne comprehension.</p>
    <p>Si vous souhaitez prendre un rendez-vous, veuillez <a href="https://www.reclamations.cnssgn.com/rendezvous/prendre">Cliquez ici</a></p>
    <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>
</html>
