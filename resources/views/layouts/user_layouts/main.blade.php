<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/user/assets/style.css')}}">

        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



        <style>
            /*Homepage video style*/
            .hero {
                position: inherit;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            body {
                /*background-image: radial-gradient(circle at top right, #17141d, white);*/
                /*display: grid;*/
                height: 100vh;
                place-items: center;
                width: 100%;
            }
            .banner-text {
                position: absolute;
                z-index: 11111;
                color: #fff;
            }
            figure {
                box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                    0 6.7px 5.3px rgba(0, 0, 0, 0.048), 0 12.5px 10px rgba(0, 0, 0, 0.06),
                    0 22.3px 17.9px rgba(0, 0, 0, 0.072), 0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                    0 100px 80px rgba(0, 0, 0, 0.12);
                width: 50%;
            }

            video {
                display: block;
                width: 100%;
            }

            figcaption {
                align-items: center;
                background: #eaeaea;
                height: 15px;
                padding: 0.5rem;
            }


            .mute {
                position: fixed;
                z-index: 1111;
                width: auto;
                right: 4px;
                bottom: 84px;
            }

            label {
                order: 2;
                text-align: center;
            }

            /* Fallback stuff */
            progress[value] {
                appearance: none;
                border: none;
                border-radius: 3px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;
                color: dodgerblue;
                display: inline;
                height: 15px;
                order: 1;
                position: relative;
                width: 100%;
            }

            /* WebKit styles */
            progress[value]::-webkit-progress-bar {
                background-color: whiteSmoke;
                border-radius: 3px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;
            }

            progress[value]::-webkit-progress-value {
                background-image: linear-gradient(to right, #ff8a00, #e52e71);
                border-radius: 3px;
                position: relative;
                transition: width 1s linear;
            }

            /* Firefox styles */
            progress[value]::-moz-progress-bar {
                background-image: -moz-linear-gradient(to right, #ff8a00, #e52e71);
                border-radius: 3px;
                position: relative;
                transition: width 1s linear;
            }
            #progress, .banner-text{
                display:none ;
            }

            .mystyle {
                display:block ;
            }
            /*End Homepage video*/



            .icons{
                font-size: 18px;
                width: 57px;
                height: 56px;
            }
            .currency-back{
                background-color:#6464ca;
            }

            .hero-main__caret img {
                fill: #fff;
                animation: fade_move_down 2s ease-in-out infinite;
                box-shadow: 0px 1px 15px #fff;
                border-radius: 50%;
                background: #0000004a;
                padding: 10px;
            }
            .icon--chevron-down {
                width: 40px !important;
            }
        </style>
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
                        <div class="col-md-2">
                            @if(!Auth::check())
                            <p class="nav-item">
                                <button type="button" class="btn btn-primary login-button" data-toggle="modal" data-target="#myModal">
                                    {{__('customlang.login')}}
                                </button>
                            </p>
                            @else


                            <!--<a id="navbarDropdown" class="nav-link " href="{{url('/profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <a  href="{{url('/profile')}}" role="button" class="nav-link">
                                <!--Auth::user()->name-->
                                <img src="{{asset('public/user/assets/images//profile-user.png')}}" style="width: 20px; margin-top: 2px; margin-bottom: 2px;"/>

                            </a>

                            @endif

                        </div>
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
                                                <a class="dropdown-item" href="{{url('about-us')}}">{{__('customlang.our_story')}}</a>
                                                <!--<a class="dropdown-item" href="#">Our cafes</a>-->
                                                <a class="dropdown-item" href="{{url('work-with-us')}}">{{__('customlang.work_with_us')}}</a>
                                                <a class="dropdown-item" href="{{url('/FAQ')}}">Get in Touch & FAQ</a>
                                                <!--<a class="dropdown-item" href="{{url('impact')}}">{{__('customlang.responsibility')}} </a>-->
                                            </div>
                                        </li>



                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('brewing')}}">{{__('customlang.how_to_brew')}}</a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{__('customlang.our_cafes')}}
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
                        <div class="col-md-5">
                            <div class="display-in-row">
                                <div>
                                    <a class="subscribe-bold" href="{{url('subscribe')}}"><!-- {{__('customlang.try_subscription')}} -->
                                        {{__('customlang.subscribe')}} 
                                    </a>
                                    <!--check subscription code in home controller-->

                                    <a class="" href="{{url('gift-subscription')}}">{{__('customlang.gift_subscription')}}</a>
                                </div>

                                <div class="cart-parent">
                                    <!-- search btn start here -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-search">  
                                        <span class="cart-img">
                                            <img src="{{asset('public/user/assets/images/search-png.png')}}">
                                        </span>
                                    </button>
                                    <!-- search btn end here -->

                                    <!-- cart btn start -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                                        <span class="badge" style="color: red;font-size: 12px;">
                                            <span class="cart-img">
                                                <img src="{{asset('public/user/assets/images/cart-icon.png')}}">
                                            </span>
                                            <?php
                                            $cartTotal = Session::has('cart') ? (Session::get('cart')->totalPrice == 0 ) ? '0.00' : Session::get('cart')->totalPrice : '0.00';
                                            $giftTotal = Session::has('giftcart') ? (Session::get('giftcart')->totalPrice == 0 ) ? '0.00' : Session::get('giftcart')->totalPrice : '0.00';
                                            $subTotal = Session::has('subscribe') ? (Session::get('subscribe')['subTotal'] == 0 ) ? '0.00' : Session::get('subscribe')['subTotal'] : '0.00';
                                            $total = $cartTotal + $giftTotal + $subTotal;


                                            $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                                            $cad_price = number_format($total, 2);
                                            ?>

                                            ${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}
                                        </span> 

                                    </button>
                                    <!-- cart btn close -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--end header-->

        @yield('content')


        <!--start footer-->

        <footer id="footer-connect">
            <div class="container">
                <div class="row" style="margin-bottom: -107px;">
                    <div class="col-md-4 footer-first-row">
                        <h3 class="footer-header"><img style="width: 54px;" src="{{asset('public/user/assets/images/email.png')}}">{{__('customlang.subscribe')}}</h3>
                        <p>{{__('customlang.keep_in_touch_message')}}</p>
                        <form class="sub-form" action="{{url('/newslatter')}}" method="post">
                            @csrf
                            <input type="text" name="fname" placeholder="{{__('customlang.first_name')}}" class="footer-email">
                            <input type="text" name="lname" placeholder="{{__('customlang.last_name')}}" class="footer-email">
                            <input type="email" name="email" placeholder="{{__('customlang.email')}}" class="footer-email">
                            <input type="submit" name="" class="submit-btn-footer">
                            @if(Session::has('status'))
                            <h6>{{Session('status')}}</h6>
                            @endif

                        </form>
                    </div>
                    <div class="col-md-4">
                        <h3 class="footer-header"><img style="width: 54px;" src="{{asset('public/user/assets/images/conversation.png')}}" />{{__('customlang.need_help')}}</h3>

                        <p class="footer-round-btn">
                            <a href="">{{__('customlang.customer_service')}}</a>
                        </p>
                        <p class="footer-round-btn">
                            <a href="">{{__('customlang.order_status')}}</a>
                        </p>
                        <p class="footer-round-btn">
                            <a href="">{{__('customlang.return_&_refunds')}}</a>
                        </p>
                    </div>
                    <div class="col-md-4 more-info-parent-div">
                        <h3 class="footer-header text-right pr-5 "><img style="width: 54px;" src="{{asset('public/user/assets/images/information.png')}}" />{{__('customlang.more_info')}}</h3>
                        <div class="more-info-parent">
                            <div class="more-info-child">
                                <ul>
                                    <li><a href="">{{__('customlang.about_us')}}</a></li>
                                    <li><a href="">{{__('customlang.gift_cards')}}</a></li>
                                    <li><a href="">{{__('customlang.find_store')}}</a></li>
                                    <li><a href="">{{__('customlang.careers')}}</a></li>
                                    <li><a href="">{{__('customlang.press')}}</a></li>
                                    <li><a href="">{{__('customlang.online_training')}}</a></li>
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
                                <a class="button button--underline " style="margin: 4px; border-bottom: none; text-decoration: none;" href="javascript:void(0)" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if (Session::has('curency_rate')):
                                        echo Session::get('curency_rate') != 0 ? "<img src=" . asset("public/user/assets/images/united-states.png") . ">" : "<img src=" . asset("public/user/newlocation/images/canada-icon.png") . " >";
                                    else:
                                        echo "<img src=" . asset('public/user/newlocation/images/canada-icon.png') . "/> CAD";
                                    endif;
                                    ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
                                    <a class="dropdown-item currency-back active" href="{{url('currency/usd')}}"><img src="{{asset('public/user/assets/images/united-states.png')}}"/> USD</a>
                                    <a class="dropdown-item " href="{{url('currency/cad')}}"><img src="{{asset('public/user/newlocation/images/canada-icon.png')}}"/> CAD</a>
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

        <!--<div class="chat"><a href="mailto:aloha@islandscafe.ca" target="_blank" class="button chat__button"><svg class="icon icon--mail" viewBox="0 0 34 23"><g transform="translate(1.000000, 1.000000)"><path d="M31,2 L16.7380506,12.5294285 C16.7380506,12.5294285 15.6028837,13.5882143 14.3515419,12.5294285 L4.49636358,5.29926123 L0,2"></path><polyline points="21 13 26.4679049 16.7916667 31 20"></polyline><path d="M0,20 L10,13"></path><path d="M30.3809227,21 L1.61807853,21 C0.728135339,21 0,20.2759306 0,19.3899636 L0,1.61003642 C0,0.724069432 0.728135339,0 1.61807853,0 L30.3809227,0 C31.2708658,0 32,0.724069432 32,1.61003642 L32,19.3899636 C32,20.2759306 31.2708658,21 30.3809227,21 Z"></path></g></svg></a></div>-->



        <!-- The Modal -->
        @include('partials.login')

        <!--===========cart-model=================-->
        <div class="modal fade" id="cart-search">

            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="search-bar-body">
                            <h3>Search Your Items</h3>
                            <form class="search-form">
                                <div class="search-bar">
                                    <label>Enter Search Tag</label>
                                    <input type="text" name="" placeholder="Type here...">
                                </div>
                                <button type="submit" class="lets-search">Let's Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- search modal start here -->
        <div class="modal fade" id="myModal2">

            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="cart">

                            <div class="wrap cf">
                                <div class="cart">
                                    <h2>{{ __('customlang.cart')}}</h2>
                                    <ul class="cartWrap">
                                        <?php $giftSubscription = \App\Http\Controllers\ProductsController::giftCartValue(); ?>
                                        <?php $abc = \App\Http\Controllers\ProductsController::cartValues(); ?>


                                        @if($abc['cartValue']==null)

                                        <!--<hr style="border-top: 1px solid#aeaeae;">-->
                                        @else
                                        @if(Session::has('cart'))
                                        @foreach($abc['cartValue'] as $pro)
                                        <li class="items odd">
                                            <hr style="border-top: 1px solid#aeaeae;">
                                            <div class="infoWrap"> 
                                                <div class="cartSection">
                                                    <?php $img = explode(",", $pro['item']['image']) ?>
                                                    <img src="{{asset('public/uploads/products/'.$img[0])}}" alt="" class="itemImg" />
                                                    <h4 class="p-title">
                                                        <?php
                                                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                                            echo $pro['item']['name'];
                                                        } elseif (session()->get('locale') == 'fr') {
                                                            echo $pro['item']['name_fr'];
                                                        }
                                                        ?>
                                                    </h4>
                                                    <!--curency code-->
                                                    @php
                                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                                    $cad_price = $pro['item']['price']? number_format($pro['item']['price'],2): '';
                                                    @endphp

                                                    <p class="p-price">${{$usd_price? number_format($usd_price*$cad_price,2) : $cad_price}}
                                                        x {{$pro['qty']}}</p>
                                                    <!--end currency code-->

