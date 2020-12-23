
<div class="mobile-nav">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('/all')}}" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>{{__('customlang.shop')}}</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/coffee')}}">{{__('customlang.whole_bean_coffee')}}</a>
                        <a class="dropdown-item" href="{{url('/equipment')}}">{{__('customlang.equipments')}}</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>{{__('customlang.about_us')}}</b>   
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('about-us')}}">Our Story</a>
                        <!--<a class="dropdown-item" href="#">Our cafes</a>-->
                        <a class="dropdown-item" href="{{url('work-with-us')}}">Work with us</a>
                        <a class="dropdown-item" href="{{url('/FAQ')}}">Get in Touch & FAQ</a>
                    </div>
                </li>
          
                <li class="nav-item">
                    <a class="nav-link" href="{{url('brewing')}}"><b>{{__('customlang.how_to_brew')}}</b> </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Our cafes</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('surry-location')}}">Surry-BC</a>
                        <a class="dropdown-item" href="{{url('white-rock')}}">White Rock</a>

                    </div>
                </li>
                
<!--                <li class="nav-item">
                    <a class="nav-link" href="{{url('impact')}}"><b>{{__('customlang.responsibility')}}</b></a>
                </li>-->

            </ul>

            <a href="{{url('subscribe')}}"><b>{{__('customlang.try_subscription')}}</b></a>
            <a href="{{url('gift-subscription')}}"><b>{{__('customlang.gift_subscription')}}</b></a>


        </div>








        <div class="menu__top_right">
            @if(session()->get('locale') =='en' || session()->get('locale')==null)
            <a class="button button--underline" style="margin: 10px;" href="{{url('lang/fr')}}">FR</a>
            @elseif(session()->get('locale')=='fr')
            <a class="button button--underline" style="margin: 10px;"  href="{{url('lang/en')}}">EN</a>
            @endif


            <!--currency code-->

            <a class="button button--underline" style="margin: 10px;" href="javascript:void(0)" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if (Session::has('curency_rate')):
                    echo Session::get('curency_rate') != 0 ? 'USD' : 'CAD';
                else:
                    echo 'CAD';
                endif;
                ?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <a class="dropdown-item" href="{{url('currency/usd')}}">USD</a>
                <a class="dropdown-item" href="{{url('currency/cad')}}">CAD</a>
            </div>

            <!--currency code end-->


        </div>
        <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100vh";
            }

            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
        </script>
    </div>


    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>    
    <div class="logo-mobile">
        <div class="col" id="logo">
            <a href="{{url('/')}}">
                <img src="{{asset('public/user/logo/Islands_cafe.png')}}" width="15%"/>

            </a>
        </div>
    </div>
    <div class="nav-right">
        <!--start profile-link-->
        @if(!Auth::check())
        <li class="nav-item" style="margin-left: 14px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <svg class="icon icon--profile" viewBox="0 0 19 18">
                <path d="M4.54,6.5a6.73,6.73,0,0,1,1-4.37,1.35,1.35,0,0,1,1-.63H9.5"></path>
                <path d="M14.46,6.5a6.73,6.73,0,0,0-1-4.37,1.35,1.35,0,0,0-1-.63H9.5"></path>
                <path d="M14.24,3.5a6,6,0,0,1,.26,1.76,5.65,5.65,0,0,1-1.93,4.32,24.5,24.5,0,0,1-8.71,4.14S1.5,14.29,1.5,16.5"></path>
                <path d="M4.76,3.5A6,6,0,0,0,4.5,5.26,5.65,5.65,0,0,0,6.43,9.58a24.5,24.5,0,0,0,8.71,4.14s2.36.57,2.36,2.78"></path>
                </svg>
            </button>
        </li>
        @else
        <li class="" style="margin-left: 14px;">
            <!--<a id="navbarDropdown" class="nav-link " href="{{url('/profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <a  href="{{url('/profile')}}" role="button" class="nav-link">
                <!--Auth::user()->name-->
                <img src="{{asset('public/user/logo/user_active_1-512.png')}}" style="width: 25px;
                     height: 21px;"/>
            </a>
        </li>
        @endif
        <!--end profile link-->

        <!--start code for cart-->
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                <svg class="icon icon--cart" viewBox="0 0 22 17">
                <path d="M1,1H5.13a.46.46,0,0,1,.44.34l1.8,7.52a2.13,2.13,0,0,0,2,1.58h8.36a2.06,2.06,0,0,0,2-1.51l1.16-4.48a1.55,1.55,0,0,0-.29-1.38,1.55,1.55,0,0,0-1.3-.62H11"></path>
                <circle cx="9" cy="15" r="1"></circle>
                <circle cx="15" cy="15" r="1"></circle>
                <span class="badge" style="color: red; font-size: 12px !important;">
                    <?php
                    $cartTotal = Session::has('cart') ? (Session::get('cart')->totalPrice == 0 ) ? '0.00' : Session::get('cart')->totalPrice : '0.00';
                    $giftTotal = Session::has('giftcart') ? (Session::get('giftcart')->totalPrice == 0 ) ? '0.00' : Session::get('giftcart')->totalPrice : '0.00';
                    $total = $cartTotal + $giftTotal;

                    $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                    $cad_price = number_format($total, 2);
                    ?>

                    ${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}



                </span> 
                </svg>
            </button>
        </li>
        <!--End cart code-->
    </div>
</div>
<div class="header__alert mobile-al">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Ground Shipping on subscriptions is now <b>$10 </b>across the US & CA. All currency on our website is currently in Canadian Dollars (Better for you!)</p>
            </div>
        </div>
    </div>
</div>