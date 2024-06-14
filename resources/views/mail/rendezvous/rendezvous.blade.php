<x-mail::message>
    # Introduction

    <p>{{ $code }}</p>
    <p>{{ $nom }}</p>
    <p>{{ $prenom }}</p>

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
