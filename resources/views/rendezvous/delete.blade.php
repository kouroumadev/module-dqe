@extends('app')
@section('content')
    @include('header')


    <div style="margin-top: 100px">
        <form action="{{ route('rendezvous.recap') }}" method="post">
            @csrf
            <div class="card-box m-auto p-5" style=" width:70%">
                <h2 class="text-center"> Confirmation de votre rendez-vous</h2>
                <hr>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong> <i class="icon-copy fa fa-check-square-o"></i> L'annulation de votre rendez-vous a bien été
                        prise en compte.</strong>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                </div>
                <h6 class="mb-20"> Vous pouvez prendre un nouveau rendez-vous en cliquant sur le bouton « Prendre un
                    rendez-vous » depuis le menu.</h6>




                <div class="d-flex">
                    <div class="form-group" style="margin-top: 30px; margin-right:5px">
                        <a href="{{ route('rendezvous.index') }}" class="btn btn-info"> <i class="icon-copy fa fa-home"
                                aria-hidden="true"></i> Retour à l'acceuil</a>

                    </div>
                    <div class="form-group" style="margin-top: 30px; margin-right:5px">
                        <a href="{{ route('rendezvous.prendre') }}" class="btn btn-warning"> <i
                                class="icon-copy fa fa-calendar" aria-hidden="true"></i> Prendre un rendez-vous</a>

                    </div>

                </div>

            </div>
        </form>
    </div>
@endsection
