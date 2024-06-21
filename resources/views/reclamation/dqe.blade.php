@extends('app')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">
        <h2 class="text-center">GESTION DES RECLAMMATIONS</h2>

        <div class="pd-20 card-box">
            {{-- <h5 class="h4 text-blue mb-20">Nav Pills Tabs</h5> --}}
            <div class="tab">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-blue" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Dossiers non traité(s): {{ count($reclamations_process) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Dossiers traité(s): {{ count($reclamations_done) }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des reclammations non traités</h4>
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

                                        @foreach ($reclamations_process as $rec)
                                        @php
                                            $data = explode(" ", $rec->date_naiss);
                                            $motifs = json_decode($rec->motifs_id);
                                            $prestation = DB::table('prestations')->where('id',$rec->prestation_id)->value('value');

                                            if($rec->type == 'Employeur'){
                                                $date = "Date de création";
                                                $num = "N° Immatriculation";
                                            } else if($rec->type == 'Assure'){
                                                $date = "Date de naissance";
                                                $num = "N° Immatriculation";
                                            } else {
                                                $date = "Date de naissance";
                                                $num = "N° Pension";
                                            }

                                        @endphp
                                            <tr>
                                                <td class="font-weight-bold">{{ $rec->num_dossier }}</td>
                                                <td class="">{{ $rec->numero }}</td>
                                                <td class="">{{ $rec->prenom }} <span class="text-uppercase">{{ $rec->nom }}</span></td>
                                                {{-- <td>{{ $data[0] }}</td>
                                                <td>{{ $rec->add_email }}</td>
                                                <td>{{ $rec->adresse }}</td>
                                                <td>{{ $rec->tel }}</td> --}}
                                                <td>{{ $rec->type }}</td>
                                                {{-- <td>{{ $prestation }}</td> --}}
                                                {{-- <td>{{ $rec->motifs_id }}</td>
                                                <td>{{ $rec->details }}</td> --}}
                                                <td>
                                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-procla-{{ $rec->id }}" type="button">
                                                        Traitement
                                                    </a>
                                                </td>
                                                <div class="modal fade bs-example-modal-lg" id="modal-procla-{{ $rec->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center" id="myLargeModalLabel">DOSSIER REÇU LE: {{ $rec->created_at }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <div class="row mt-2 m-2 justify-content-center">
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">N° DOSSIER:</span>
                                                                        <span class="float-right font-weight-bold">{{ $rec->num_dossier }}</span> <br> <hr>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">TYPE DE PRESTATION:</span>
                                                                        <span class="float-right font-weight-bold">{{ $prestation }}</span> <br> <hr>
                                                                    </div>
                                                                    <div class="col-md-12 bg-success p-1">
                                                                        <h5 class="text-center text-white">Détails sur l'applicant(e)</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">Type d'Applicant(e):</span>
                                                                        <span class="float-right text-uppercase">{{ $rec->type }}</span> <br>

                                                                        <span class="font-weight-bold">{{ $num }}:</span>
                                                                        <span class="float-right">{{ $rec->numero }}</span> <br>

                                                                        <span class="font-weight-bold">Nom:</span>
                                                                        <span class="float-right">{{ $rec->nom }}</span> <br>
                                                                        @if ( $rec->type != 'Employeur')
                                                                        <span class="font-weight-bold">Prenom:</span>
                                                                        <span class="float-right">{{ $rec->prenom }}</span> <br>
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">{{ $date }}:</span>
                                                                        <span class="float-right">{{ $rec->date_naiss }}</span> <br>

                                                                        <span class="font-weight-bold">Adresse e-mail:</span>
                                                                        <span class="float-right">{{ $rec->add_email }}</span> <br>

                                                                        <span class="font-weight-bold">Téléphone:</span>
                                                                        <span class="float-right">{{ $rec->tel }}</span> <br>

                                                                        <span class="font-weight-bold">Adresse:</span>
                                                                        <span class="float-right">{{ $rec->adresse }}</span> <br>
                                                                    </div>
                                                               </div>

                                                               <div class="row m-2 justify-content-center">
                                                                    <div class="col-md-12 bg-success p-1">
                                                                        <h5 class="text-center text-white">Détails sur la réclamation</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="pd-20 card-box height-100-p">
                                                                            <h4 class="mb-20 h6 font-weight-bold">Motif(s):</h4>
                                                                            <ul class="list-group">
                                                                                @foreach ($motifs as $motif)
                                                                                <li class="list-group-item">{{ DB::table('motifs')->where('id',$motif)->value('value') }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="pd-20 card-box height-100-p">
                                                                            <h4 class="mb-20 h6 font-weight-bold">Détails:</h4>
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item">{{ $rec->details }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                               </div>

                                                               <form action="{{ route('reclamation.home.done') }}" method="post" id="recDoneFrm">
                                                                @csrf
                                                                <div class="row m-2 justify-content-center">
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Feedback après traitement du dossier</h5>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="weight-600 text-danger">(Ce champs est obligatoire !)</label>
                                                                            <div class="form-group">
                                                                                <textarea required name="details" class="form-control"></textarea>
                                                                                <input type="hidden" name="reclamation_id" value="{{ $rec->id }}">
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="" class="btn btn-warning">Cloturer le dossier</button>
                                                                {{-- <a href="{{ route('reclamation.home.done',$rec->id ) }}" class="btn btn-warning">Cloturer le dossier <i class="fa fa-print" aria-hidden="true"></i></a> --}}
                                                                <a href="{{ route('reclamation.home.pdf',$rec->id ) }}" class="btn btn-success">Voir la fiche de reclamation <i class="fa fa-print" aria-hidden="true"></i></a>
                                                            </div>
                                                        </form>
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

                    <div class="tab-pane fade" id="profile5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des reclammations traités</h4>
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

                                        @foreach ($reclamations_done as $rec)
                                        @php
                                            $data = explode(" ", $rec->date_naiss);
                                            $motifs = json_decode($rec->motifs_id);
                                            $prestation = DB::table('prestations')->where('id',$rec->prestation_id)->value('value');

                                            if($rec->type == 'Employeur'){
                                                $date = "Date de création";
                                                $num = "N° Immatriculation";
                                            } else if($rec->type == 'Assure'){
                                                $date = "Date de naissance";
                                                $num = "N° Immatriculation";
                                            } else {
                                                $date = "Date de naissance";
                                                $num = "N° Pension";
                                            }

                                        @endphp
                                            <tr>
                                                <td class="font-weight-bold">{{ $rec->num_dossier }}</td>
                                                <td class="">{{ $rec->numero }}</td>
                                                <td class="">{{ $rec->prenom }} <span class="text-uppercase">{{ $rec->nom }}</span></td>
                                                {{-- <td>{{ $data[0] }}</td>
                                                <td>{{ $rec->add_email }}</td>
                                                <td>{{ $rec->adresse }}</td>
                                                <td>{{ $rec->tel }}</td> --}}
                                                <td>{{ $rec->type }}</td>
                                                {{-- <td>{{ $prestation }}</td> --}}
                                                {{-- <td>{{ $rec->motifs_id }}</td>
                                                <td>{{ $rec->details }}</td> --}}
                                                <td>
                                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-procla-{{ $rec->id }}" type="button">
                                                        Détails <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade bs-example-modal-lg" id="modal-procla-{{ $rec->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center" id="myLargeModalLabel">DOSSIER TRAITÉ LE: {{ $rec->clotures[0]->created_at }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <div class="row mt-2 m-2 justify-content-center">
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">N° DOSSIER:</span>
                                                                        <span class="float-right font-weight-bold">{{ $rec->num_dossier }}</span> <br> <hr>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">TYPE DE PRESTATION:</span>
                                                                        <span class="float-right font-weight-bold">{{ $prestation }}</span> <br> <hr>
                                                                    </div>
                                                                    <div class="col-md-12 bg-success p-1">
                                                                        <h5 class="text-center text-white">Détails sur l'applicant(e)</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">Type d'Applicant(e):</span>
                                                                        <span class="float-right text-uppercase">{{ $rec->type }}</span> <br>

                                                                        <span class="font-weight-bold">{{ $num }}:</span>
                                                                        <span class="float-right">{{ $rec->numero }}</span> <br>

                                                                        <span class="font-weight-bold">Nom:</span>
                                                                        <span class="float-right">{{ $rec->nom }}</span> <br>
                                                                        @if ( $rec->type != 'Employeur')
                                                                        <span class="font-weight-bold">Prenom:</span>
                                                                        <span class="float-right">{{ $rec->prenom }}</span> <br>
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span class="font-weight-bold">{{ $date }}:</span>
                                                                        <span class="float-right">{{ $rec->date_naiss }}</span> <br>

                                                                        <span class="font-weight-bold">Adresse e-mail:</span>
                                                                        <span class="float-right">{{ $rec->add_email }}</span> <br>

                                                                        <span class="font-weight-bold">Téléphone:</span>
                                                                        <span class="float-right">{{ $rec->tel }}</span> <br>

                                                                        <span class="font-weight-bold">Adresse:</span>
                                                                        <span class="float-right">{{ $rec->adresse }}</span> <br>
                                                                    </div>
                                                               </div>

                                                               <div class="row m-2 justify-content-center">
                                                                    <div class="col-md-12 bg-success p-1">
                                                                        <h5 class="text-center text-white">Détails sur la réclamation</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="pd-20 card-box height-100-p">
                                                                            <h4 class="mb-20 h6 font-weight-bold">Motif(s):</h4>
                                                                            <ul class="list-group">
                                                                                @foreach ($motifs as $motif)
                                                                                <li class="list-group-item">{{ DB::table('motifs')->where('id',$motif)->value('value') }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="pd-20 card-box height-100-p">
                                                                            <h4 class="mb-20 h6 font-weight-bold">Détails:</h4>
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item">{{ $rec->details }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                               </div>

                                                               <form action="{{ route('reclamation.home.done') }}" method="post" id="recDoneFrm">
                                                                @csrf
                                                                <div class="row m-2 justify-content-center">
                                                                        <div class="col-md-12 bg-success p-1">
                                                                            <h5 class="text-center text-white">Feedback après traitement du dossier</h5>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            {{-- <label class="weight-600 text-danger">(Ce champs est obligatoire !)</label> --}}
                                                                            <div class="form-group">
                                                                                {{-- <textarea required name="details" class="form-control">
                                                                                    {{ $rec->clotures[0]->details }}
                                                                                </textarea> --}}
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">{{ $rec->clotures[0]->details }}</li>
                                                                                </ul>
                                                                                <input type="hidden" name="reclamation_id" value="{{ $rec->id }}">
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                {{-- <button type="submit" id="" class="btn btn-warning">Cloturer le dossier</button> --}}
                                                                {{-- <a href="{{ route('reclamation.home.done',$rec->id ) }}" class="btn btn-warning">Cloturer le dossier <i class="fa fa-print" aria-hidden="true"></i></a> --}}
                                                                <a href="{{ route('reclamation.home.pdfDone',$rec->id ) }}" class="btn btn-success">Voir la fiche de reclamation <i class="fa fa-print" aria-hidden="true"></i></a>
                                                            </div>
                                                        </form>
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
