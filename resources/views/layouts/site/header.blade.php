  <!-- header section start-->
    <div id="preload">
        <img src="{{ asset('assets/front_lib/images/loader.gif') }}">
    </div>
	<header>
		<div class="container">
			<div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="logo" href="{{ route('index') }}"><img src="{{ asset('assets/front_lib/images/logo.png') }}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            @if(Sentinel::check())
                                @if(Sentinel::getUser()->roles[0]->slug == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('signin') }}">ADMIN</a>
                                    </li>
                                @elseif(Sentinel::getUser()->roles[0]->slug == 'homeowner')
                                    <li class="nav-item">    
                                        <a class="nav-link" href="{{ route('client-login') }}">HOMEOWNER</a>
                                    </li>
                                @elseif(Sentinel::getUser()->roles[0]->slug == 'tradeperson')
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="{{ route('liveleads') }}">LIVE LEADS</a>
                                    </li>
                                    <li class="nav-item">    
                                        <a class="nav-link" href="{{ route('client-login') }}">TRADEPERSON</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" href="{{ route('client-login') }}">Homeowner & Tradespeople login / sign up</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}">CONTACT US</a>
                            </li>                            
                            @if(Sentinel::check())
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown"> 
                                            <div class="header-user-img">
                                                <img src='{{ asset("assets/uploads/profilesImage") .'/'.Sentinel::getUser()->userDetails->picture }}'>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('client-dashboard') }}">Dashboard</a></li>
                                            @if(Sentinel::getUser()->roles[0]->slug != 'admin')
                                            <li><a href="{{ route('client-profile') }}">Profile</a></li>
                                            @endif
                                            <li>
                                                <a href="{{ URL::to('logout') }}">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('client-login') }}">
                                        <i class="fa fa-sign-in icon-sign" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- header section start-->

    

    