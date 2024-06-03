@extends('app')
@section('content')
    @include('header')

    <div style="margin-top: 100px;">


        @if ($flag_ref == 1)
            <div style="margin-top: 20px">
                <form action="{{ route('rendezvous.reference') }}" method="POST">
                    @csrf

                    <div class="card-box m-auto p-5" style=" width:70%">
                        <h2 class="text-center" style="margin-bottom: 35px"> Choix de la Prestation</h2>
                        <hr>
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

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>Nature du rendez-vous</label>
                                    <select class="custom-select" name="nature" id="nature" onchange="getPrestation()">
                                        <option selected="">selectionnez...</option>
                                        @foreach ($nature as $value)
                                            <option value="{{ $value->id }}">{{ $value->libelle }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group  mr-2">
                                    <div class="form-group  ml-2">
                                        <label>Prestation</label>
                                        <select class="custom-select" name="prestation" id="prestation">
                                            <option selected="">selectionnez...</option>



                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex">

                            <div class="form-group" style="margin-top: 30px">
                                <button type="submit" class="btn btn-success">Confirmer Prestation</button>

                            </div>
                        </div>

                    </div>


            </div>
            {{-- <div class="row">
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
            </div> --}}
            </form>
        @endif
        @if ($flag_creneau == 1)
            <div style="margin-top: 20px">
                <form action="{{ route('rendezvous.recap') }}" method="post">
                    @csrf
                    <div class="card-box m-auto p-5" style=" width:70%">
                        <h2 class="text-center" style="margin-bottom: 35px"> Choix du creneau</h2>
                        <hr>
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

                        <div class="row" style="margin-top:30px">
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
                        <h2 class="text-center" style="margin-bottom: 35px"> Recaputilatif de votre rendez-vous</h2>
                        <hr>
                        <div class="row align-items-center">

                            <table style="margin-left: 15px; margin-bottom:10px;">
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
                        <h5 class="">Pour confirmer le rendez vous, remplissez les champs ci-dessous :</h5>
                        <div class="row" style="margin-top:20px">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>No employe/employeur</label>
                                    <input type="text" name="no_employe" id="no_employe" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>Prenom</label>
                                    <input type="text" name="prenom" id="prenom" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>adresse</label>
                                    <textarea type="text" name="adresse" id="adresse" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>email</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group  ml-2">
                                    <label>Telephone</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control">
                                </div>
                            </div>

                        </div>
                        {{-- <div class="row" style="margin-top:20px">


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
                        </div> --}}

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


    {{-- <div class="main-container px-5">

        <div class="row mt-3 justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-md-10">
                <div class="pd-20 mb-30">

                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard vertical">
                            <h5>Choix de la Prestation</h5>
                            <section>
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

                                </div>
                                <div class="row">
                                    <div class="col-5">

                                        <div class="form-group  ml-2">
                                            <label>Nature du rendez-vous</label>
                                            <select class="custom-select" name="nature" id="nature"
                                                onchange="getPrestation()">
                                                <option selected="">selectionnez...</option>
                                                @foreach ($nature as $value)
                                                    <option value="{{ $value->id }}">{{ $value->libelle }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group  mr-2">
                                            <div class="form-group  ml-2">
                                                <label>Prestation</label>
                                                <select class="custom-select" name="prestation" id="prestation">
                                                    <option selected="">selectionnez...</option>



                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h5>Choix du creneau</h5>
                            <section>

                                <h2 class="text-center" style="margin-bottom: 35px"> Choix du creneau</h2>
                                <div class="row align-items-center" style="margin-left: 15px">

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

                                <div class="row" style="margin-top:30px">
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
                            </section>
                            <!-- Step 3 -->
                            <h5>Prestation concernée</h5>
                            <section>
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                    <label class="weight-600">Custom Radio</label>
                                </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-1">
                                                <label class="custom-control-label" for="customCheck1-1">Retraite
                                                    personnelle</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-2">
                                                <label class="custom-control-label" for="customCheck1-2">Retraite de
                                                    réversion</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-3">
                                                <label class="custom-control-label" for="customCheck1-3">Allocation de
                                                    solidarité aux personnes agées</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-4">
                                                <label class="custom-control-label" for="customCheck1-4">Régulation de
                                                    carrière</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-5">
                                                <label class="custom-control-label" for="customCheck1-5">Retraite de
                                                    anticipée</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" class="custom-control-input" name="prestation"
                                                    id="customCheck1-6">
                                                <label class="custom-control-label" for="customCheck1-6">Autre</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- Step 4 -->
                            {{-- <h5>Motif(s) de ma réclamation</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="weight-600">Motif(s)</label>
                                @foreach ($motifs as $m)
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="{{ $m->id }}">
                                            <label class="custom-control-label"
                                                for="{{ $m->id }}">{{ $m->value }}</label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1-100">
                                        <label class="custom-control-label" for="customCheck1-100">Autre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="weight-600">Details de la demande</label>
                                <div class="form-group">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </section> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <div id="loading-spinner" class="loading-spinner">
        <img src="{{ asset('theme/gif/Spinner-2.gif') }}" alt="Loading...">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#numero').blur(function() {
                var num = $(this).val();
                var type = $("#type").val();


                $.ajax({
                    url: '/reclamation/getInfo',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        num: num,
                        type: type,
                    },
                    beforeSend: function() {
                        $('#loading-spinner').show(); // Show the loading spinner
                    },
                    success: function(data) {
                        var tel = $("telephone").val();
                        var mail = $("mail").val();
                        console.log('valueeee:', data);
                        $('#nom').val(data[0]);
                        $('#prenom').val(data[1]);
                        $('#date_naiss').val(data[2]);
                        $('#adresse').val(data[3]);
                        $('#tel').val(tel);
                        $('#add_email').val(mail);

                        $('#loading-spinner').hide();
                    }
                });

            });


            // $('#mail').blur(function() {
            //     var inputValue = $(this).val();
            //     $('#small-modal-test').modal('show');
            //     console.log(inputValue);
            // });

            $('#type').change(function() {
                var type = $(this).val();
                console.log(type);
                if (type == 'Assure' || type == 'Employeur')
                    $('#num').text('N° Immatriculation');
                else
                    $('#num').text('N° Pension');

                $('#numDiv').show();

                if (type == "null")
                    $('#numDiv').hide();

            });
        });
    </script>
@endsection
