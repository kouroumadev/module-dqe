@extends('app')
@section('content')

<div class="main-container px-5">
    <div class="row justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
        <div class="col-md-6">
            <div style="height: 100px; width: 422px;">
                <img src="{{ asset('logos/logo-top-original.png') }}" class="img-fluid" alt="here logo" srcset="">
            </div>
        </div>
        <div class="col-md-6 bg-success">
            <h1 class="text-white text-center mt-3">Formulaire de réclamation</h1>

              <!-- Modal -->
              <div class="modal fade" id="small-modal-test" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Verification</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="form-group">
                                <label >Entrer le code a 4 chiffres envoyé à:</label>
                                <input required type="text"  class="form-control">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
        <div class="col-md-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-danger h4">Tous les champs marqués <span class="text-danger">*</span> sont obligatoires.</h4>
                    <p class="mb-30"></p>
                </div>
                <div class="wizard-content">
                    <form method="POST" action="{{ route('reclamation.store') }}" id="reclamation_frm" class="tab-wizard wizard-circle wizard vertical">
                        @csrf
                        <h5>Mon identité</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Etes-vous ? <span class="text-danger">*</span></label>
                                        <select name="type" required id="type" class="custom-select col-12">
                                            <option selected value="null">-- Aucune selecion --</option>
                                            <option value="Assure">Assuré</option>
                                            <option value="Employeur">Employeur</option>
                                            <option value="Retraite">Retraite</option>
                                            <option value="Reversion">Reversion</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="numDiv" style="display:none;">
                                        <label id="num">N° <span class="text-danger">*</span></label>
                                        <input name="numero" required type="text" id="numero" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone<span class="text-danger">*</span></label>
                                        <input id="telephone" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse Email<span class="text-danger">*</span></label>
                                        <input required type="email" id="mail" class="form-control">
                                        <small class="form-text text-muted">
                                           Cette adresse e-mail sera utliser pour vous envoyez des informations relatives à votre reclamation.
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <!-- Step 2 -->
                        <h5>Mes infos</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input name="nom" id="nom" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <input name="prenom" id="prenom" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <input name="date_naiss" id="date_naiss" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input name="add_email" id="add_email" readonly type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input name="tel" id="tel" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input name="adresse" id="adresse" readonly type="text" class="form-control">
                                    </div>
                                </div>


                            </div>

                        </section>
                        <!-- Step 3 -->
                        <h5>Prestation concernée</h5>
                        <section>
                            <div class="row">
                               @foreach ($prestations as $p)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" value="{{ $p->id }}" id="{{ $p->id }}">
                                            <label class="custom-control-label" for="{{ $p->id }}">{{ $p->value }}</label>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input checked type="radio" class="custom-control-input" value="0" name="prestation" id="customCheck1-666">
                                            <label class="custom-control-label" for="customCheck1-666">Autre</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h5>Motif(s) de ma réclamation</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="weight-600">Motif(s)</label>
                                    @foreach ($motifs as $m)
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" name="motifs[]" value="{{ $m->id }}" class="custom-control-input" id="{{ $m->id }}">
                                            <label class="custom-control-label" for="{{ $m->id }}">{{ $m->value }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" name="motifs[]" value="0" class="custom-control-input" id="customCheck1-100">
                                            <label class="custom-control-label" for="customCheck1-100">Autre</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="weight-600">Details de la demande</label>
                                    <div class="form-group">
                                        <textarea name="details" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-start">
                                <div class="col-md-6">
                                    <button id="btn_send_form" type="button" class="btn btn-success">Soumettre ma reclamation</button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
       var flag = 0;

        $('#btn_send_form').click(function() {
            if(flag == 1){
                swal({
                    title: "Oops!",
                    text: "Veuillez entrer le bon numero d'Immatriculation/Pension",
                    icon: "error",
                    button: "OK",
                });
            } else {

                var type = $("#type").val();
                var numero = $("#numero").val();
                var nom = $("#nom").val();
                var prenom = $("#prenom").val();
                var date_naiss = $("#date_naiss").val();
                var add_email = $("#add_email").val();
                var tel = $("#tel").val();
                var adresse = $("#adresse").val();
                var motifs = $("input[type='checkbox']").is(":checked");

                if(type=="null" || numero=="" || nom=="" || prenom==""
                    || date_naiss=="" || add_email=="" || tel ==""
                    || adresse=="" || motifs==false
                ){
                    swal({
                        title: "Oops!",
                        text: "Veuillez remplir tous les champs obligatoires !!",
                        icon: "error",
                        button: "OK",
                    });
                } else {
                    $("#reclamation_frm").submit();
                }
            }
        });

        // $('#telephone').focus(function() {
        //     console.log('INNNNN');
        // });




        $('#numero').blur(function() {
            var num = $(this).val();
            if(num == '' || num == '0'){
                swal({
                    title: "Oops!",
                    text: "Le champ Immatriculation/Pension est obligatoire !!",
                    icon: "error",
                    button: "OK",
                });
                $('#numero').addClass("form-control-danger");
                flag = 1;

            } else {
                // $('#numero').removeClass("form-control-danger");

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
                        if(data[0] == "non"){
                            swal({
                                title: "Oops!",
                                text: data[1],
                                icon: "error",
                                button: "OK",
                            });
                            $('#numero').addClass("form-control-danger");
                            flag = 1;
                        } else {
                            $('#numero').removeClass("form-control-danger");
                            $('#numero').addClass("form-control-success");
                            $('#nom').val(data[0]);
                            $('#prenom').val(data[1]);
                            $('#date_naiss').val(data[2]);
                            $('#adresse').val(data[3]);
                            flag = 0;
                        }
                        // $('#numero').removeClass("form-control-danger");



                        $('#loading-spinner').hide();
                    },

                });
            }

        });


         $('#mail').blur(function() {
            var tel = $("#telephone").val();
            var mail = $("#mail").val();
            $('#tel').val(tel);
            $('#add_email').val(mail);
         });

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
