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
            .icons{
                font-size: 18px;
                width: 57px;
                height: 56px;
            }
            #login_class button:hover {
                color: black;
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
                                                <a class="dropdown-item" href="{{url('about-us')}}">Our Story</a>
                                                <!--<a class="dropdown-item" href="#">Our cafes</a>-->
                                                <a class="dropdown-item" href="{{url('work-with-us')}}">Work with us</a>
                                                <a class="dropdown-item" href="{{url('/FAQ')}}">Get in Touch & FAQ</a>
                                                <!--<a class="dropdown-item" href="{{url('impact')}}">{{__('customlang.responsibility')}} </a>-->
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('brewing')}}">{{__('customlang.how_to_brew')}}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Our cafes
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
<!--                                    <a class="subscribe-bold" href="{{url('subscribe')}}">
                                         {{__('customlang.try_subscription')}} 
                                        SUBSCRIBE
                                    </a>-->
                                    <!--<a class="" href="{{url('gift-subscription')}}">{{__('customlang.gift_subscription')}}</a>-->
                                </div>
                                <div class="cart-parent">
                                    <!-- search btn start here -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-search">
                                        <span class="cart-img">
                                            <img src="{{asset('public/user/assets/images/search-png.png')}}">
                                        </span>
                                    </button>
                                    <!--login code-->
<!--                                    <span class="cart-img" >
                                        @if(!Auth::check())
                                        <button type="button" class="btn btn-primary login-button" data-toggle="modal" data-target="#myModal">
                                            Login
                                        </button>
                                        @else
                                        <a id="navbarDropdown" class="nav-link " href="{{url('/profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <a href="{{url('/profile')}}" role="button" >
                                            Auth::user()->name
                                            <img src="{{asset('public/user/assets/images/settings.png')}}" style="width: 25px;
                                                 height: 23px;"/>
                                        </a>
                                        @endif
                                    </span>-->
                                    <!--end login code-->
                                    <!-- search btn end here -->
                                    <!-- cart btn start -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                                        <span class="badge" style="color: red;font-size: 12px;">
