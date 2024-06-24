@extends('app')
@section('content')
    {{-- @include('header') --}}



    {{-- <div class="row justify-content-center">
        <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">
            <h2 class="text-center bg-success text-white p-2">GESTION DES RENDEZ-VOUS</h2>

            <div class="pd-20 card-box">
                
                <div class="tab">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-success text-uppercase" data-toggle="tab" href="#home5"
                                role="tab" aria-selected="true">Dossiers non traité(s):
                                {{ count($rendezvous_process) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success text-uppercase" data-toggle="tab" href="#profile5"
                                role="tab" aria-selected="false">Dossiers traité(s): {{ count($rendezvous_done) }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home7" role="tabpanel">
                            <div class="pd-20">
                                <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                    <div class="pd-20">
                                        <h4 class="text-blue h4">Liste des rendez-vous non traités</h4>
                                    </div>
                                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>N° Conf</th>
                                                <th>Date et heure RDV</th>
                                                <th>Nature RDV</th>
                                                <th>Prestation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($rendezvous_process as $rec)
                                                <tr>
                                                    <td>{{ $rec->no_conf }}</td>
                                                    <td>{{ $rec->date_rendezvous }} à {{ $rec->heure_rendezvous }} </td>
                                                    <td>{{ $rec->nature }}</td>
                                                    <td>{{ $rec->prestation }}</td>

                                                    <td>
                                                        <a href="#" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-procla-{{ $rec->id }}" type="button">

                                                            en attente de validation
                                                            <span class="spinner-grow text-danger spinner-grow-sm"
                                                                role="status" aria-hidden="true">
                                                            </span>
                                                           
                                                        </a>
                                                    </td>
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="modal-procla-{{ $rec->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-center"
                                                                        id="myLargeModalLabel">DOSSIER REÇU LE:
                                                                        {{ $rec->created_at }}</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mt-2 m-2 justify-content-center">
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">N°
                                                                                DOSSIER:</span>
                                                                            <span
                                                                                class="float-right font-weight-bold">{{ $rec->no_conf }}</span>
                                                                            <br>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">NATURE
                                                                                RENDEZ-VOUS:</span>
                                                                            <span
                                                                                class="float-right font-weight-bold">{{ $rec->nature }}</span>
                                                                            <br>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Détails sur
                                                                                l'applicant(e)</h5>
                                                                        </div>
                                                                        <div class="col-md-6">


                                                                            <span class="font-weight-bold">N°
                                                                                Immatriculation:</span>
                                                                            @if ($rec->no_immatriculation == null)
                                                                                <span
                                                                                    class="float-right text-danger">-</span>
                                                                                <br>
                                                                            @else
                                                                                <span
                                                                                    class="float-right">{{ $rec->no_immatriculation }}</span>
                                                                                <br>
                                                                            @endif
                                                                           

                                                                            <span class="font-weight-bold">Nom:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->nom }}</span>
                                                                            <br>
                                                                            @if ($rec->type != 'Employeur')
                                                                                <span
                                                                                    class="font-weight-bold">Prenom:</span>
                                                                                <span
                                                                                    class="float-right">{{ $rec->prenom }}</span>
                                                                                <br>
                                                                            @endif

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">Adresse:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->adresse }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Adresse
                                                                                e-mail:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->email }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Téléphone:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->telephone }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Agence:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->agence }}</span>
                                                                            <br>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row m-2 justify-content-center">
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Détails sur
                                                                                Le Rendez-vous</h5>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="pd-20 card-box height-100-p">
                                                                                <h4 class="mb-20 h6 font-weight-bold">
                                                                                    Date:
                                                                                    <span>{{ $rec->date_rendezvous }}</span>
                                                                                </h4>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="pd-20 card-box height-100-p">
                                                                                <h4 class="mb-20 h6 font-weight-bold">
                                                                                    Heure:
                                                                                    <span>{{ $rec->heure_rendezvous }}</span>
                                                                                </h4>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="pd-20 card-box height-100-p">
                                                                                <h4 class="mb-20 h6 font-weight-bold">
                                                                                    Prestation:
                                                                                    <span>{{ $rec->prestation }}</span>
                                                                                </h4>

                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('rendezvous.back.validation', $rec->id) }}"
                                                                        class="btn btn-warning">Validé
                                                                        RDV <i class="fa fa-check"
                                                                            aria-hidden="true"></i></a>
                                                                    <a href="{{ route('valide.pdf', $rec->id) }}"
                                                                        class="btn btn-success">Voir la fiche de
                                                                        RDV <i class="fa fa-print"
                                                                            aria-hidden="true"></i></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile7" role="tabpanel">
                            <div class="pd-20">
                                <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                    <div class="pd-20">
                                        <h4 class="text-blue h4">Liste des Rendez-vous Validés</h4>
                                    </div>
                                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                                        id="DataTables_Table_0" role="grid"
                                        aria-describedby="DataTables_Table_0_info">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>N° Conf</th>
                                                <th>Date et heure RDV</th>
                                                <th>Nature RDV</th>
                                                <th>Prestation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($rendezvous_done as $rec)
                                               
                                                <tr>
                                                    <td>{{ $rec->no_conf }}</td>
                                                    <td>{{ $rec->date_rendezvous }} à {{ $rec->heure_rendezvous }} </td>
                                                    <td>{{ $rec->nature }}</td>
                                                    <td>{{ $rec->prestation }}</td>

                                                    <td>
                                                        <a href="#" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-procla-{{ $rec->id }}"
                                                            type="button">
                                                            Validé
                                                            <span class="spinner-grow text-danger spinner-grow-sm"
                                                                role="status" aria-hidden="true">
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="modal-procla-{{ $rec->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-center"
                                                                        id="myLargeModalLabel">DOSSIER REÇU LE:
                                                                        {{ $rec->created_at }}</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mt-2 m-2 justify-content-center">
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">N°
                                                                                DOSSIER:</span>
                                                                            <span
                                                                                class="float-right font-weight-bold">{{ $rec->no_conf }}</span>
                                                                            <br>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">NATURE
                                                                                RENDEZ-VOUS:</span>
                                                                            <span
                                                                                class="float-right font-weight-bold">{{ $rec->nature }}</span>
                                                                            <br>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Détails sur
                                                                                l'applicant(e)</h5>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span
                                                                                class="font-weight-bold">Prestation:</span>
                                                                            <span
                                                                                class="float-right text-uppercase">{{ $rec->prestation }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">N°
                                                                                Immatriculation:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->no_immatriculation }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Nom:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->nom }}</span>
                                                                            <br>
                                                                            @if ($rec->type != 'Employeur')
                                                                                <span
                                                                                    class="font-weight-bold">Prenom:</span>
                                                                                <span
                                                                                    class="float-right">{{ $rec->prenom }}</span>
                                                                                <br>
                                                                            @endif

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span class="font-weight-bold">Adresse:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->adresse }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Adresse
                                                                                e-mail:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->email }}</span>
                                                                            <br>

                                                                            <span
                                                                                class="font-weight-bold">Téléphone:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->telephone }}</span>
                                                                            <br>

                                                                            <span class="font-weight-bold">Agence:</span>
                                                                            <span
                                                                                class="float-right">{{ $rec->agence }}</span>
                                                                            <br>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row m-2 justify-content-center">
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Détails sur
                                                                                Le Rendez-vous</h5>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="pd-20 card-box height-100-p">
                                                                                <h4 class="mb-20 h6 font-weight-bold">
                                                                                    Date:</h4>
                                                                                
                                                                                <div>
                                                                                    <span>{{ $rec->date_rendezvous }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="pd-20 card-box height-100-p">
                                                                                <h4 class="mb-20 h6 font-weight-bold">
                                                                                    Heure:</h4>
                                                                               
                                                                                <div>
                                                                                    <span>{{ $rec->heure_rendezvous }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id=""
                                                                        class="btn btn-warning">Validé le RDV</button>
                                                                    <a href="{{ route('reclamation.home.pdf', $rec->id) }}"
                                                                        class="btn btn-success">Voir la fiche de
                                                                        RDV <i class="fa fa-print"
                                                                            aria-hidden="true"></i></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div> --}}


    <div class="margin-top: 100px;">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>GESTION DES RENDEZ-VOUS</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('reclamation.back') }}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Rendez-vous</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#timeline"
                                                role="tab">Dossiers non traité(s):
                                                {{ count($rendezvous_process) }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Dossiers
                                                traité(s):
                                                {{ count($rendezvous_done) }}</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <!-- Timeline Tab start -->
                                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                            <div class="pd-20">
                                                <div class="profile-timeline">
                                                    <table
                                                        class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead class="bg-success">
                                                            <tr>
                                                                <th>N° Conf</th>
                                                                <th>Date et heure RDV</th>
                                                                <th>Nature RDV</th>
                                                                <th>Prestation</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($rendezvous_process as $rec)
                                                                <tr>
                                                                    <td>{{ $rec->no_conf }}</td>
                                                                    <td>{{ $rec->date_rendezvous }} à
                                                                        {{ $rec->heure_rendezvous }} </td>
                                                                    <td>{{ $rec->nature }}</td>
                                                                    <td>{{ $rec->prestation }}</td>

                                                                    <td>
                                                                        <a href="#" class="btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-procla-{{ $rec->id }}"
                                                                            type="button">

                                                                            en attente de validation
                                                                            <span
                                                                                class="spinner-grow text-danger spinner-grow-sm"
                                                                                role="status" aria-hidden="true">
                                                                            </span>

                                                                        </a>
                                                                    </td>
                                                                    <div class="modal fade bs-example-modal-lg"
                                                                        id="modal-procla-{{ $rec->id }}" tabindex="-1"
                                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title text-center"
                                                                                        id="myLargeModalLabel">DOSSIER REÇU
                                                                                        LE:
                                                                                        {{ $rec->created_at }}</h4>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-hidden="true">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div
                                                                                        class="row mt-2 m-2 justify-content-center">
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">N°
                                                                                                DOSSIER:</span>
                                                                                            <span
                                                                                                class="float-right font-weight-bold">{{ $rec->no_conf }}</span>
                                                                                            <br>
                                                                                            <hr>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">NATURE
                                                                                                RENDEZ-VOUS:</span>
                                                                                            <span
                                                                                                class="float-right font-weight-bold">{{ $rec->nature }}</span>
                                                                                            <br>
                                                                                            <hr>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-12 bg-success p-1">
                                                                                            <h5
                                                                                                class="text-center text-white">
                                                                                                Détails sur
                                                                                                l'applicant(e)</h5>
                                                                                        </div>
                                                                                        <div class="col-md-6">


                                                                                            <span
                                                                                                class="font-weight-bold">N°
                                                                                                Immatriculation:</span>
                                                                                            @if ($rec->no_immatriculation == null)
                                                                                                <span
                                                                                                    class="float-right text-danger">-</span>
                                                                                                <br>
                                                                                            @else
                                                                                                <span
                                                                                                    class="float-right">{{ $rec->no_immatriculation }}</span>
                                                                                                <br>
                                                                                            @endif


                                                                                            <span
                                                                                                class="font-weight-bold">Nom:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->nom }}</span>
                                                                                            <br>
                                                                                            @if ($rec->type != 'Employeur')
                                                                                                <span
                                                                                                    class="font-weight-bold">Prenom:</span>
                                                                                                <span
                                                                                                    class="float-right">{{ $rec->prenom }}</span>
                                                                                                <br>
                                                                                            @endif

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">Adresse:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->adresse }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Adresse
                                                                                                e-mail:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->email }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Téléphone:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->telephone }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Agence:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->agence }}</span>
                                                                                            <br>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row m-2 justify-content-center">
                                                                                        <div
                                                                                            class="col-md-12 bg-success p-1">
                                                                                            <h5
                                                                                                class="text-center text-white">
                                                                                                Détails sur
                                                                                                Le Rendez-vous</h5>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div
                                                                                                class="pd-20 card-box height-100-p">
                                                                                                <h4
                                                                                                    class="mb-20 h6 font-weight-bold">
                                                                                                    Date:
                                                                                                    <span>{{ $rec->date_rendezvous }}</span>
                                                                                                </h4>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div
                                                                                                class="pd-20 card-box height-100-p">
                                                                                                <h4
                                                                                                    class="mb-20 h6 font-weight-bold">
                                                                                                    Heure:
                                                                                                    <span>{{ $rec->heure_rendezvous }}</span>
                                                                                                </h4>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div
                                                                                                class="pd-20 card-box height-100-p">
                                                                                                <h4
                                                                                                    class="mb-20 h6 font-weight-bold">
                                                                                                    Prestation:
                                                                                                    <span>{{ $rec->prestation }}</span>
                                                                                                </h4>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>



                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a href="{{ route('rendezvous.back.validation', $rec->id) }}"
                                                                                        class="btn btn-warning">Validé
                                                                                        RDV <i class="fa fa-check"
                                                                                            aria-hidden="true"></i></a>
                                                                                    <a href="{{ route('valide.pdf', $rec->id) }}"
                                                                                        class="btn btn-success">Voir la
                                                                                        fiche de
                                                                                        RDV <i class="fa fa-print"
                                                                                            aria-hidden="true"></i></a>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Timeline Tab End -->
                                        <!-- Tasks Tab start -->
                                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                                            <div class="pd-20">
                                                <div class="profile-timeline">

                                                    <table
                                                        class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead class="bg-success">
                                                            <tr>
                                                                <th>N° Conf</th>
                                                                <th>Date et heure RDV</th>
                                                                <th>Nature RDV</th>
                                                                <th>Prestation</th>
                                                                <th>Date validation</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($rendezvous_done as $rec)
                                                                <tr>
                                                                    <td>{{ $rec->no_conf }}</td>
                                                                    <td>{{ $rec->date_rendezvous }} à
                                                                        {{ $rec->heure_rendezvous }} </td>
                                                                    <td>{{ $rec->nature }}</td>
                                                                    <td>{{ $rec->prestation }}</td>
                                                                    <td>{{ $rec->date_validation }}</td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-procla-{{ $rec->id }}"
                                                                            type="button">
                                                                            Validé
                                                                        </a>
                                                                    </td>
                                                                    <div class="modal fade bs-example-modal-lg"
                                                                        id="modal-procla-{{ $rec->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="myLargeModalLabel"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title text-center"
                                                                                        id="myLargeModalLabel">DOSSIER REÇU
                                                                                        LE:
                                                                                        {{ $rec->created_at }}</h4>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-hidden="true">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div
                                                                                        class="row mt-2 m-2 justify-content-center">
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">N°
                                                                                                DOSSIER:</span>
                                                                                            <span
                                                                                                class="float-right font-weight-bold">{{ $rec->no_conf }}</span>
                                                                                            <br>
                                                                                            <hr>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">NATURE
                                                                                                RENDEZ-VOUS:</span>
                                                                                            <span
                                                                                                class="float-right font-weight-bold">{{ $rec->nature }}</span>
                                                                                            <br>
                                                                                            <hr>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-12 bg-success p-1">
                                                                                            <h5
                                                                                                class="text-center text-white">
                                                                                                Détails sur
                                                                                                l'applicant(e)</h5>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">Prestation:</span>
                                                                                            <span
                                                                                                class="float-right text-uppercase">{{ $rec->prestation }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">N°
                                                                                                Immatriculation:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->no_immatriculation }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Nom:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->nom }}</span>
                                                                                            <br>
                                                                                            @if ($rec->type != 'Employeur')
                                                                                                <span
                                                                                                    class="font-weight-bold">Prenom:</span>
                                                                                                <span
                                                                                                    class="float-right">{{ $rec->prenom }}</span>
                                                                                                <br>
                                                                                            @endif

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="font-weight-bold">Adresse:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->adresse }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Adresse
                                                                                                e-mail:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->email }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Téléphone:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->telephone }}</span>
                                                                                            <br>

                                                                                            <span
                                                                                                class="font-weight-bold">Agence:</span>
                                                                                            <span
                                                                                                class="float-right">{{ $rec->agence }}</span>
                                                                                            <br>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row m-2 justify-content-center">
                                                                                        <div
                                                                                            class="col-md-12 bg-success p-1">
                                                                                            <h5
                                                                                                class="text-center text-white">
                                                                                                Détails sur
                                                                                                Le Rendez-vous</h5>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div
                                                                                                class="pd-20 card-box height-100-p">
                                                                                                <h4
                                                                                                    class="mb-20 h6 font-weight-bold">
                                                                                                    Date:</h4>

                                                                                                <div>
                                                                                                    <span>{{ $rec->date_rendezvous }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div
                                                                                                class="pd-20 card-box height-100-p">
                                                                                                <h4
                                                                                                    class="mb-20 h6 font-weight-bold">
                                                                                                    Heure:</h4>

                                                                                                <div>
                                                                                                    <span>{{ $rec->heure_rendezvous }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>



                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" id=""
                                                                                        class="btn btn-warning">Validé le
                                                                                        RDV</button>
                                                                                    <a href="{{ route('reclamation.home.pdf', $rec->id) }}"
                                                                                        class="btn btn-success">Voir la
                                                                                        fiche de
                                                                                        RDV <i class="fa fa-print"
                                                                                            aria-hidden="true"></i></a>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tasks Tab End -->
                                        <!-- Setting Tab start -->

                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
