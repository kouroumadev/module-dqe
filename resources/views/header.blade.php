{{-- <div class="header w-100" style="height: 80px;">
    <div class="brand-logo" style="border-bottom: none">
        <a href="http://">
            <img src="{{ asset('logos/logo.svg') }}" alt="" srcset="">
        </a>
    </div>
    <div class="header-right" style="width: 70%">
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="icon-copy fa fa-map-marker" aria-hidden="true"></i>
                </a>
                <strong class="user-name">République de Guinée </strong> <br>
                <span>Conakry - Kaloum - Koulewondy</span>
            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="icon-copy fa fa-phone" aria-hidden="true"></i>
                </a>
                <strong class="user-name">+224 625 56 56 16

                </strong><br>
                <span> Appelez-nous</span>
            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="icon-copy fa fa-envelope" aria-hidden="true"></i>
                </a>
                <strong class="user-name">contact@cnss.gov.gn
                </strong><br>
                <span> Contactez-nous</span><br>
            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar"
                    style="color: #4267B2">
                    <i class="icon-copy fa fa-facebook-official" aria-hidden="true"></i>
                </a>

            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar"
                    style="color: #0078c7">
                    <i class="icon-copy fa fa-linkedin-square" aria-hidden="true"></i>
                </a>

            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar"
                    style="color: #CD201F">
                    <i class="icon-copy fa fa-youtube-play" aria-hidden="true"></i>
                </a>

            </div>
        </div>

    </div>

</div> --}}
<div class="header w-100">
    <div class="header-left">
        {{-- <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div> --}}
        <div class="header-search">
            <div class="row">
                <div class="col-md-3">
                    <div class="brand-logo" style="border-bottom: none">
                        <a href="http://">
                            <img src="{{ asset('logos/logo.svg') }}" alt="" srcset="">
                        </a>
                    </div>
                </div>
                <div class="col-md-5" style="margin-top: 10px">


                    <a href="{{ route('rendezvous.gestion') }}" type="button" class="btn btn-outline-success"
                        style="margin-left:30px">Gérer mes rendez-vous</a>


                    {{-- <div class="dashboard-setting user-notification">
                        <div class="dropdown" style="font-size: 12px; font-family:sans-serif, poppin">
                            <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                                <i class="icon-copy fa fa-map-marker"></i>
                            </a>
                            <strong class="user-name">République de Guinée </strong> <br>
                            <span>Conakry - Kaloum - Koulewondy</span>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-4" style="margin-top: 10px">
                    <a href="{{ route('rendezvous.gestion') }}" type="button" class="btn btn-outline-success"
                        style="margin-left:30px">Prendre rendez-vous</a>

                </div>
            </div>



        </div>
    </div>
    <div class="header-right">
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-menu"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="{{ route('rendezvous.gestion') }}">
                                    <i class="icon-copy fa fa-edit" aria-hidden="true"></i>
                                    <h3>Gérer mes rendez-vous</h3>
                                    {{-- <p>Conakry - Kaloum - Koulewondy</p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rendezvous.prendre') }}">
                                    <i class="icon-copy fa fa-calendar"></i>
                                    <h3>Prise de rendez-vous</h3>
                                    {{-- <p>Conakry - Kaloum - Koulewondy</p> --}}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-copy fa fa-map-marker"></i>
                                    <h3>République de Guinée</h3>
                                    <p>Conakry - Kaloum - Koulewondy</p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="vendors/images/photo1.jpg" alt="">
                    </span>
                    <span class="user-name">Ross C. Lopez</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div> --}}
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
                    alt=""></a>
        </div>
    </div>
</div>
