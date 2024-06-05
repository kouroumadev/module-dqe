@extends('app')
@section('content')
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


    <div class="main-container px-5">

        <div class="row mt-3 justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-md-10">
                <div class="pd-20 mb-30">

                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard horizontal" action="{{ route('rendezvous.conf') }}"
                            method="post">
                            @csrf

                            <h5>Choix de la Prestation</h5>
                            <section>
                                <h2 class="text-center" style="margin-bottom: 35px"> Choix de la Prestation</h2>
                                <hr>
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
                            </section>
                            <!-- Step 2 -->
                            <h5>Choix du creneau</h5>
                            <section>

                                <h2 class="text-center" style="margin-bottom: 35px"> Choix du creneau</h2>
                                <hr>
                                <div class="row align-items-center" style="margin-left: 15px">

                                    {{-- <table>
                                        <tr>
                                            <th>Agence:</th>
                                            <td id="agence_disp_creneau"></td>
                                        </tr>
                                        <tr>
                                            <th>Nature du rendez-vous:</th>
                                            <td id="nature_disp_creneau"></td>
                                        </tr>
                                        <tr>
                                            <th>Prestation:</th>
                                            <td id="prestation_disp_creneau"></td>
                                        </tr>
                                    </table> --}}
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

                                <h5 class="">Pour confirmer le rendez vous, remplissez les champs ci-dessous :</h5>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-6">

                                        <div class="form-group  ml-2">
                                            <label>No employe/employeur</label>
                                            <input type="text" name="no_employe" id="no_employe" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group  ml-2">
                                            <label>Nom</label>
                                            <input type="text" name="nom" id="nom" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group  ml-2">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group  ml-2">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone" id="telephone" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group  ml-2">
                                            <label>email</label>
                                            <input type="text" name="email" id="email" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-6">

                                        <div class="form-group  ml-2">
                                            <label>adresse</label>
                                            <textarea type="text" name="adresse" id="adresse" class="form-control"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Valider le RDV</button>
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

            $('#nature').change(function() {

                //alert(prestation)
                var nature_val = $("#nature").val();
                // alert(nature_val);
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
                            $('select[name="prestation"]').append('<option value="' +
                                value.libelle + '">' +
                                value.libelle + '</option>')
                        })
                    }
                })


            });
            $('#heure_rendezvous').blur(function() {
                var region = $("#region").val();
                var prestation = $("#prestation option:selected").text();
                var nature = $("#nature option:selected").text();
                var date_rendezvous = $("#date_rendezvous").val();
                var heure_rendezvous = $("#heure_rendezvous").val();

                $("#agence_disp_valide").html(region);
                $("#prestation_disp_valide").html(prestation);
                $("#nature_disp_valide").html(nature);
                $("#date_disp").html(date_rendezvous);
                $("#heure_disp").html(heure_rendezvous);
                // alert(prestation)
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
