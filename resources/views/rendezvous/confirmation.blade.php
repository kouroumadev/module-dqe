@extends('app')
@section('content')
    @include('header')

    @php
        $info = App\Models\Rendezvou::where('no_conf', $conf_id)->get();
        // dd($info);
    @endphp
    <div style="margin-top: 100px">
        <form action="{{ route('rendezvous.recap') }}" method="post">
            @csrf
            <div class="card-box m-auto p-5" style=" width:70%">
                <h2 class="text-center"> Confirmation de votre rendez-vous</h2>
                <hr>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="icon-copy fa fa-check-square-o" aria-hidden="true"></i> Votre rendez-vous a
                        bien ete enregistre.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <h6 class="mb-20"> Code de confirmation: <span class="text-info">{{ $info[0]->no_conf }}.</span> <span
                        class="text-danger">NB: veillez garder soigneusement ce code, il vous sera demandé le jour
                        de votre rendez-vous.</span></h6>
                <div class="row align-items-center">

                    <table>
                        <tr>
                            <th>Nom:</th>
                            <td> {{ $info[0]->prenom }} {{ $info[0]->nom }}</td>
                        </tr>
                        <tr>
                            <th>N employe:</th>
                            <td>{{ $info[0]->no_employe }}</td>
                        </tr>
                        <tr>
                            <th>Agence:</th>
                            <td>{{ $info[0]->agence }}</td>
                        </tr>
                        <tr>
                            <th>Nature du rendez-vous:</th>
                            <td>{{ $info[0]->nature }}</td>
                        </tr>
                        <tr>
                            <th>Prestation:</th>
                            <td>{{ $info[0]->prestation }}</td>
                        </tr>
                        <tr>
                            <th>Horaire:</th>
                            <td>{{ $info[0]->date_rendezvous }} a {{ $info[0]->heure_rendezvous }}</td>
                        </tr>
                    </table>
                </div>

                <div class="row" style="margin-top:20px">

                    <p>
                        Un email de confirmation vient de vous etre envoyé, à
                        <strong>{{ $info[0]->email }}</strong>
                    </p>

                </div>

                <div class="d-flex">
                    <div class="form-group" style="margin-top: 30px; margin-right:5px">
                        <a href="{{ route('rendezvous.prendre') }}" class="btn btn-info"> <i class="icon-copy fa fa-home"
                                aria-hidden="true"></i> Retour à l'acceuil</a>

                    </div>
                    <div class="form-group" style="margin-top: 30px">
                        <a href="{{ route('recap.pdf', $info[0]->no_conf) }}" type="submit" class="btn btn-success"> <i
                                class="icon-copy fa fa-print" aria-hidden="true"></i> Imprimer</a>

                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
