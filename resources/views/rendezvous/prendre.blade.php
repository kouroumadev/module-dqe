@extends('app')
@section('content')
    <style>
        .employe {
            font-family: "Inter", sans-serif;
            color: #131e22;
            font-weight: 400;
            height: 45px;
            border-color: #d4d4d4;
            letter-spacing: 0.035em;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;

        }

        .form-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-items: center;
            padding: 5%;
        }

        .form-container {
            min-width: 100vh;
            width: 100%;
            padding: 20px;
        }

        .form-title {
            padding: 10px;
            text-align: center;
            font-size: 25px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0;
        }

        .custom-progress-bar {
            margin: 25px 0;
            padding: 0;
            overflow: hidden;
            counter-reset: step;
            display: flex;
            flex-direction: row;
            align-items: center;
            position: relative;
        }

        .custom-progress-bar li {
            list-style-type: none;
            width: 100%;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            position: relative;
        }

        .custom-progress-bar li::before {
            position: relative;
            z-index: 2;
            content: counter(step);
            counter-increment: step;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: block;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            border-radius: 100%;
            background-color: rgb(96, 198, 96);
            margin: 0 auto 10px auto;
            color: #f5f5f5;
        }

        .custom-progress-bar li::after {
            content: " ";
            width: 100%;
            height: 6px;
            background: rgb(96, 198, 96);
            position: absolute;
            left: -50%;
            top: 17px;
            z-index: 1;
        }

        .custom-progress-bar li.active::after,
        .custom-progress-bar li.active::before {
            background: linear-gradient(to right, rgb(96, 115, 198) 20%, rgb(96, 115, 198) 40%,
                    rgb(96, 115, 198) 60%, rgb(96, 115, 198) 80%);
            background-size: 200% auto;
            animation: effect 1s linear infinite;
            color: #f5f5f5;
        }

        @keyframes effect {
            to {
                background-position: -200% center;
            }
        }

        #step-group-2,
        #step-group-3,
        #step-group-4 {
            display: none;
        }

        .error {
            border-color: red;
        }
    </style>
    @include('header')

    {{-- <div style="margin-top: 100px;">


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


    </div> --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <div class="main-container px-5">

        <div class="row mt-3 justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-md-10">
                <div class="pd-20 mb-30">

                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard horizontal" action="{{ route('rendezvous.conf') }}"
                            method="post" id="rendezvous-form">
                            @csrf
                            {{-- <form class="tab-wizard wizard-circle wizard horizontal" method="post" id="rendezvous-form"> --}}
                            <h5>Identification</h5>
                            <section>
                                <h2 class="text-center" style="margin-bottom: 35px"> Identification</h2>
                                <hr>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-4 col-md-6 col-sm-12 form-group">

                                        <div class="row" style=" margin-left:15px">
                                            <label>Etes-vous ? <span class="text-danger">*</span></label>
                                            <select name="typerdv" required id="type-rdv" class="custom-select">
                                                <option value="Autre">-- Autre --</option>
                                                <option selected value="Assure">ASSURE</option>
                                                <option value="Employeur">EMPLOYEUR</option>
                                                <option value="Retraite">RETRAITE</option>
                                                <option value="Reversion">REVERSION</option>
                                            </select>
                                            {{-- <div class="col-ms-6" style="margin-left:15px;">
                                                <p>Etes vous ? un(e) assuré(e) ou employeur</p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                        id="oui" value="oui" checked>
                                                    <label class="form-check-label" for="oui">OUI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                        id="non" value="non">
                                                    <label class="form-check-label" for="non">NON</label>
                                                </div>
                                            </div> --}}

                                        </div>

                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group  ml-2" id="raison_sociale_wrapper" style="display:none">
                                            <label>Raison Sociale</label>
                                            <input type="text" name="raison_sociale" id="raison_sociale"
                                                class="form-control" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group" id="no_emp_wrapper" style=" margin-left:15px">
                                            <label id="title">No employe/employeur</label>
                                            <input type="text" name="no_employe" id="no_employe" value=""
                                                placeholder="n° assuré(e)" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">


                                        <div class="form-group  ml-2">
                                            <label>Nom</label>
                                            <input type="text" name="nom" id="nom" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group  ml-2">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone" id="telephone" class="form-control"
                                                required>
                                        </div>

                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">

                                        <div class="form-group  ml-2">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group  ml-2">
                                            <label>email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                required>
                                        </div>

                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">

                                        <div class="form-group  ml-2">
                                            <label>adresse</label>
                                            <textarea type="text" name="adresse" id="adresse" class="form-control" required></textarea>
                                        </div>

                                    </div>
                                </div>



                            </section>
                            <!-- Step 2 -->
                            <h5>Choix de Prestation</h5>
                            <section>
                                <h2 class="text-center" style="margin-bottom: 35px"> Choix de Prestation</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row" style="margin-left: 15px">
                                            <div class="col-10">
                                                <div class="form-group  ml-2">
                                                    <label>Region</label>
                                                    <select class="custom-select" name="region" id="region">

                                                        @foreach ($agence as $value)
                                                            <option value="{{ $value->libelle }}">{{ $value->libelle }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="margin-left: 15px">
                                            <div class="col-10">

                                                <div class="form-group  ml-2">
                                                    <label>Nature du rendez-vous</label>
                                                    <select class="custom-select" name="nature" id="nature">
                                                        @foreach ($nature as $value)
                                                            <option value="{{ $value->id }}" selected>
                                                                {{ $value->libelle }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="margin-left: 15px">
                                            <div class="col-10">
                                                <div class="form-group  mr-2">
                                                    <div class="form-group  ml-2" id="prest_wrapper">
                                                        <label>Prestation</label>
                                                        <select class="custom-select" name="prestation" id="prestation">


                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group  ml-2" id="autre_wrapper" style="display: none">
                                            <label>Autre choix</label>
                                            <textarea type="text" name="autre" id="autre" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- Step 3 --}}
                            <h5>Choix du creneau</h5>
                            <section>

                                <h2 class="text-center" style="margin-bottom: 35px"> Choix du creneau</h2>
                                <hr>
                                <div class="row align-items-center" style="margin-left: 15px">


                                </div>

                                <div class="row" style="margin-top:30px">
                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <div class="form-group">
                                                <label>Veuillez Selectionner la date souhaitee</label>


                                                <input class="form-control" placeholder="Date" type="date"
                                                    name="date_rendezvous" id="date_rendezvous">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <div class="form-group">
                                                <label>Veuillez Selectionner un Horaire</label>

                                                <input class="form-control" placeholder="Heure" type="time"
                                                    name="heure_rendezvous" id="heure_rendezvous">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h5>Validation</h5>
                            <section>
                                <h2 class="text-center" style="margin-bottom: 35px"> Validation</h2>
                                <hr>
                                <div class="row align-items-center">

                                    <table style="margin-left: 15px; margin-bottom:10px; width:100%">
                                        <tr>
                                            <th>Prénoms et Nom:</th>
                                            <td> <span id="prenom_disp"></span> <span id="nom_disp"></span> </td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td id="email_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Telephone:</th>
                                            <td id="telephone_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Adresse:</th>
                                            <td id="adresse_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Agence:</th>
                                            <td id="agence_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Nature du rendez-vous:</th>
                                            <td id="nature_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Prestation:</th>
                                            <td id="prestation_disp_valide"></td>
                                        </tr>
                                        <tr>
                                            <th>Horaire:</th>
                                            <td> <span id="date_disp"></span> à <span id="heure_disp"></span> </td>
                                        </tr>
                                    </table>
                                </div>



                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-success" id="send-rdv">Valider le
                                            RDV</button>
                                    </div>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="loading-spinner" class="loading-spinner">
        <img src="{{ asset('theme/gif/Spinner-2.gif') }}" alt="Loading...">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {

            var flag = 0;

            //$('#send-rdv').prop('disabled', true);
            $('#send-rdv').on('click', function() {
                if (flag == 1) {
                    swal({
                        title: "Oops!",
                        text: title,
                        icon: "error",
                        button: "OK",
                    });
                } else {
                    var region = $("#region").val();
                    var nature = $("#nature").val();
                    var prestation = $("#prestation").val();
                    var date_rendezvous = $("#date_rendezvous").val();
                    var heure_rendezvous = $("#heure_rendezvous").val();
                    var no_employe = $("#no_employe").val();
                    var nom = $("#nom").val();
                    var prenom = $("#prenom").val();
                    var telephone = $("#telephone").val();
                    var email = $("#email").val();
                    var adresse = $('#adresse').val();

                    if (region == '' || nature == '' || prestation == '' || date_rendezvous == '' ||
                        heure_rendezvous == '' || nom == '' || prenom == '' || telephone == '' || email ==
                        '' ||
                        adresse == '') {
                        swal({
                            title: "Oops!",
                            text: "Veuillez remplir tous les champs obligatoires !!",
                            icon: "error",
                            button: "OK",
                        });
                        // $('.form-control').addClass("form-control-danger");
                    } else {
                        let date_submit = $("#date_rendezvous").val();
                        let current_date = new Date();
                        let year = current_date.getFullYear();
                        let month = current_date.getMonth() + 1;
                        let day = current_date.getDate();

                        let up_date = year +
                            '-' + month +
                            '-' + day;

                        if (Date.parse(date_submit) < Date.parse(up_date)) {
                            swal({
                                title: "Oops!",
                                text: "La date choisie ne doit pas etre inferieure à la date du jour !!",
                                icon: "error",
                                button: "OK",
                            });

                        } else {
                            var date_rendezvous = $("#date_rendezvous").val();
                            var heure_rendezvous = $("#heure_rendezvous").val();
                            $.ajax({
                                type: 'GET',
                                url: "{{ route('horaire.ajax') }}",
                                dataType: 'json',
                                data: {
                                    date_rendezvous: date_rendezvous,
                                    heure_rendezvous: heure_rendezvous,
                                },
                                success: function(data) {
                                    //console.log(data);
                                    if (data == 'error') {
                                        swal({
                                            title: "Incorrect !",
                                            text: "Ce creneau à été déjà réservé",
                                            icon: "error",
                                            button: "OK",
                                        });

                                    } else {
                                        $('#rendezvous-form').submit();
                                    }

                                }
                            })
                        }


                        //$('#rendezvous-form').submit();
                    }
                }
            });

            $('#nature').change(function() {

                //alert(prestation)
                var nature_val = $("#nature").val();
                if (nature_val == 3) {
                    $("#prest_wrapper").hide();
                    $("#autre_wrapper").show();
                } else {
                    $("#prest_wrapper").show();
                    $("#autre_wrapper").hide();
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('prestation.ajax') }}",
                        dataType: 'json',
                        data: {
                            nature_val: nature_val
                        },
                        success: function(data) {
                            // console.log(data);
                            $('select[name="prestation"]').html('');
                            var d = $('select[name="prestation"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="prestation"]').append(
                                    '<option value="' +
                                    value.libelle + '">' +
                                    value.libelle + '</option>')
                            })
                        }
                    })
                }
                //alert(nature_val);



            });
            $('#prestation').change(function() {
                var prestation_val = $("#prestation").val();
                if (prestation_val == "Autres") {

                    $("#autre_wrapper").show();
                } else {
                    $("#autre_wrapper").hide();
                }
            });
            $('#date_rendezvous').blur(function() {
                var date_val = $("#date_rendezvous").val();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('date.ajax') }}",
                    dataType: 'json',
                    data: {
                        date_val: date_val
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data == 'error') {
                            swal({
                                title: "Incorrect !",
                                text: "La date ne doit pas etre inferieure à la date du jour.",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#date_rendezvous').addClass("form-control-danger");

                        } else {
                            $('#date_rendezvous').removeClass("form-control-danger");

                        }

                    }
                })
            });
            $('#heure_rendezvous').blur(function() {
                var region = $("#region").val();
                var prestation = $("#prestation option:selected").text();
                var nature = $("#nature option:selected").text();
                var date_rendezvous = $("#date_rendezvous").val();
                var heure_rendezvous = $("#heure_rendezvous").val();
                var nom = $("#nom").val();
                var prenom = $("#prenom").val();
                var email = $("#email").val();
                var adresse = $("#adresse").val();
                var telephone = $("#telephone").val();

                $("#nom_disp").html(nom);
                $("#prenom_disp").html(prenom);
                $("#email_disp_valide").html(email);
                $("#telephone_disp_valide").html(telephone);
                $("#adresse_disp_valide").html(adresse);
                $("#agence_disp_valide").html(region);
                $("#prestation_disp_valide").html(prestation);
                $("#nature_disp_valide").html(nature);
                $("#date_disp").html(date_rendezvous);
                $("#heure_disp").html(heure_rendezvous);

                $.ajax({
                    type: 'GET',
                    url: "{{ route('horaire.ajax') }}",
                    dataType: 'json',
                    data: {
                        date_rendezvous: date_rendezvous,
                        heure_rendezvous: heure_rendezvous,
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data == 'error') {
                            swal({
                                title: "Incorrect !",
                                text: "Ce creneau à été déjà réservé",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#date_rendezvous').addClass("form-control-danger");
                        } else {
                            $('#date_rendezvous').removeClass("form-control-danger");
                        }

                    }
                })
                // alert(prestation)
            });


            // $('#mail').blur(function() {
            //     var inputValue = $(this).val();
            //     $('#small-modal-test').modal('show');
            //     console.log(inputValue);
            // });

            $('#type').change(function() {
                var type = $(this).val();
                // console.log(type);
                if (type == 'Assure' || type == 'Employeur')
                    $('#num').text('N° Immatriculation');
                else
                    $('#num').text('N° Pension');

                $('#numDiv').show();

                if (type == "null")
                    $('#numDiv').hide();

            });

            $('#type2').change(function() {
                var type2 = $(this).val();
                console.log(type2);
                if (type2 == 'Assure' || type2 == 'Employeur')
                    $('#num2').text('N° Immatriculation');
                else
                    $('#num2').text('N° Pension');

                $('#numDiv2').show();

                if (type2 == "null")
                    $('#numDiv2').hide();

            });

            $("#non").click(function() {
                $("#no_emp_wrapper").hide();
                $("#nom").prop("readonly", false);
                $("#prenom").prop("readonly", false);
            });
            $("#oui").click(function() {
                $("#no_emp_wrapper").show();
                $("#nom").prop("readonly", true);
                $("#prenom").prop("readonly", true);
            });
            let selected_type = $("#type-rdv option:selected").val();
            //alert(selected_type)
            if (selected_type == "Assure") {
                $("#nom").prop("readonly", true);
                $("#prenom").prop("readonly", true);
            }
            $('#type-rdv').change(function() {
                var type_rdv = $(this).val();
                // console.log(type);
                if (type_rdv == 'Employeur') {

                    $('#title').text('N° Immatriculation');
                    $("#raison_sociale_wrapper").show();
                    $("#nom").prop("readonly", false);
                    $("#prenom").prop("readonly", false);
                } else if (type_rdv == 'Assure') {

                    $('#title').text('N° Immatriculation');
                    $("#nom").prop("readonly", true);
                    $("#prenom").prop("readonly", true);
                    $("#raison_sociale_wrapper").hide();
                    $("#no_emp_wrapper").show();
                } else if (type_rdv == 'Retraite' || type_rdv == 'Reversion') {

                    $('#title').text('N° Pension');
                    $("#raison_sociale_wrapper").hide();
                    $("#nom").prop("readonly", true);
                    $("#prenom").prop("readonly", true);
                } else {
                    $("#no_emp_wrapper").hide();
                    $("#nom").prop("readonly", false);
                    $("#prenom").prop("readonly", false);
                    $("#raison_sociale_wrapper").hide();
                }

            });
            $('#no_employe').blur(function() {
                var no_employe = $(this).val();
                var typerdv = $("#type-rdv").val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('info.ajax') }}",
                    dataType: 'json',
                    data: {
                        no_employe: no_employe,
                        typerdv: typerdv,
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data == 'null') {
                            swal({
                                title: "Incorrect !",
                                text: "Le champs est vide.",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#no_employe').addClass("form-control-danger");

                        } else if (data == 'not exist') {
                            swal({
                                title: "Incorrect !",
                                text: "Le Numero n'existe pas.",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#no_employe').addClass("form-control-danger");
                        } else {
                            //console.log(data[0].nom)
                            $('#no_employe').removeClass("form-control-danger");
                            $('#no_employe').addClass("form-control-success");

                            $("#nom").val(data[0].nom);
                            $("#prenom").val(data[0].prenoms);
                            $("#raison_sociale").val(data[0].raison_sociale);
                        }

                    }
                })
            });
            // var checked = $("#oui").prop("checked", true);
            // if (checked) {
            //     $("#no_emp_wrapper").show();
            //     $("#nom").prop("disabled", true);
            //     $("#prenom").prop("disabled", true);
            // } else {
            //     $("#nom").prop("disabled", false);
            //     $("#prenom").prop("disabled", false);
            // }

            // $("#rendezvous-form").submit(function(e) {
            //     e.preventDefault();
            //     var region = $("#region").val();
            //     var prestation = $("#prestation").val();
            //     var nature = $("#nature ").val();
            //     var date_rendezvous = $("#date_rendezvous").val();
            //     var heure_rendezvous = $("#heure_rendezvous").val();
            //     var nom = $("#nom").val();
            //     var prenom = $("#prenom").val();
            //     var email = $("#email").val();
            //     var adresse = $("#adresse").val();
            //     var telephone = $("#telephone").val();
            //     var autre = $("#autre").val();
            //     var no_employe = $("#no_employe").val();

            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('rendezvous.conf') }}",
            //         dataType: 'json',
            //         data: {
            //             region: region,
            //             prestation: prestation,
            //             nature: nature,
            //             date_rendezvous: date_rendezvous,
            //             heure_rendezvous: heure_rendezvous,
            //             nom: nom,
            //             prenom: prenom,
            //             email: email,
            //             adresse: adresse,
            //             telephone: telephone,
            //             autre: autre,
            //             no_employe: no_employe,
            //         },
            //         success: function(data) {
            //             console.log(data);
            //             if (data == 'error') {
            //                 swal({
            //                     title: "Incorrect !",
            //                     text: "La date ne doit pas etre inferieure à la date du jour.",
            //                     icon: "error",
            //                     button: "OK",
            //                 });

            //             }
            //             if (data == 'error_exist') {
            //                 swal({
            //                     title: "Incorrect !",
            //                     text: "Ce creneau à été déjà réservé.",
            //                     icon: "error",
            //                     button: "OK",
            //                 });

            //             }

            //         }
            //     })
            // });
        });
    </script>
@endsection
