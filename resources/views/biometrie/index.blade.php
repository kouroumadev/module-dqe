@extends('app')
@section('content')
    @include('header')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
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
            max-width: 100%;
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
        #step-group-4,
        #step-group-5 {
            display: none;
        }

        .error {
            border-color: red;
        }
    </style>
    <div class="row mt-3 justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
        <div class="col-md-10">
            <div class="pd-20 mb-30">

                <section class="form-wrapper">
                    <div class="form-container">
                        <form action="" method="post" id="multi-step-form">
                            <div id="form-container-box">
                                <h1 class="form-title">Démande d'enrollement Biometrie</h1>
                                <ul class="custom-progress-bar">
                                    <li id="step1" class="active">Identification</li>
                                    <li id="step2">OTP</li>
                                    <li id="step3">Info</li>
                                    <li id="step4">Téléchargement</li>
                                    <li id="step5">Recap</li>
                                </ul>

                                <!-- =========== Step Group 1 =============== -->
                                <div class="step-group" id="step-group-1">
                                    <h1 class="form-title">Identification</h1>
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-sm-12">
                                            <div class="form-group  ml-2">
                                                <label>N° Employeur</label>
                                                <input type="text" name="no_employeur" id="no_employeur"
                                                    class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="col-6 col-md-6 col-sm-12">

                                            <div class="form-group  ml-2">
                                                <label>Raison Sociale</label>
                                                <input type="text" name="raison_sociale_bio" id="raison_sociale_bio"
                                                    class="form-control" required>
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
                                                <label>Adresse</label>
                                                <input type="text" name="adresse" id="adresse" class="form-control"
                                                    required>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-sm-12">
                                            <div class="form-group  ml-2">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    required>
                                                <small class="form-text text-danger">
                                                    Veillez saisir un mail valide, cette adresse e-mail sera utliser pour
                                                    vous envoyez un OTP à la
                                                    prochaine étape.
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary" id="step-next-1"> Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 2 =============== -->
                                <div class="step-group" id="step-group-2">
                                    <h1 class="form-title">OTP</h1>
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-sm-12 m-auto">
                                            <div class="form-group ">
                                                <label>OTP</label>
                                                <input type="text" name="otp" id="otp" class="form-control"
                                                    required>
                                            </div>

                                        </div>
                                        <div class="col-2 col-md-2 col-sm-12 m-auto">
                                            <button type="button" class="btn btn-primary " id="verif">
                                                Verification</button>

                                        </div>

                                    </div>
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-1"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-2" disabled>Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 3 =============== -->
                                <div class="step-group" id="step-group-3">
                                    <h1 class="form-title">Info Employeur</h1>
                                    <table class="table table-bordered">

                                        <tbody>
                                            <tr>
                                                <th scope="row" colspan="2">1.IDENTIFICATION DE L'ENTREPRISE</th>
                                            </tr>
                                            <tr>
                                                <td scope="row">Numero Employeur</td>
                                                <td scope="row" id="no_emp_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Raison Sociale</td>
                                                <td scope="row" id="raison_sociale_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Categorie</td>
                                                <td scope="row" id="categorie_disp"></td>
                                            </tr>

                                            <tr>
                                                <td scope="row">Ville</td>
                                                <td scope="row" id="ville_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Quartier</td>
                                                <td scope="row" id="quartier_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Telephone</td>
                                                <td scope="row" id="tel_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">E-mail</td>
                                                <td scope="row" id="email_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Adresse</td>
                                                <td scope="row" id="adresse_disp"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-2"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-3">Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 4 =============== -->
                                <div class="step-group" id="step-group-4">
                                    <h1 class="form-title">Télécharger le fichier</h1>
                                    <div class="row">
                                        <div class="col-6 col-md-6 col-sm-12 m-auto">
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label>Fichier à télécharger </label>
                                                    <input type="file" name="fichier" id="fichier"
                                                        class="form-control-file form-control height-auto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3 col-sm-12 m-auto">
                                            <div class="form-group ">
                                                <label>Nombre d'employé(e)</label>
                                                <input type="text" name="nombre_employe" id="nombre_employe"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-3"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-4">Suivant
                                            &#65515;</button>
                                    </div>
                                </div>

                                <!-- =========== Step Group 5 =============== -->
                                <div class="step-group" id="step-group-5">
                                    <h1 class="form-title">Recapitulatif</h1>
                                    <table class="table table-bordered">

                                        <tbody>
                                            <tr>
                                                <th scope="row" colspan="2">1.IDENTIFICATION DE L'ENTREPRISE</th>
                                            </tr>
                                            <tr>
                                                <td scope="row">Numero Employeur</td>
                                                <td scope="row" id="no_emp_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Raison Sociale</td>
                                                <td scope="row" id="raison_sociale_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Categorie</td>
                                                <td scope="row" id="categorie_disp"></td>
                                            </tr>

                                            <tr>
                                                <td scope="row">Ville</td>
                                                <td scope="row" id="ville_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Quartier</td>
                                                <td scope="row" id="quartier_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Telephone</td>
                                                <td scope="row" id="tel_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">E-mail</td>
                                                <td scope="row" id="email_disp"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Adresse</td>
                                                <td scope="row" id="adresse_disp"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mb-3 form-group">
                                        <button type="button" class="btn btn-primary " id="step-prev-4"> &#65513;
                                            Precedent</button>
                                        <button type="button" class="btn btn-primary " id="step-next-5">Suivant
                                            &#65515;</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div id="loading-spinner" class="loading-spinner">
        <img src="{{ asset('theme/gif/Spinner-2.gif') }}" alt="Loading...">
    </div>

    <script>
        window.addEventListener("load", () => {
            const form = document.getElementById("multi-step-form");
            const formContainerBox = document.getElementById("form-container-box");
            const step2 = document.getElementById("step2");
            const step3 = document.getElementById("step3");
            const step4 = document.getElementById("step4");
            const step5 = document.getElementById("step5");

            const stepGroup1 = document.getElementById("step-group-1");
            const stepGroup2 = document.getElementById("step-group-2");
            const stepGroup3 = document.getElementById("step-group-3");
            const stepGroup4 = document.getElementById("step-group-4");
            const stepGroup5 = document.getElementById("step-group-5");

            const stepNext1 = document.getElementById("step-next-1");
            const stepNext2 = document.getElementById("step-next-2");
            const stepNext3 = document.getElementById("step-next-3");
            const stepNext4 = document.getElementById("step-next-4");
            const stepNext5 = document.getElementById("step-next-5");

            const stepPrev1 = document.getElementById("step-prev-1");
            const stepPrev2 = document.getElementById("step-prev-2");
            const stepPrev3 = document.getElementById("step-prev-3");
            const stepPrev4 = document.getElementById("step-prev-4");
            ////////////// input Fields /////////////

            stepNext1.addEventListener("click", () => {
                stepGroup1.style.display = "none";
                stepGroup2.style.display = "block";
                step2.classList.add("active");


            })
            stepNext2.addEventListener("click", () => {
                stepGroup2.style.display = "none";
                stepGroup3.style.display = "block";
                step3.classList.add("active");
            })

            stepNext3.addEventListener("click", () => {
                stepGroup3.style.display = "none";
                stepGroup4.style.display = "block";
                step4.classList.add("active");
            })

            stepNext4.addEventListener("click", () => {
                stepGroup4.style.display = "none";
                stepGroup5.style.display = "block";
                step5.classList.add("active");
            })

            stepPrev1.addEventListener("click", () => {
                stepGroup1.style.display = "block";
                stepGroup2.style.display = "none";
                step2.classList.remove("active");
            })
            stepPrev2.addEventListener("click", () => {
                stepGroup2.style.display = "block";
                stepGroup3.style.display = "none";
                step3.classList.remove("active");
            })
            stepPrev3.addEventListener("click", () => {
                stepGroup3.style.display = "block";
                stepGroup4.style.display = "none";
                step4.classList.remove("active");
            })
            stepPrev4.addEventListener("click", () => {
                stepGroup4.style.display = "block";
                stepGroup5.style.display = "none";
                step5.classList.remove("active");
            })

            $('#no_employeur').blur(function() {
                var no_employeur = $(this).val();
                var typerdv = $("#type-rdv").val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('employeur.info.ajax') }}",
                    dataType: 'json',
                    data: {
                        no_employeur: no_employeur,
                    },
                    success: function(data) {
                        console.log(data[0].no_dni);
                        if (data == 'null') {
                            swal({
                                title: "Incorrect !",
                                text: "Le champs est vide.",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#no_employeur').addClass("form-control-danger");
                            $("#step-next-1").prop("disabled", true);
                            $("#raison_sociale_bio").val("");
                            $("#raison_sociale_bio").attr("readonly", false);

                        } else if (data == 'not exist') {
                            swal({
                                title: "Incorrect !",
                                text: "Le Numero n'existe pas.",
                                icon: "error",
                                button: "OK",
                            });
                            // $("#date_rendezvous").addClass('error');
                            $('#no_employeur').addClass("form-control-danger");
                            $("#step-next-1").prop("disabled", true);
                            $("#raison_sociale_bio").val("");
                            $("#raison_sociale_bio").attr("readonly", false);
                        } else {
                            //console.log(data[0].nom)
                            $('#no_employeur').removeClass("form-control-danger");
                            $('#no_employeur').addClass("form-control-success");

                            // $("#nom").val(data[0].nom);
                            // $("#prenom").val(data[0].prenoms);
                            $("#raison_sociale_bio").val(data[0].raison_sociale);
                            $("#raison_sociale_disp").text(data[0].raison_sociale);
                            $("#no_emp_disp").text(data[0].no_employeur);
                            $("#categorie_disp").text(data[0].categorie);
                            $("#no_emp_disp").text(data[0].no_employeur);
                            $("#ville_disp").text(data[0].ville);
                            $("#quartier_disp").text(data[0].quartier);
                            $("#email_disp").text(data[0].email);
                            $("#adresse_disp").text(data[0].adresse);
                            $("#tel_disp").text(data[0].telephone);
                            $("#raison_sociale_bio").attr("readonly", true);

                        }

                    }
                })
            });

            // if ($("#no_employeur").val() == '') {
            //     $("#step-next-1").prop("disabled", true);
            // } else {
            //     $("#step-next-1").prop("disabled", false);
            // }

            $('#email').blur(function() {
                var email = $(this).val();
                var no_employeur = $("#no_employeur").val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('send.otp.ajax') }}",
                    dataType: 'json',
                    data: {
                        email: email,
                        no_employeur: no_employeur,
                    },
                    beforeSend: function() {
                        $('#loading-spinner').show(); // Show the loading spinner
                    },
                    success: function(data) {
                        if (data == 'null') {
                            swal({
                                title: "Incorrect !",
                                text: "Le champs est vide.",
                                icon: "error",
                                button: "OK",
                            });

                            $("#step-next-1").prop("disabled", true);
                            $('#loading-spinner').hide();


                        } else if (data == 'not exist') {
                            swal({
                                title: "Incorrect !",
                                text: "Le Numero n'existe pas.",
                                icon: "error",
                                button: "OK",
                            });

                            $("#step-next-1").prop("disabled", true);
                            $('#loading-spinner').hide();

                        } else {
                            swal({
                                title: "Succès!",
                                text: "Un OTP à été envoyé à l'email." + email,
                                icon: "success",
                                button: "OK",
                            });
                            $('#loading-spinner').hide();
                            $("#step-next-1").prop("disabled", false);
                        }


                    }
                })
            });

            $("#verif").click(function() {

                var otp = $("#otp").val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('verif.otp.ajax') }}",
                    dataType: 'json',
                    data: {
                        otp: otp,
                    },
                    beforeSend: function() {
                        $('#loading-spinner').show(); // Show the loading spinner
                    },
                    success: function(data) {
                        if (data == 'success') {


                            $("#step-next-2").prop("disabled", false);
                            $('#loading-spinner').hide();
                            $('#otp').addClass("form-control-success");


                        } else {
                            swal({
                                title: "Incorrect !",
                                text: "Le Numero n'existe pas.",
                                icon: "error",
                                button: "OK",
                            });

                            $("#step-next-2").prop("disabled", true);
                            $('#loading-spinner').hide();
                        }


                    }
                })
            });

            $("#nombre_employe").blur(function() {
                let nombreEmploye = $("#nombre_employe").val();


                if (nombreEmploye == '' || fichier == '') {
                    swal({
                        title: "Incorrect !",
                        text: "Les champs ne doit pas etre vide",
                        icon: "error",
                        button: "OK",
                    });
                    $("#step-next-4").prop("disabled", true);
                    $('#nombre_employe').addClass("form-control-danger");
                    $('#fichier').addClass("form-control-danger");
                } else {
                    $("#step-next-4").prop("disabled", false);
                    $('#nombre_employe').removeClass("form-control-danger");
                    $('#fichier').removeClass("form-control-danger");

                }

            });
            // $("#fichier").blur(function() {

            //     let fichier = $("#fichier").val();

            //     if (fichier == '') {
            //         swal({
            //             title: "Incorrect !",
            //             text: "Les champs ne doit pas etre vide",
            //             icon: "error",
            //             button: "OK",
            //         });
            //         $("#step-next-4").prop("disabled", true);
            //         $('#fichier').addClass("form-control-danger");
            //     } else {
            //         $("#step-next-4").prop("disabled", false);
            //         $('#fichier').removeClass("form-control-danger");


            //     }

            // });

        })
    </script>
@endsection
