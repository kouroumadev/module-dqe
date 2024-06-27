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
