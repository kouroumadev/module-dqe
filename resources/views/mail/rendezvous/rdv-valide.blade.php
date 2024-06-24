<x-mail::message>
    Bonjour Mme/Mr, {{ $prenom }} {{ $nom }},

    votre Rendez-vous à été validé et votre code de confirmation est : {{ $code }}. Veillez gardez ce code.

    Date : {{ $date_rendezvous }} à {{ $heure_rendezvous }}
    Heure : {{ $heure_rendezvous }}
    Lieu : {{ $agence }}
</x-mail::message>
