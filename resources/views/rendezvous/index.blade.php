@extends('app')
@section('content')
    @include('header')
    <div style="margin-top: 100px;">


        <div class="card-box m-auto" style="font-size: 14px; width:70%">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('logos/main-logo.png') }}" alt="img" width="400px" height="400px">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 mb-10 ">
                        Bienvenue à la plateforme de prise de rendez-vous de la Caisse Nationale de Sécurité Sociale:

                    </h4>
                    <p class="font-18 max-width-600">

                        Afin de vous assurer le meilleur accueil, la CNSS a mis à votre disposition une plateforme de
                        prise
                        de
                        rendez-vous en ligne sur le site www.cnss.ma.
                        Vous pouvez choisir et planifier votre rendez-vous au préalable avec nos services, selon vos
                        propres
                        disponibilités et préférences. </p>
                </div>

                <div class="modal-footer m-auto" style="border-top: none">
                    <a href="{{ route('rendezvous.prendre') }}" type="button" class="btn btn-success" data-dismiss="modal">
                        <i class="icon-copy fa fa-calendar" aria-hidden="true"></i> Prise de rendez-vous</a>

                    <a href="{{ route('rendezvous.gestion') }}" type="button" class="btn btn-success" data-dismiss="modal"
                        style="margin-left:30px">
                        <i class="icon-copy fa fa-edit" aria-hidden="true"></i> Gérer mes
                        rendez-vous</a>
                </div>
            </div>
        </div>
    </div>
@endsection
