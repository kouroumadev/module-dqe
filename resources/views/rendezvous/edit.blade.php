@extends('app')
@section('content')
    @include('header')

    {{-- @php
        $info = App\Models\Rendezvou::where('no_conf', $conf_id)->get();
        // dd($info);
    @endphp --}}
    <div style="margin-top: 100px">

        <div class="card-box m-auto p-5" style=" width:70%">
            <h4 class=""> Confirmation de votre rendez-vous</h4>
            <hr>

            <h6 class="mb-20">Code de confirmation: <span class="text-info">{{ $info[0]->no_conf }}.</h6>
            <div class="row">

                <table>
                    <tr>
                        <th>Nom:</th>
                        <td> {{ $info[0]->prenom }} {{ $info[0]->nom }}</td>
                    </tr>
                    <tr>
                        <th>identifiant:</th>
                        <td>{{ $info[0]->no_employe }}</td>
                    </tr>
                    <tr>
                        <th>telephone:</th>
                        <td>{{ $info[0]->telephone }}</td>
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



            <div class="d-flex">
                <div class="form-group" style="margin-top: 30px; margin-right:5px">
                    <button class="btn btn-info" data-toggle="modal" data-target="#bd-example-modal-lg">
                        Annuler le Rendez-vous</button>

                </div>
                <div class="form-group" style="margin-top: 30px">
                    <a href="{{ route('recap.pdf', $info[0]->no_conf) }}" type="button" class="btn btn-success"> <i
                            class="icon-copy fa fa-print" aria-hidden="true"></i> Imprimer</a>

                </div>
            </div>

        </div>


        <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Vous souhaitez annuler le rendez-vous suivant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-5">

                            <table>
                                <tr>
                                    <th>Nom:</th>
                                    <td> {{ $info[0]->prenom }} {{ $info[0]->nom }}</td>
                                </tr>
                                <tr>
                                    <th>identifiant:</th>
                                    <td>{{ $info[0]->no_employe }}</td>
                                </tr>
                                <tr>
                                    <th>telephone:</th>
                                    <td>{{ $info[0]->telephone }}</td>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a href="{{ route('rendezvous.delete', $info[0]->no_conf) }}" type="button"
                            class="btn btn-success">
                            valider</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
