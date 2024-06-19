@extends('app')
@section('content')
    @include('header')

    <div style="margin-top: 100px;">


        <div class="card-box m-auto p-5" style="font-size: 14px; width:70%">
            <h3>Veuillez saisir les informations suivantes :</h3>
            <hr>

            <form action="{{ route('rendezvous.edit') }}" method="post">
                @csrf
                <div class="row" style="display: flex; flex-direction:column">
                    <div class="col-6">

                        <div class="form-group  ml-2">
                            <label>Numero de confirmation</label>
                            <input type="text" name="no_conf" id="no_conf" class="form-control">
                        </div>
                    </div>
                    <h6><span class="text-danger">*</span>Veuillez saisir au moins un des deux champs</h6>
                    <div class="col-6">

                        <div class="form-group  ml-2">
                            <label>E-mail<span class="text-danger">*</span> </label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="form-group  ml-2">
                            <label>Telephone <span class="text-danger">*</span>:</label>
                            <input type="text" name="telephone" id="telephone" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer m-auto" style="border-top: none">
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
