@extends('app')
@section('content')
    @include('header')


    <div style="margin-top: 100px">
        <div class="p-5">
            <div class="pd-20">
                <h4 class="text-blue h4">Liste des Rendez-vous</h4>
            </div>
            <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                role="grid" aria-describedby="DataTables_Table_0_info">
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
                    @foreach ($info as $value)
                        <tr>
                            <td>{{ $value->no_conf }}</td>
                            <td>{{ $value->date_rendezvous }} à {{ $value->heure_rendezvous }} </td>
                            <td>{{ $value->nature }}</td>
                            <td>{{ $value->prestation }}</td>
                            <td> <a href="{{ route('rendezvous.delete', $value->no_conf) }}" type="button"
                                    class="btn btn-danger">
                                    Annuler</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
