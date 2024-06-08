@extends('app')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="text-center">ESPACE DQE</h2>
        <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="pd-20">
                <h4 class="text-blue h4">Liste des reclammations</h4>
            </div>
            <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="bg-success">
                    <tr>
                        <th class="table-plus text-white">N° Immat/Pension</th>
                        <th class="text-white">Prenom & Nom/Employeur</th>
                        {{-- <th class="text-white">Date Naissance</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Adresse</th>
                        <th class="text-white">Telephone</th> --}}
                        <th class="text-white">Type</th>
                        <th class="text-white">Prestation</th>
                        {{-- <th class="text-white">Motif(s)</th>
                        <th class="text-white">Details</th> --}}
                        <th class="datatable-nosort text-white">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reclamations as $rec)
                    @php
                        $data = explode(" ", $rec->date_naiss);
                        $motifs = json_decode($rec->motifs_id);
                        $prestation = DB::table('prestations')->where('id',$rec->prestation_id)->value('value');
                    @endphp
                        <tr>
                            <td class="">{{ $rec->numero }}</td>
                            <td class="">{{ $rec->prenom }} <span class="text-uppercase">{{ $rec->nom }}</span></td>
                            {{-- <td>{{ $data[0] }}</td>
                            <td>{{ $rec->add_email }}</td>
                            <td>{{ $rec->adresse }}</td>
                            <td>{{ $rec->tel }}</td> --}}
                            <td>{{ $rec->type }}</td>
                            <td>{{ $prestation }}</td>
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
                                            <h4 class="modal-title text-center" id="myLargeModalLabel">Type de Prestation: {{ $prestation }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row mt-2 m-2 justify-content-center">
                                                <div class="col-md-12 bg-success p-1">
                                                    <h5 class="text-center text-white">Détails sur le l'applicant(e)</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="font-weight-bold">Type d'Applicant(e):</span>
                                                    <span class="float-right">{{ $rec->type }}</span> <br>

                                                    <span class="font-weight-bold">N° Immatriculation:</span>
                                                    <span class="float-right">{{ $rec->numero }}</span> <br>

                                                    <span class="font-weight-bold">Nom:</span>
                                                    <span class="float-right">{{ $rec->nom }}</span> <br>

                                                    <span class="font-weight-bold">Prenom:</span>
                                                    <span class="float-right">{{ $rec->prenom }}</span> <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="font-weight-bold">Date de naissance:</span>
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

                                           <div class="row m-2 justify-content-center">
                                                <div class="col-md-12 bg-success p-1">
                                                    <h5 class="text-center text-white">Feedback après traitement du dossier</h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="weight-600 text-danger">(Ce champs est obligatoire !)</label>
                                                    <div class="form-group">
                                                        <textarea name="details" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                           </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cloturer le dossier</button>
                                            <button type="button" class="btn btn-success">Voir la fiche de reclamation <i class="fa fa-print" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body pd-0">

                                            <div class="profile-timeline">
                                                <div class="timeline-month">
                                                    <h5>Dossier en cours de traitement</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">{{ $from_dept }}</div>


                                                            <p>
                                                                <span class="font-weight-bold text-success"><i class="icon-copy ion-folder"></i> Recu de: <span class="task-time">{{ $emp->deposants['0']->prenom_deposant }} {{ $emp->deposants['0']->nom_deposant }}</span></span> <br>
                                                                <span class="font-weight-bold ml-2 text-success"><i class="ion-android-alarm-clock"></i> Date: <span class="task-time">{{ $emp->created_at->format('d M') }} {{ $emp->created_at->format('Y') }} à {{ $emp->created_at->format('H:i:s') }}</span></span>
                                                            </p>
                                                            <p>
                                                                <span class="font-weight-bold text-success"><i class="icon-copy ion-folder"></i> Transmi à: <span class="task-time">{{ $to_dept }}</span></span> <br>
                                                                <span class="font-weight-bold ml-2 text-success"><i class="ion-android-alarm-clock"></i> Date: <span class="task-time">{{ $emp->transfers['0']->created_at->format('d M') }} {{ $emp->transfers['0']->created_at->format('Y') }} à {{ $emp->transfers['0']->created_at->format('H:i:s') }}</span></span>
                                                            </p>
                                                            <p>
                                                                <span class="font-weight-bold text-success"><i class="ion-ios-chatboxes"></i> Observation: <span class="task-time">{{ $emp->transfers['0']->note }}</span></span> <br>
                                                            </p>

                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 Aug</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>July, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 July</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 July</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="timeline-month">
                                                    <h5>June, 2020</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">12 June</div>
                                                            <div class="task-name"><i class="ion-android-alarm-clock"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                        <li>
                                                            <div class="date">10 June</div>
                                                            <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                            <div class="task-time">09:30 am</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>









@endsection
