@extends('app')
@section('content')


<div class="login-page">

    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo mt-2">
                <a href="login.html">
                    <img src="{{ asset('logos/top-logo.png') }}" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    {{-- <li><a href="register.html">Register</a></li> --}}
                </ul>
            </div>
        </div>
    </div>

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('theme/vendors/images/login-page-img.png') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-success">Enregistrement</h2>
                        </div>
                        <form method="POST" action="{{ route('user.registration') }}">
                            @csrf
                            {{-- <div class="input-group custom">
                                <select name="dept_id" id="" class="form-control form-control-lg" required>
                                    <option value="">-- Selectionner le departement --</option>
                                    @foreach ($depts as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="input-group custom">
                                <input required type="text" class="form-control form-control-lg" name="name" placeholder="Nom complet">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            {{-- @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <div class="input-group custom">
                                <input required type="email" class="form-control form-control-lg" name="email" placeholder=" Adresse Email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email-1"></i></span>
                                </div>
                            </div>
                            {{-- @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <div class="input-group custom">
                                <input required type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            {{-- @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <div class="input-group custom">
                                <input required type="password" class="form-control form-control-lg" name="c_password" placeholder="Confirmer Mot de passe">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            {{-- <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Se Rappeler</label>
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="forgot-password"><a href="forgot-password.html">Mot de Passe Oublié?</a></div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">


											<input class="btn btn-success btn-lg btn-block" type="submit" value="Sauvegarder">

                                        {{-- <a class="btn btn-success btn-lg btn-block" href="{{ route('dashboard') }}">Connexion</a> --}}
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
