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
                    <div class="login-box bg-success box-shadow border-radius-10">
                        <div class="login-title text-center">
                            {{-- <img src="{{ asset('logos/main-logo.png') }}" alt="" style="height: 200px"> --}}
                            <h2 class="text-center text-white">Se Connecter</h2>
                        </div>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="input-group custom">
                                <input required type="email" class="form-control form-control-lg" name="email" placeholder=" Adresse Email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group custom">
                                <input required type="password" class="form-control form-control-lg" name="password" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label text-white" for="customCheck1">Se Rappeler</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="forgot-password.html"> <span class="text-white">Mot de Passe Oublié?</span></a></div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">


											<input class="btn btn-warning btn-lg btn-block" type="submit" value="Connexion">

                                        {{-- <a class="btn btn-success btn-lg btn-block" href="{{ route('dashboard') }}">Connexion</a> --}}
                                    </div>
                                    {{-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
                                    </div> --}}
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
