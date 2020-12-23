<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/user/assets/style.css')}}">

        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
    </head>

    <body>
         <header>
            @include('partials.mobile-view')
            <div class="header__alert desk-alert">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <p>{{__('customlang.shipping_tax')}} <b>{{__('customlang.eight')}} </b>{{__('customlang.shipping_tax_2')}}</p>
                        </div>
                        <!--commented by Naresh-->
<!--                        <div class="col-md-2">
                            @if(!Auth::check())
                            <p class="nav-item">
                                <button type="button" class="btn btn-primary login-button" data-toggle="modal" data-target="#myModal">
                                    Login
                                </button>
                            </p>
                            @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="{{url('/profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a  href="{{url('/profile')}}" role="button" class="nav-link">
                                    Auth::user()->name
                                    <img src="{{asset('public/user/logo/user_active_1-512.png')}}" style="width: 25px;
                                         height: 23px;"/>

                                </a>
                            </li>
                            @endif

                        </div>-->
<!--end comment code-->
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2" id="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('public/user/logo/Islands_cafe_white.png')}}" width="34%"/>
                            </a>
                        </div>
                        <div class="col-md-5">
                            <nav class="navbar navbar-expand-md ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                    <ul class="navbar-nav">

                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{url('/all')}}" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{__('customlang.shop')}}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{url('/coffee')}}">{{__('customlang.whole_bean_coffee')}}</a>
                                                <a class="dropdown-item" href="{{url('/equipment')}}">{{__('customlang.equipments')}}</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{__('customlang.about_us')}}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{url('about-us')}}">Our Story</a>
                                                <a class="dropdown-item" href="#">Our cafes</a>
                                                <a class="dropdown-item" href="{{url('work-with-us')}}">Work with us</a>
                                                <a class="dropdown-item" href="{{url('/FAQ')}}">Get in Touch & FAQ</a>
                                                <a class="dropdown-item" href="{{url('impact')}}">{{__('customlang.responsibility')}} </a>
                                            </div>
                                        </li>



                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('brewing')}}">{{__('customlang.how_to_brew')}}</a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Location
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{url('surry-location')}}">Surry-BC</a>
                                                <a class="dropdown-item" href="{{url('white-rock')}}">White Rock</a>

                                            </div>
                                        </li>                                       
                                        <!--mycode-->
                                        <!--endmycode-->
                                    </ul>

                                </div>
                            </nav>
                        </div>
                        <!--Delete By Naresh-->
                        
                    </div>
                </div>
            </div>
        </header>


        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-login-form" style="margin-top: 133px">
                            <h2>Signup For Checkout</h2>
                            <p>{{__('customlang.signup_desc')}}</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"> <strong>{{ __('customlang.name') }}</strong> </label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><strong>{{ __('customlang.email') }}</strong> </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"> <strong>{{ __('customlang.password') }}</strong> </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><strong>{{ __('customlang.c_password') }}</strong> </label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="button button-tight">
                                            {{ __('customlang.sign_up') }}
                                        </button>
                                        <a class="btn btn-link" href="{{ url('/login') }}">
                                            {{ __('customlang.already_have_ac') }}
                                        </a>

                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer id="footer-connect">
            <div class="container">
                <div class="row" style="margin-bottom: -107px;">
                    <div class="col-md-4 footer-first-row">
                        <h3 class="footer-header"><img style="width: 54px;" src="{{asset('public/user/assets/images/email.png')}}">Subscribe</h3>
                        <p>Sign up for exclusive deals, new coeeerings,
                            and the latest roasting stories!</p>
                        <form class="sub-form">
                            <input type="email" name="" placeholder="E-mail Address" class="footer-email">
                            <input type="submit" name="" class="submit-btn-footer">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h3 class="footer-header"><img style="width: 54px;" src="{{asset('public/user/assets/images/conversation.png')}}" />Need Help ?</h3>

                        <p class="footer-round-btn">
                            <a href="">Customer Service</a>
                        </p>
                        <p class="footer-round-btn">
                            <a href="">Order Status</a>
                        </p>
                        <p class="footer-round-btn">
                            <a href="">Returns and Refunds</a>
                        </p>
                    </div>
                    <div class="col-md-4 more-info-parent-div">
                        <h3 class="footer-header text-right pr-5 "><img style="width: 54px;" src="{{asset('public/user/assets/images/information.png')}}" />More Info</h3>
                        <div class="more-info-parent">
                            <div class="more-info-child">
                                <ul>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Gift Cards</a></li>
                                    <li><a href="">Find a Store</a></li>
                                    <li><a href="">Careers</a></li>
                                    <li><a href="">Press</a></li>
                                    <li><a href="">Online training</a></li>
                                </ul>
                            </div>
                            <div class="more-info-child">
                                <ul>
                                    <li><a href=""><img src="{{asset('public/user/assets/images/instagram.png')}}" style="width: 15px;"/> Instagram</a></li>
                                    <li><a href=""><img src="{{asset('public/user/assets/images/facebook.png')}}" style="width: 15px;"/> Facebook</a></li>
                                    <li><a href=""><img src="{{asset('public/user/assets/images/insurance.png')}}" style="width: 15px;"/> Privacy Policy</a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br><br><br><br>
                <hr class="footer-top-hr">
                <div class="footer-lang">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="copy-right-text">® {{date('Y')}} {{config('app.name')}}, Ltd. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="select-lang text-right">
                                <p class="select-lang-text">Change Language: </p>

                                @if(session()->get('locale') =='en' || session()->get('locale')==null)
                                <a  href="{{url('lang/fr')}}"><img src="{{asset('public/user/newlocation/images/france-icon.png')}}">FR</a>
                                <!--<a class="button button--underline" >FR</a>-->
                                @elseif(session()->get('locale')=='fr')
                                <!--<a class="button button--underline" >EN</a>-->
                                <a   href="{{url('lang/en')}}"><img src="{{asset('public/user/newlocation/images/english-icon.png')}}">EN</a>
                                @endif


                                <!--mycode-->
                                <a class="button button--underline" style="margin: 4px; border-bottom: none;" href="javascript:void(0)" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if (Session::has('curency_rate')):
                                        echo Session::get('curency_rate') != 0 ? "<img src=".asset("public/user/assets/images/united-states.png").">" : "<img src=".asset("public/user/newlocation/images/canada-icon.png")." >";
                                    else:
                                        echo 'CAD';
                                    endif;
                                    ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
                                    <a class="dropdown-item" href="{{url('currency/usd')}}"><img src="{{asset('public/user/assets/images/united-states.png')}}"/> USD</a>
                                    <a class="dropdown-item" href="{{url('currency/cad')}}"><img src="{{asset('public/user/newlocation/images/canada-icon.png')}}"/> CAD</a>
                                </div> 
                                <!--endmycode-->


<!--                                <a href="" class="not-selected-lang">
                                    <img src="{{asset('public/user/newlocation/images/canada-icon.png')}}">CAD</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    </body>
</html>