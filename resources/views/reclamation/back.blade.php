@extends('app')
@section('content')
    @include('header')
    <div style="margin-top: 100px;">

        <div class="row m-auto">
            <div class="col-10 m-auto">
                <div class="row justify-content-center">

                    <div class="col-xl-5 mb-30">
                        <a href="{{ route('reclamation.dqe') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-success shadow">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="widget-data text-white text-uppercase font-weight-bold text-left">
                                        GESTION DES RECLAMATIONS
                                    </div>
                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-edit fa-3x text-white" aria-hidden="true"></i>
                                    </div>
                                    <small class="text-white text-justify my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat enim possimus dolores facilis recusandae dignissimos, voluptatum omnis mollitia tempora voluptates, tempore officia impedit, eligendi officiis explicabo. Fugit est eos illum!
                                    </small>

                                </div>
                                <div class="alert alert-primary" role="alert">
                                    <span class="badge badge-warning font-weight-bold">{{ $recla }}</span> Dossiers en attentes
                                </div>
                                {{-- <small class="text-danger">({{ $recla }} Dossiers en attentes)</small> --}}

                            </div>
                        </a>
                    </div>

                    <div class="col-xl-5 mb-30">
                        <a href="{{ route('rendezvous.liste') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-success shadow-lg">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="widget-data text-white text-uppercase font-weight-bold text-left">
                                        GESTION DES RENDEZ-VOUS
                                    </div>
                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-calendar fa-3x text-white"></i>
                                    </div>
                                    <small class="text-white text-justify my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat enim possimus dolores facilis recusandae dignissimos, voluptatum omnis mollitia tempora voluptates, tempore officia impedit, eligendi officiis explicabo. Fugit est eos illum!
                                    </small>
                                    {{-- <small class="pl-1 text-white">Gestion de la situation des pensionnés</small> --}}
                                </div>
                                <div class="alert alert-primary" role="alert">
                                    <span class="badge badge-warning font-weight-bold">12</span> Dossiers en attentes
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-1 mb-30">
                        <a href="{{ route('logout') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-danger shadow-lg">
                                <div class="d-flex flex-wrap align-items-center">
                                    {{-- <div class="widget-data text-white text-uppercase font-weight-bold text-left">
                                        DECONNEXION
                                    </div> --}}
                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-power-off fa-2x text-white" aria-hidden="true"></i>
                                    </div>
                                    {{-- <small class="pl-1 text-white">Gestion de la situation des pensionnés</small> --}}
                                </div>
                            </div>
                        </a>
                    </div>


                </div>

            </div>

        </div>

        <div class="card-box m-auto shadow-lg p-3 mb-5 bg-white rounded" style="font-size: 14px; width:70%">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('logos/main-logo.png') }}" alt="img" width="400px" height="400px">
                </div>
                <div class="col-md-8">
                    <h6 class="font-20 mb-10 ">
                        Bienvenue sur la plateforme de prise de rendez-vous et de réclamation de la Caisse Nationale de
                        Sécurité Sociale:

                    </h6>
                    <p class="font-18 max-width-600">

                        Afin de vous assurer le meilleur accueil, la CNSS a mis à votre disposition une plateforme de
                        prise de rendez-vous et de réclamation en ligne sur le site <a
                            href="https://www.reclamations.cnssgn.com/index"
                            class="text-success">reclamations.cnssgn.com</a> .
                        Vous pouvez choisir et planifier votre rendez-vous ou faire une réclamation avec nos services, selon
                        vos
                        propres
                        disponibilités et préférences. </p>
                </div>


            </div>
        </div>
    </div>
@endsection

