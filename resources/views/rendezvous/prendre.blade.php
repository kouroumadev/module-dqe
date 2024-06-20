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
                            method="post">
                            @csrf

                            <h5>Identification</h5>
                            <section>
                                <h2 class="text-center" style="margin-bottom: 35px"> Identification</h2>
                                <hr>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-6 col-md-6 col-sm-12">

                                        <div class="row">
                                            <div class="col-ms-6" style="margin-left:15px;">
                                                <p>Etes vous ? un(e) assuré(e) ou employeur</p>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                        id="oui" value="oui">
                                                    <label class="form-check-label" for="oui">OUI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                        id="non" value="non">
                                                    <label class="form-check-label" for="non">NON</label>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">


                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group  ml-2">
                                            <label>Nom</label>
                                            <input type="text" name="nom" id="nom" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">
                                        <div class="form-group" id="no_emp_wrapper" style="display: none; margin-left:15px">
                                            <label>No employe/employeur</label>
                                            <input type="text" name="no_employe" id="no_employe" value=""
                                                placeholder="n° assuré(e)" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-6 col-sm-12">

                                        <div class="form-group  ml-2">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12">

                                        <div class="form-group  ml-2">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone" id="telephone" class="form-control"
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
                                        <button type="submit" class="btn btn-success" id="send-rdv">Valider le
                                            RDV</button>
                                    </div>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>
                {{-- <section class="form-wrapper">
                    <div class="form-container">
                        <form action="{{ route('rendezvous.conf') }}" method="post" id="multi-step-form">
                            @csrf
                            <div id="form-container-box">
                                <h1 class="form-title">Multi Step Form</h1>
                                <ul class="custom-progress-bar">
                                    <li id="step1" class="active">User Info</li>
                                    <li id="step2">Choix de la Prestation</li>
                                    <li id="step3">Choix du creneau</li>
                                    <li id="step4">Validation</li>
                                </ul>

                                <!-- =========== Step Group 1 =============== -->
                                <div class="step-group" id="step-group-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Etes-vous ? <span class="text-danger">*</span></label>
                                                <select name="type2" required id="type2" class="custom-select col-12">
                                                    <option selected value="null">-- Aucune selecion --</option>
                                                    <option value="Assure">Assuré</option>
                                                    <option value="Employeur">Employeur</option>
                                                    <option value="Retraite">Retraite</option>
                                                    <option value="Reversion">Reversion</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="numDiv2" style="display:none">
                                                <label id="num2"> <span class="text-danger">*</span></label>
                                                <input name="numero2" required type="text" id="numero2"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group  ml-2">
                                                <label>Prenom</label>
                                                <input type="text" name="prenom" id="prenom" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group  ml-2">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" id="telephone" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group  ml-2">
                                                <label>email</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    required>
                                            </div>

                                        </div>
                                        <div class="col-6">

                                            <div class="form-group  ml-2">
                                                <label>adresse</label>
                                                <textarea type="text" name="adresse" id="adresse" class="form-control" required></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-next-1">Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 2 =============== -->
                                <div class="step-group" id="step-group-2">
                                    <div class="row" style="margin-left: 15px">
                                        <div class="col-5">
                                            <div class="form-group  ml-2">
                                                <label>Region</label>
                                                <select class="custom-select" name="region" id="region">

                                                    @foreach ($agence as $value)
                                                        <option value="{{ $value->libelle }}">{{ $value->libelle }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" style="margin-left: 15px">
                                        <div class="col-5">

                                            <div class="form-group  ml-2">
                                                <label>Nature du rendez-vous</label>
                                                <select class="custom-select" name="nature" id="nature">
                                                    @foreach ($nature as $value)
                                                        <option value="{{ $value->id }}" selected>{{ $value->libelle }}
                                                        </option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" style="margin-left: 15px">
                                        <div class="col-5">
                                            <div class="form-group  mr-2">
                                                <div class="form-group  ml-2">
                                                    <label>Prestation</label>
                                                    <select class="custom-select" name="prestation" id="prestation">


                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-1"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-2">Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 3 =============== -->
                                <div class="step-group" id="step-group-3">
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
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-2"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-3">suivant
                                            &#65515;</button>
                                    </div>


                                </div>

                                <!-- =========== Step Group 4 =============== -->
                                <div class="step-group" id="step-group-4">
                                    <div class="row align-items-center">

                                        <table style="margin-left: 15px; margin-bottom:10px;">
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
                                                <td> <span id="date_disp"></span> <span id="heure_disp"></span> </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-3"> &#65513;
                                            Precedent</button>
                                        <button type="submit" class="btn btn-primary " id="step-next-4">envoye
                                            &#65515;</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section> --}}
            </div>
        </div>

    </div>

    <div id="loading-spinner" class="loading-spinner">
        <img src="{{ asset('theme/gif/Spinner-2.gif') }}" alt="Loading...">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {



            $('#send-rdv').prop('disabled', true);
            $('.form-control').on('change', function() {
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
                if (region != '' && nature != '' && prestation != '' && date_rendezvous != '' &&
                    heure_rendezvous != '' && nom != '' && prenom != '' && telephone != '' && email != '' &&
                    adresse != '') {
                    $('#send-rdv').prop('disabled', false);
                } else {
                    $('#send-rdv').prop('disabled', true);
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
            });
            $("#oui").click(function() {
                $("#no_emp_wrapper").show();
            });
        });

        $(function() {
            $("#date_rendezvous").datepicker({
                minDate: -20,
                maxDate: "+1M +10D"
            });
        });
    </script>
@endsection
