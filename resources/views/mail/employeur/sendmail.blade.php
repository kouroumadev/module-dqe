<!DOCTYPE html>
<html>

<head>
    <title>Mail</title>
</head>

<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo" style="width: 650" height="100">
    </p>
    <h3>Bonjour Mme/Mr,

        <p>Le numero de votre code de confirmation est: <span
                style="font-weight: bold; color: red;">{{ $otp }}</span></p>

        <p>Si vous souhaitez faire une reclamation, veuillez <a
                href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
        <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
