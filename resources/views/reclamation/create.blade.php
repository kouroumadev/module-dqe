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
                    <form class="tab-wizard wizard-circle wizard vertical">
                        <h5>Mon identité</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Etes-vous ? <span class="text-danger">*</span></label>
                                        <select required id="type" class="custom-select col-12">
                                            <option selected value="null">-- Aucune selecion --</option>
                                            <option value="Nouveau">Nouveau</option>
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
                                        <input required type="text" id="numero" class="form-control">
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
                                        <input id="nom" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <input id="prenom" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <input id="date_naiss" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input id="add_email" readonly type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input id="tel" readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input id="adresse" readonly type="text" class="form-control">
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
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-1">
                                            <label class="custom-control-label" for="customCheck1-1">Retraite personnelle</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-2">
                                            <label class="custom-control-label" for="customCheck1-2">Retraite de réversion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-3">
                                            <label class="custom-control-label" for="customCheck1-3">Allocation de solidarité aux personnes agées</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-4">
                                            <label class="custom-control-label" for="customCheck1-4">Régulation de carrière</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-5">
                                            <label class="custom-control-label" for="customCheck1-5">Retraite de anticipée</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" class="custom-control-input" name="prestation" id="customCheck1-6">
                                            <label class="custom-control-label" for="customCheck1-6">Autre</label>
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
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-7">
                                            <label class="custom-control-label" for="customCheck1-7">Je me perçois plus ma prestation.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-8">
                                            <label class="custom-control-label" for="customCheck1-8">J'attends ma prestation et je suis pas encore payé.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-9">
                                            <label class="custom-control-label" for="customCheck1-9">Le montant de ma prestation a été modifié.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-10">
                                            <label class="custom-control-label" for="customCheck1-10">La mise à jour de ma carrière ne me convient pas.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-11">
                                            <label class="custom-control-label" for="customCheck1-11">Mon changement de situation n'a pas été pris en compte.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-12">
                                            <label class="custom-control-label" for="customCheck1-12">Je ne suis pas satisfait de l'information donnée.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-13">
                                            <label class="custom-control-label" for="customCheck1-13">Je n'ai pas eu de réponse à ma demande.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-14">
                                            <label class="custom-control-label" for="customCheck1-14">Je ne suis pas satisfait des services en ligne.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-15">
                                            <label class="custom-control-label" for="customCheck1-15">Je ne suis pas satisfait de la qualité de vos documents.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-16">
                                            <label class="custom-control-label" for="customCheck1-16">Je ne suis pas satisfait de la qualité de votre accueil.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-17">
                                            <label class="custom-control-label" for="customCheck1-17">Autre.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="weight-600">Details de la demande</label>
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

</div>

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
