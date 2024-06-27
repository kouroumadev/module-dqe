@extends('app')
@section('content')
{{-- @include('header') --}}






<div class="row justify-content-center">
    <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">
        {{-- <h2 class="text-center bg-success text-white p-2">GESTION DES RECLAMMATIONS</h2> --}}

        <div class="page-header">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>GESTION DES DEMANDES POUR LA BIOMÉTRIE</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('reclamation.back') }}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Biométrie</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-2">

                    <div>
                        <p>DECONNEXION</p>
                        <a href="{{ route('logout') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-danger shadow-lg" style="width: 50%">
                                <div class="d-flex flex-wrap align-items-center">

                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-power-off fa-2x text-white"
                                            aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>


        <div class="pd-20 card-box">
            {{-- <h5 class="h4 text-blue mb-20">Nav Pills Tabs</h5> --}}
            <div class="tab">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-success text-uppercase" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Dossiers non traité(s): 12</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success text-uppercase" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Dossiers traité(s): 55</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des demandes non traités</h4>
                                </div>
                                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                                    role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-success">
                                        <tr>
                                            {{-- <th class="table-plus text-white">N° Dossier</th> --}}
                                            <th class="table-plus text-white">N° Immat/Pension</th>
                                            <th class="text-white">Prenom & Nom/Employeur</th>
                                            {{-- <th class="text-white">Date Naissance</th>
                                            <th class="text-white">Email</th>
                                            <th class="text-white">Adresse</th>
                                            <th class="text-white">Telephone</th> --}}
                                            {{-- <th class="text-white">Type</th> --}}
                                            {{-- <th class="text-white">Prestation</th> --}}
                                            {{-- <th class="text-white">Motif(s)</th>
                                            <th class="text-white">Details</th> --}}
                                            <th class="datatable-nosort text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <td class="font-weight-bold">{{ $d->no_employeur }}</td>
                                        <td>{{ $d->raison_sociale }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-procla-{{ $d->id }}" type="button">
                                                {{-- <span class="badge"> --}}
                                                    Traitement
                                                    <span class="spinner-grow text-danger spinner-grow-sm" role="status" aria-hidden="true">
                                                    </span>
                                                {{-- </span> --}}
                                            </a>
                                        </td>
                                        <div class="modal fade bs-example-modal-lg" id="modal-procla-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="myLargeModalLabel">DOSSIER REÇU LE: {{ $d->commune }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row mt-2 m-2 justify-content-center">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">N° DOSSIER:</span>
                                                                <span class="float-right font-weight-bold">67676767</span> <br> <hr>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">N° EMPLOYEUR:</span>
                                                                <span class="float-right font-weight-bold">{{ $d->no_employeur }}</span> <br> <hr>
                                                            </div>
                                                            <div class="col-md-12 bg-success p-1">
                                                                <h5 class="text-center text-white">Détails sur l'employeur</h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">EMPLOYEUR:</span>
                                                                <span class="float-right text-uppercase">{{ $d->raison_sociale }}</span> <br>

                                                                <span class="font-weight-bold">EMAIL:</span>
                                                                <span class="float-right">{{ $d->email }}</span> <br>

                                                                <span class="font-weight-bold">TELEPHONE:</span>
                                                                <span class="float-right">{{ $d->telephone }}</span> <br>

                                                                <span class="font-weight-bold">DEBUT ACTIVITE:</span>
                                                                <span class="float-right">{{ $d->debut_activite }}</span> <br>


                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">DATE CREATION:</span>
                                                                <span class="float-right">{{ $d->date_creation }}</span> <br>

                                                                <span class="font-weight-bold">CATEGORIE:</span>
                                                                <span class="float-right">{{ $d->categorie }}</span> <br>

                                                                <span class="font-weight-bold">ADRESSE:</span>
                                                                <span class="float-right">{{ $d->adresse }}</span> <br>


                                                            </div>
                                                       </div>



                                                       <form action="{{ route('reclamation.home.done') }}" method="post" id="bioDoneFrm">
                                                        @csrf
                                                        <div class="row m-2 ">
                                                                <div class="col-md-12 bg-success p-1">
                                                                    <h5 class="text-center text-white">Feedback après traitement du dossier</h5>
                                                                </div>
                                                                <div class="form-group row mt-2 text-left">
                                                                    <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                                                                    <div class="col-sm-12 col-md-10">
                                                                        <input class="form-control" placeholder="Select Date" type="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="weight-600 text-danger">(Ce champs est obligatoire !)</label>
                                                                    <div class="form-group">
                                                                        <textarea required name="details" class="form-control"></textarea>
                                                                        <input type="hidden" name="reclamation_id" value="{{ $d->id }}">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" id="" class="btn btn-warning">Cloturer le dossier</button>
                                                        {{-- <a href="{{ route('reclamation.home.done',$rec->id ) }}" class="btn btn-warning">Cloturer le dossier <i class="fa fa-print" aria-hidden="true"></i></a> --}}
                                                        <a href="{{ route('reclamation.home.pdf',$d->id ) }}" class="btn btn-success">Voir la fiche de reclamation <i class="fa fa-print" aria-hidden="true"></i></a>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des demandes traités</h4>
                                </div>
                                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                                    role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-success">
                                        <tr>
                                            <th class="table-plus text-white">N° Dossier</th>
                                            <th class="table-plus text-white">N° Immat/Pension</th>
                                            <th class="text-white">Prenom & Nom/Employeur</th>
                                            {{-- <th class="text-white">Date Naissance</th>
                                            <th class="text-white">Email</th>
                                            <th class="text-white">Adresse</th>
                                            <th class="text-white">Telephone</th> --}}
                                            <th class="text-white">Type</th>
                                            {{-- <th class="text-white">Prestation</th> --}}
                                            {{-- <th class="text-white">Motif(s)</th>
                                            <th class="text-white">Details</th> --}}
                                            <th class="datatable-nosort text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script>
    $(document).ready(function(){
        $("#submitBtnRecDone").click(function(){
            console.log('hheeelooo');
            $("#recDoneFrm").submit(); // Submit the form
        });
    });
</script>







@endsection
