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
                                        <select required class="custom-select col-12">
                                            <option selected="">-- Aucune selecion --</option>
                                            <option value="Assure">Assuré</option>
                                            <option value="Employeur">Employeur</option>
                                            <option value="Retraite">Retraite</option>
                                            <option value="Reversion">Reversion</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >N° <span class="text-danger">*</span></label>
                                        <input required type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone<span class="text-danger">*</span></label>
                                        <input required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse Email<span class="text-danger">*</span></label>
                                        <input required type="email" class="form-control">
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
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input readonly type="text" class="form-control">
                                    </div>
                                </div>


                            </div>

                        </section>
                        <!-- Step 3 -->
                        <h5>Prestation concernée</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                                            <label class="custom-control-label" for="customCheck1-1">Retraite personnelle</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-2">
                                            <label class="custom-control-label" for="customCheck1-2">Retraite de réversion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-3">
                                            <label class="custom-control-label" for="customCheck1-3">Allocation de solidarité aux personnes agées</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-4">
                                            <label class="custom-control-label" for="customCheck1-4">Régulation de carrière</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-5">
                                            <label class="custom-control-label" for="customCheck1-5">Retraite de anticipée</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-6">
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
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                                            <label class="custom-control-label" for="customCheck1-1">Je me perçois plus ma prestation.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-2">
                                            <label class="custom-control-label" for="customCheck1-2">J'attends ma prestation et je suis pas encore payé.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-3">
                                            <label class="custom-control-label" for="customCheck1-3">Le montant de ma prestation a été modifié.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-4">
                                            <label class="custom-control-label" for="customCheck1-4">La mise à jour de ma carrière:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-5">
                                            <label class="custom-control-label" for="customCheck1-5">Retraite de anticipée</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-6">
                                            <label class="custom-control-label" for="customCheck1-6">Autre</label>
                                        </div>
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

@endsection