<!--<p class="p-price">{{ isset($pro['item']['price'])? '$'.number_format($pro['item']['price'],2): ''  }} x {{$pro['qty']}}</p>-->

                                                </div>
                                                <!--delete code-->

                                                <div class="cartSection removeWrap" style="margin-top: 22px;">
                                                    <a class="remove" href="{{ route('delete.item',['id'=>$pro['item']['id']]) }}" >x
                                                    </a></div>
                                            </div>
                                        </li>

                                        @endforeach
                                        @endif <!--Session has cart-->

                                        @endif <!--First if check sesion not null-->

                                        @if($giftSubscription['cartValue']!=null)
                                        @if(Session::has('giftcart'))
                                        @foreach($giftSubscription['cartValue'] as $gift)
                                        <li class="items odd">
                                            <hr style="border-top: 1px solid#aeaeae;">
                                            <div class="infoWrap"> 
                                                <div class="cartSection">

                                                    <img src="{{asset('public/user/assets/images/product1.jpg')}}" alt="" class="itemImg" />
                                                    <h4 class="p-title">{{$gift['item']['name']}}</h4>
                                                    <p>Month: {{$gift['item']['month']}} &nbsp; &nbsp;  Bag: {{$gift['item']['quantity']}}</p>

                                                    @php
                                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                                    $Gift_cad_price = $gift['item']['price'] ? number_format($gift['item']['price'],2): '';
                                                    @endphp

                                                    <p class="p-price" style=" margin-left: 115px; margin-top: -18px !important;" >${{$usd_price? number_format($usd_price * $Gift_cad_price,2) :$Gift_cad_price}}
                                                    </p>

                                                </div>
                                                <!--delete code-->
                                                <div class="cartSection removeWrap" style="margin-top: 22px;">
                                                    <a class="remove" href="{{ route('delete.gift',['id'=>$gift['item']['id']]) }}" >x
                                                    </a>
                                                </div>
                                            </div>

                                        </li>
                                        @endforeach
                                        @endif  <!--Session has gift-->
                                        @endif


                                        <!--------Subscription code------>
                                        @if(Session::has('subscribe'))
                                        <?php
                                        $subscribe = Session::has('subscribe') ? Session::get('subscribe') : null;

                                        $removeLastElement = array_splice($subscribe, -2);
                                        ?>
                                        <?php foreach ($subscribe as $s): ?>


                                            <li class="items odd">
                                                <hr style="border-top: 1px solid#aeaeae;">
                                                <div class="infoWrap"> 
                                                    <div class="cartSection">

                                                        <img src="{{ @$s['image']}}" alt="" class="itemImg" />
                                                        <h4 class="p-title">{{@$s['name']}}</h4>
                                                        <p>Month: {{@$s['month']}} &nbsp; &nbsp;  Bag: {{@$s['qty']}}</p>

                                                        @php
                                                        $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                                        $sub_cad_price = @$s['price'] ? number_format(@$s['price'],2): '';
                                                        @endphp

                                                        <p class="p-price" style=" margin-left: 115px; margin-top: -18px !important;" >${{$usd_price? number_format($usd_price * $sub_cad_price,2) :$sub_cad_price}}
                                                        </p>

                                                    </div>
                                                    <!--delete code-->
                                                    <div class="cartSection removeWrap" style="margin-top: 22px;">
                                                        <a class="remove as" href="{{route('delete.Trysubscription')}}" >x
                                                        </a>
                                                    </div>
                                                </div>

                                            </li>


                                        <?php endforeach; ?>
                                        @endif
                                        <!--------End Subscription code------>

                                        @php
                                        $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                        $cad_price = number_format($total,2);
                                        @endphp





                                    </ul>
                                    <hr style="border-top: 1px solid#aeaeae;">
                                    <?php if ($abc['totalPrice'] != 0 || $giftSubscription['totalPrice'] != 0 || $subTotal != 0) { ?>
                                        <h4>{{__('customlang.sub_total')}}: ${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</h4>
                                        <p style="font-size: 14px;">{{__('customlang.shipping_price')}}</p>
                                        <a class="button button--tight check-out"  href="{{url('/checkout')}}">{{__('customlang.checkout')}}</a>

                                    <?php } else { ?>

                                        <p style="font-size: 22px;">{{__('customlang.cart_text')}}</p>
                                        <hr style="border-top: 1px solid#aeaeae;">
                                        <button  type="submit" href="#" style="display:none"  class="button button--tight check-out">Checkout</button>
                                    <?php } ?>

                                    <br>
                                    <button type="button" id="cartBtn" class="cart-btn" data-dismiss="modal"> {{__('customlang.keep_shopping')}} </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search model close here -->

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
(function () {
    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/5fc45b2da1d54c18d8eea9cd/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
        </script>
        <!--End of Tawk.to Script-->

        <!-------------script------------------------>
        <script>


            $('a.btn.continue').click(function () {
                $('li.items').show(400);
            })

        </script>
        @yield('scripts')
    </body>
</html>