<!--                                            <span class="cart-img">
                                                <img src="{{asset('public/user/assets/images/cart-icon.png')}}">
                                            </span>-->
                                            <?php
                                            $cartTotal = Session::has('cart') ? (Session::get('cart')->totalPrice == 0 ) ? '0.00' : Session::get('cart')->totalPrice : '0.00';
                                            $giftTotal = Session::has('giftcart') ? (Session::get('giftcart')->totalPrice == 0 ) ? '0.00' : Session::get('giftcart')->totalPrice : '0.00';
                                            $total = $cartTotal + $giftTotal;

                                            $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                                            $cad_price = number_format($total, 2);
                                            ?>
                                            <!--${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}-->
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
        <!-- Content start Here -->
        <br><br><br><br><br><br><br><br><br>
        <div class="location_main">    
            <div class="container">
                <div class="row">
                    <div class="tm-main">
                        <div class="">                   
                            <section id="home" class="row">
                                <div id="" class="col-md-3"> 
                                    <nav class="tm-nav">             
                                        <ul id="tm-main-nav">
                                            <li class="loca_cont" style="list-style: none;">
                                                <strong style="text-transform: uppercase;">Located at</strong>
                                                <p>1237 Johnston Rd, White Rock, BC V4B 3Y8, Canada</p>
                                                 <a href="https://goo.gl/maps/h5tmQaHVeSPCXggr5" target="_blank">Show on Google Maps</a>
                                                <br>
                                                <div class="mapouter mb-2">
                                                    <div class="gmap_canvas">
                                                        <iframe width="220" height="220" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10465.041033528632!2d-122.8014571!3d49.0246569!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xccaf50df2411c221!2sIslands%20Cafe!5e0!3m2!1sen!2sin!4v1589747172073!5m2!1sen!2sin" width="220" height="220" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="time-text">
                                                    <h6>OPENING HOURS</h6>

                                                    <p><strong> Sunday </strong><span>  9:00 AM-3:00 PM </span> </p>

                                                    <p><strong> Monday-Saturday: </strong><span>  9:00 AM-3:00 PM </span> </p>

                                                </div>
                                                <div class="booking-text">
                                                    <h6>BOOKING HEADING</h6>
                                                    <span> </span>

                                                </div>

                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-9">
                                    <section id="about">
                                        <div class="">   
                                            <div class="main_sec_cnt">
                                                <p>
                                                    Islands Cafe has locations in White Rock and South Surrey. It is a privately owned Cafe and Roaster. The main focus is freshly Roasted Hawaiian Coffee, and a few “Surf Culture” staples such as: The North Shore Acai Bowl, The Kahuku Poke Bowl, and The Honolua Breakfast Sandwich. Providing a healthy alternative to most fast food and Café chains with the absolute Best Coffee you will ever have. Islands Café is a Taste of Paradise ® “Ja and I wanted to share what we loved about Hawaii with our local community. The food, the Drinks and the Surf Culture all in one place. “ - Robb Harding, Owner.
                                                </p>
                                            </div>                              
                                        </div>
                                    </section>
                                    <section id="menu_rgt">
                                        <div class="">
                                            <div class="nav_sec_inner">
                                                <nav role="navigation" class="menu-itemspdf"> 
                                                    <h6>SEE THE MENUS</h6>
                                                    <ul>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <span>CLICK TO DOWNLOAD A PDF MENU</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>                                  
                                            </div>
                                        </div>
                                    </section>
                                    <section id="gallery" class="">
                                        <h5 class="GALLERY">GALLERY</h5>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item portrait">
                                                        <a href="#"><img src="{{asset('public/user/location/images/gallery.png')}}" alt="Image"/></a>
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item building">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_14.jpg')}}" alt="Image"/></a>   
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item nature">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_10.jpg')}}" alt="Image"/></a>           
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item animal">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_8.jpg')}}" alt="Image"/></a>            
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item building">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_3.jpg')}}" alt="Image"/></a>        
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item nature">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_5.jpg')}}" alt="Image" style="height: 280px;"/></a>     
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item portrait">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_11.jpg')}}" alt="Image"/></a>           
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item animal">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_9.jpg')}}" alt="Image"/></a>        
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item building">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_4.jpg')}}" alt="Image"/></a>        
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                   <figure class="effect-honey tm-gallery-item portrait">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_15.jpg')}}" alt="Image"/></a>           
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item animal">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_6.jpg')}}" alt="Image"/></a>            
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                   <figure class="effect-honey tm-gallery-item animal">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_13.jpg')}}" alt="Image"/></a>           
                                                    </figure>  
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item building">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_12.jpg')}}" alt="Image"/></a>       
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item nature">
                                                        <a href="#"><img src="{{asset('public/user/location/images/mainimage.png')}}" alt="Image" style="width: 265px; height: 280px;"/></a>        
                                                    </figure> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                     <figure class="effect-honey tm-gallery-item portrait">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_2.jpg')}}" alt="Image"/></a>        
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                     <figure class="effect-honey tm-gallery-item animal">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_7.jpg')}}" alt="Image"/></a>            
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="tm-gallery">
                                                    <figure class="effect-honey tm-gallery-item nature">
                                                        <a href="#"><img src="{{asset('public/user/location/images/white_Rock/image_1.jpg')}}" alt="Image"/></a>        
                                                    </figure>

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </section>
                        </div>

                    </div>                   
                </div>
            </div>
        </div>
        <br><br><br><br>
        <!-- content close here -->
        <footer id="footer-connect">
            <div class="container">
                <div class="row" style="margin-bottom: -107px;">
                    <div class="col-md-4 footer-first-row">
                        <h3 class="footer-header"><img style="width: 54px;" src="{{asset('public/user/assets/images/email.png')}}">Subscribe</h3>
                        <p>Sign up for exclusive deals, new coeeerings,
                            and the latest roasting stories!
                        </p>
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
                                    <li><a href="{{url('/about-us')}}">About Us</a></li>
                                    <li><a href="javascript:void(0)">Gift Cards</a></li>
                                    <li><a href="{{url('/surry-location')}}">Find a Store</a></li>
                                    <li><a href="javascript:void(0)">Careers</a></li>
                                    <li><a href="javascript:void(0)">Press</a></li>
                                    <li><a href="javascript:void(0)">Online training</a></li>
                                </ul>
                            </div>
                            <div class="more-info-child">
                                <ul>
                                    <li><a href="javascript:void(0)"><img src="{{asset('public/user/assets/images/instagram.png')}}" style="width: 15px;"/> Instagram</a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('public/user/assets/images/facebook.png')}}" style="width: 15px;"/> Facebook</a></li>
                                    <li><a href="javascript:void(0)"><img src="{{asset('public/user/assets/images/insurance.png')}}" style="width: 15px;"/> Privacy Policy</a></li>
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
                                <a href="{{url('lang/fr')}}"><img src="{{asset('public/user/newlocation/images/france-icon.png')}}">FR</a>
                                <!--<a class="button button--underline" >FR</a>-->
                                @elseif(session()->get('locale')=='fr')
                                <!--<a class="button button--underline" >EN</a>-->
                                <a href="{{url('lang/en')}}"><img src="{{asset('public/user/newlocation/images/english-icon.png')}}">EN</a>
                                @endif
                                <!--mycode-->
                                <a class="button button--underline" style="margin: 4px; border-bottom: none;" href="javascript:void(0)" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if (Session::has('curency_rate')):
                                        echo Session::get('curency_rate') != 0 ? "<img src=" . asset("public/user/assets/images/united-states.png") . ">" : "<img src=" . asset("public/user/newlocation/images/canada-icon.png") . " >";
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
                                <!-- <a href="" class="not-selected-lang">
                                   <img src="{{asset('public/user/newlocation/images/canada-icon.png')}}">CAD</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>