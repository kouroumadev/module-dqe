@extends('app')
@section('content')
    @include('header')

    <div style="margin-top: 100px;">


        @if ($flag_ref == 1)
            <div class="card-box m-auto" style=" width:70%">
                <form action="{{ route('rendezvous.reference') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group  ml-2">
                                <label>Region</label>
                                <select class="custom-select" name="region">
                                    <option selected="">selectionnez...</option>
                                    <option value="1">Conakry</option>
                                    <option value="2">Kindia</option>
                                    <option value="3">Boffa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group  mr-2">
                                <label>N° Reference</label>
                                <input required type="text" name="reference" class="form-control" id="code_employe"
                                    placeholder="">
                            </div>

                        </div>
                        <div class="col-2 form-group" style="margin-top: 30px">
                            <button type="submit" class="btn btn-success mb-2">Rechercher <i class="fa fa-search"
                                    aria-hidden="true"></i></button>

                        </div>
                    </div>



                </form>
            </div>
        @endif
        @if ($flag_creneau == 1)
            <div style="margin-top: 20px">
                <form action="{{ route('rendezvous.recap') }}" method="post">
                    @csrf
                    <div class="card-box m-auto p-5" style=" width:70%">
                        <h2 class="text-center"> Choix du creneau</h2>
                        <div class="row align-items-center">

                            <table>
                                <tr>
                                    <th>Agence:</th>
                                    <td>Conakry</td>
                                </tr>
                                <tr>
                                    <th>Nature du rendez-vous:</th>
                                    <td>Demande d'attestations non editable en ligne</td>
                                </tr>
                                <tr>
                                    <th>Prestation:</th>
                                    <td>Demande des attestations non editable</td>
                                </tr>
                            </table>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-md-6">
                                <div class="mb-20">
                                    <div class="form-group">
                                        <label>Veuillez Selectionner la date souhaitee</label>

                                        <input class="form-control" placeholder="Date" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-20">
                                    <div class="form-group">
                                        <label>Veuillez Selectionner un Horaire</label>

                                        <input class="form-control" placeholder="Heure" type="time">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            {{-- <div class="form-group" style="margin-top: 30px; margin-right:5px">
                                <button type="button" onclick="returnRef()" class="btn btn-info">Retour</button>

                            </div> --}}
                            <div class="form-group" style="margin-top: 30px">
                                <button type="submit" class="btn btn-success">Confirmer creneau</button>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        @endif
        @if ($flag_recap == 1)
            <div style="margin-top: 20px">
                <form action="{{ route('rendezvous.conf') }}" method="post">
                    @csrf
                    <div class="card-box m-auto p-5" style=" width:70%">
                        <h2 class="text-center"> Recaputilatif de votre rendez-vous</h2>
                        <div class="row align-items-center">

                            <table>
                                <tr>
                                    <th>Agence:</th>
                                    <td>Conakry</td>
                                </tr>
                                <tr>
                                    <th>Nature du rendez-vous:</th>
                                    <td>Demande d'attestations non editable en ligne</td>
                                </tr>
                                <tr>
                                    <th>Prestation:</th>
                                    <td>Demande des attestations non editable</td>
                                </tr>
                                <tr>
                                    <th>Horaire:</th>
                                    <td>Jeudi 27/06/2024 a 09:15</td>
                                </tr>
                            </table>
                        </div>
                        <h2 class="text-center"> Infos Personnelles</h2>
                        <div class="row" style="margin-top:20px">


                            <div class="col-md-6">
                                <div>
                                    <span class="text-left font-weight-bold font-14">N° employe</span>
                                    <span
                                        class="float-right font-weight-bold font-12 "id="no_employe_master">19804139876</span>
                                </div>
                                <div>
                                    <span class="text-left font-weight-bold font-14">Nom</span>
                                    <span class="float-right font-12" id="nom_master">DIANE</span>
                                </div>
                                <div>
                                    <span class="text-left font-weight-bold font-14">Prenom</span>
                                    <span class="float-right font-12" id="prenom_master">IBRAHIMA</span>
                                </div>

                                <div>
                                    <span class="text-left font-weight-bold font-14">Date de naissance</span>
                                    <span class="float-right font-weight-bold font-12"
                                        id="date_naissance_master">13/06/1988</span>
                                </div>
                                <div>
                                    <span class="text-left font-weight-bold font-14">Adresse</span>
                                    <span class="float-right font-weight-bold font-12"
                                        id="lieu_naissance_master">CONAKRY</span>
                                </div>
                                <div>
                                    <span class="text-left font-weight-bold font-14">TELEPHONE</span>
                                    <span class="float-right font-weight-bold font-12"
                                        id="lieu_naissance_master">66604956</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 30px">
                            <button type="submit" class="btn btn-success">Valider votre RDV </button>

                        </div>
                    </div>
                </form>
            </div>
        @endif

        @if ($flag_conf == 1)
            <div style="margin-top: 20px">
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
                        <h6 class="mb-20"> Code de confirmation: <span class="text-info">0948765534.</span> <span
                                class="text-danger">NB: veillez garder soigneusement ce code, il vous sera demandé le jour
                                de votre rendez-vous.</span></h6>
                        <div class="row align-items-center">

                            <table>
                                <tr>
                                    <th>Nom:</th>
                                    <td>Ibrahima Diane</td>
                                </tr>
                                <tr>
                                    <th>N employe:</th>
                                    <td>1980456789</td>
                                </tr>
                                <tr>
                                    <th>Agence:</th>
                                    <td>Conakry</td>
                                </tr>
                                <tr>
                                    <th>Nature du rendez-vous:</th>
                                    <td>Demande d'attestations non editable en ligne</td>
                                </tr>
                                <tr>
                                    <th>Prestation:</th>
                                    <td>Demande des attestations non editable</td>
                                </tr>
                                <tr>
                                    <th>Horaire:</th>
                                    <td>Jeudi 27/06/2024 a 09:15</td>
                                </tr>
                            </table>
                        </div>

                        <div class="row" style="margin-top:20px">

                            <p>
                                Un email de confirmation vient de vous etre envoyé, à
                                <strong>ibrahimadiane87@gmail.com</strong>
                            </p>

                        </div>

                        <div class="d-flex">
                            <div class="form-group" style="margin-top: 30px; margin-right:5px">
                                <a href="{{ route('rendezvous.prendre') }}" class="btn btn-info"> <i
                                        class="icon-copy fa fa-home" aria-hidden="true"></i> Retour à l'acceuil</a>

                            </div>
                            <div class="form-group" style="margin-top: 30px">
                                <button type="submit" class="btn btn-success"> <i class="icon-copy fa fa-print"
                                        aria-hidden="true"></i> Imprimer</button>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        @endif

    </div>
@endsection
