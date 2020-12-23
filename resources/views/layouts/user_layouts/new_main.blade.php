<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{config('app.name')}}</title>
        <meta charset=UTF-8>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
        <link href="https://fonts.googleapis.com/css?family=Lusitana:400,700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('public/user/newlocation/css/global.css')}}" />
        <link rel="stylesheet" href="{{asset('public/user/newlocation/css/homePage.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/user/newlocation/css/style.css')}}">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script type="text/javascript">
(function () {
    window.Urls = {staticPath: "http://localhost/coffee/public/user/newlocation/js/"};
}());
        </script>
        <script type="text/javascript" src="{{asset('public/user/newlocation/js/sprites.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/user/newlocation/js/init.js')}}"></script>
    </head>
    <body>
        <main >
            <section class="page-wrapper is-light">
                <div class="drawers drawer-top is-collapsed " data-drawer-top>
                    <div class="drawer-top__bar text-white">
                        <span class="drawer-top__message h10">
                            Ground Shipping on subscriptions is now $10 across the US/CA. All currency on our website is currently in Canadian Dollars (Better for you!)
                        </span>
                    </div>
                </div>
                <div class="account-login-row">
                    <div class="account-login-container">
                        <div class="account-wrapper">
                            <!--                     <a href="javascript:;" class="account-login-link show-unregistered bold h10" data-toggle="modal-login-ajax" data-target="#signInModal" style="display: block;" >
                                                 Login
                                                 </a>
                                                 <a href="" target="_self" class="bold account-login-link show-registered h10">
                                                 Account
                                                 </a>-->

                            <!--login code start-->
                            @if(!Auth::check())

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                login
                            </button>

                            @else

                            <li class="nav-item dropdown">
                                <!--<a id="navbarDropdown" class="nav-link " href="{{url('/profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                <a  href="{{url('/profile')}}" role="button" class="nav-link">
                                    <!--Auth::user()->name-->
                                    <img src="{{asset('public/user/logo/user_active_1-512.png')}}" style="width: 25px;
                                         height: 23px;"/>

                                </a>
                            </li>
                            @endif
                            <!--login code end-->
                        </div>
                    </div>
                </div>
                <nav class="navigation-primary is-after-drawer is-dark navigation-variant" data-navigation-primary>
                    <div class="navigation-primary__bar-wrapper">
                        <a class="navigation-primary__logo show-non-pro" style="display: block; color: white; font-size: 30px;" href="index.html">
                            {{config('app.name')}}
                        </a>
                        <a class="navigation-primary__logo navigation-primary__logo-pro show-pro" href="{{url("/")}}">
                            {{config('app.name')}}
                        </a>
                        <ul class="navigation-primary__nav-items">
                            <li class="navigation-primary__nav-item mega-menu js-menu-shop" tabindex="0">
                                <a href="javascript:;" target="_self" data-section-id="shop">
                                    <span class="h9">Shop</span>
                                    <figure class="underline"></figure>
                                </a>
                            </li>
                            <li class="navigation-primary__nav-item mega-menu js-menu-sports">
                                <a href="" target="_self" data-section-id="sports">
                                    <span class="h9">About us</span>
                                    <figure class="underline"></figure>
                                </a>
                            </li>
                            <li class="navigation-primary__nav-item">
                                <a href="" target="_self">
                                    <span class="h9">How to Brew</span>
                                    <figure class="underline"></figure>
                                </a>
                            </li>

                            <li class="navigation-primary__nav-item mega-menu js-menu-location">
                                <a href="" target="_self" data-section-id="location-menu">
                                    <span class="h9">Location</span>
                                    <figure class="underline"></figure>
                                </a>
                            </li>

                            <li class="navigation-primary__nav-item">
                                <a href="{{url('/impact')}}" target="_self">
                                    <span class="h9">Responsibility</span>
                                    <figure class="underline"></figure>
                                </a>
                            </li>
                        </ul>
                        <div class="navigation-primary__icon navigation-primary__icon--search" style="display: block;">
                            <a href="javascript:;" data-section-id="search" data-search-overlay-trigger data-tealium-event="search_open">
                                <img src="{{asset('public/user/newlocation/images/search-png.png')}}" class="nav-img-size">
                            </a>
                        </div>
                        <div class="navigation-primary__icon navigation-primary__icon--cart">
                            <a href="" data-section-id="cart">
                                <img src="{{asset('public/user/newlocation/images/cart-icon.png')}}" class="nav-img-size">
                                <div class="navigation-primary__icon--cart_count d-none"></div>
                            </a>
                        </div>
                        <div class="navigation-primary__icon navigation-primary__icon--hamburger">
                            <a href="javascript:;" target="" data-section-id="hamburger">
                                <img src="{{asset('public/user/newlocation/images/bar-icon.png')}}" class="nav-img-size">
                            </a>
                        </div>
                        <figure class="navigation-primary__bg"></figure>
                    </div>
                    <div class="navigation-primary__expanded-bar-wrapper">
                        <div class="navigation-primary__expanded-bar-left-ctas-wrapper">
                            <div class="navigation-primary__expanded-bar-login-cta-wrapper">
                                <span class="is-user-logged-in-js" data-logged-in="false"></span>
                                <a href="javascript:;" class="account-login-link show-unregistered bold h10" data-toggle="modal-login-ajax" data-target="#signInModal" data-url="/on/demandware.store/Sites-patagonia-ca-Site/en_CA/Login-Modal">
                                    <p class="h11 bold">Login</p>
                                </a>
                                <a href="" target="_self" class="show-registered">
                                    <p class="h11 bold">Account</p>
                                </a>
                                <div class="navigation-primary__countryselector">
                                    <div class="lazy-container">
                                        <div class="lazyload-ajax" data-ajax="/on/demandware.store/Sites-patagonia-ca-Site/en_CA/Page-Locale?modal=false"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="navigation-primary__expanded-bar-submenu-title-wrapper">
                            <div class="navigation-primary__expanded-bar-back-cta-wrapper">
                                <a href="javascript:;" target="_self" class="cta-link-back is-left cta-link-back-light navigation-primary__expanded-bar-back-cta" data-cta-link-back>
                                    <figure class="">
                                        <img src="{{asset('public/user/newlocation/images/back-img.png')}}" class="back-icon">
                                    </figure>
                                    <span>Back</span>
                                </a>
                            </div>
                            <span class="navigation-primary__expanded-bar-submenu-title"></span>
                        </div>
                        <div class="navigation-primary__expanded-bar-right-ctas-wrapper">
                            <a href="javascript:;" class="cta-circle cta-circle-is-light cta-circle-transparent navigation-primary__expanded-bar-search-cta cta-search" data-cta-circle data-search-overlay-trigger data-search-overlay-trigger data-section-id="search">
                                <svg class="icon--cta-circle--search">
                                <use xlink:href="#icon--search"></use>
                                </svg>
                                <figure class="cta-circle__outline"></figure>
                                <figure class="cta-circle__bg cta-circle__bg--split">
                                    <figure style="background: rgba(0,0,0,0);"></figure>
                                    <figure style="background: rgba(0,0,0,0);"></figure>
                                </figure>
                                <div class="cta-circle__hit-area"></div>
                            </a>
                            <div class="modal__close modal-close">
                                <a href="javascript:;" class="cta-circle cta-circle-light cta-circle-outlined cta-close-x cta-close-x-light cta-close-x-outlined navigation-primary__expanded-bar-close-cta" data-cta-close-x data-modal-close>
                                    <span class="close-icon-font">&times;</span>
                                    <div class="cta-circle__hit-area"></div>
                                </a>
                            </div>
                        </div>
                        <figure class="navigation-primary__expanded-bar-bg"></figure>
                    </div>
                    <div class="navigation-primary__expanded is-dark navigation-variant__expanded">
                        <div class="navigation-primary__expanded-primary-menus-wrapper">
                            <div class="lang-div">
                                <div class="lang-child"><p><b>Lang:</b></p></div>
                                <div class="lang-child">
                                   

                                    @if(session()->get('locale') =='en' || session()->get('locale')==null)
                                    <a class="button button--underline"  href="{{url('lang/fr')}}"><img src="{{asset('public/user/newlocation/images/france-icon.png')}}">FR</a>
                                    @elseif(session()->get('locale')=='fr')
                                    <a class="button button--underline"  href="{{url('lang/en')}}"><img src="{{asset('public/user/newlocation/images/english-icon.png')}}">EN</a>
                                    @endif


                                </div>
                                <div class="lang-child"><p><img src="{{asset('public/user/newlocation/images/canada-icon.png')}}">CAD</p></div>
                            </div>
                            <ul>
                                <li class="navigation-primary__expanded-section navigation-primary__expanded-section--support" data-section-id="hamburger">
                                    <div class="content-asset">
                                        <div class="navigation-primary__expanded-section--content-wrapper">
                                            <div class="navigation-primary__expanded-section--column">
                                                <div class="bar-menu-btn">
                                                    <a href="{{url('/subscribe')}}" class="mega-menu-link">Try Subscription</a>
                                                    <a href="{{url('/gift-subscription')}}" class="mega-menu-link">Gift Subscription</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="w-100 d-lg-none">
                                            <li class="my-0 mt-2">
                                                <hr class="my-0" style="border-bottom: 2px solid #4a4a4a;">
                                                <a href="https://www.patagonia.ca/account/" class="bold h9 py-1 show-unregistered" target="_blank">
                                                    Login
                                                </a>
                                                <a href="https://www.patagonia.ca/account/" target="_blank" class="bold h9 py-1 show-registered">
                                                    Account
                                                </a>
                                            </li>
                                            <li class="my-0">
                                                <hr class="my-0" style="border-bottom: 2px solid #4a4a4a;">
                                                <span data-toggle="collapse" href="#cs-company" role="button" aria-expanded="false" aria-controls="cs-company" class="bold h9 py-1 d-block is-dark d-flex justify-content-between align-items-center">
                                                    <span>Company</span>
                                                    <span style="width: 17px; height: 3px;">
                                                        <figure class="icon icon--chevron-down">
                                                            <svg>
                                                            <use href="#icon--chevron-down"></use>
                                                            </svg>
                                                        </figure>
                                                    </span>
                                                </span>
                                                <div class="collapse" id="cs-company">
                                                    <ul class="mt-1 mb-2">
                                                        <li>
                                                            <a href="https://www.patagonia.ca/business-unusual/" target="_blank">
                                                                <span class="h10">Business Unusual</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/one-percent-for-the-planet.html" target="_blank">
                                                                <span class="h10">1% for the Planet</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/how-we-fund/" target="_blank">
                                                                <span class="h10">How We Fund</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/jobs-at-patagonia/" target="_blank">
                                                                <span class="h10">Careers</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="http://www.patagoniaworks.com/" target="_blank">
                                                                <span class="h10">Press</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="my-0">
                                                <hr class="my-0" style="border-bottom: 2px solid #4a4a4a;">
                                                <span data-toggle="collapse" href="#cs-menu" role="button" aria-expanded="false" aria-controls="cs-menu" class="bold h9 py-1 d-block is-dark d-flex justify-content-between align-items-center">
                                                    <span>Customer Service</span>
                                                    <span style="width: 17px; height: 3px;">
                                                        <figure class="icon icon--chevron-down">
                                                            <svg>
                                                            <use href="#icon--chevron-down"></use>
                                                            </svg>
                                                        </figure>
                                                    </span>
                                                </span>
                                                <div class="collapse" id="cs-menu">
                                                    <ul class="mt-1 mb-2">
                                                        <li>
                                                            <a href="https://www.patagonia.ca/customer-service.html" target="_blank">
                                                                <span class="h10">Customer Service</span>
                                                            </a>
                                                        </li>
                                                        <li class="show-registered">
                                                            <a href="https://www.patagonia.ca/orders/" target="_blank">
                                                                <span class="h10">Order History</span>
                                                            </a>
                                                        </li>
                                                        <li class="show-unregistered">
                                                            <a href="https://www.patagonia.ca/order-status/" target="_blank">
                                                                <span class="h10">Order Status</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/canada-returns.html" target="_blank">
                                                                <span class="h10">Returns &amp; Repairs</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/ironclad-guarantee.html" target="_blank">
                                                                <span class="h10">Ironclad Guarantee</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/product-care.html" target="_blank">
                                                                <span class="h10">Product Care</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/pro-landing.html" target="_blank">
                                                                <span class="h10">Pro Program</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.patagonia.ca/store-locator/" target="_blank">
                                                                <span class="h10">Find a Store</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <ul class="mega-menu--item mega-menu--item__shop is-menu-desktop-only js-mega-menu-shop justify-content-around" data-section-id="shop">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('coffee')}}" class="mega-menu-link">Whole Bean Coffee</a>
                                        <a href="{{url('equipment')}}" class="mega-menu-link">Equipments</a>
                                    </div>
                                </ul>

                                <ul class="mega-menu--item mega-menu--item__sports is-menu-desktop-only js-mega-menu-sports" data-section-id="sports" style="justify-content: center;">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('/about-us')}}" class="mega-menu-link">Our Story</a>
                                        <a href="javascript:void(0)" class="mega-menu-link">Our Cafe</a>
                                        <a href="{{url('/work-with-us')}}" class="mega-menu-link">Work With Us</a>
                                        <a href="{{url('/FAQ')}}" class="mega-menu-link">Get in touch & FAQ</a>
                                    </div>
                                </ul>

                                <ul class="mega-menu--item mega-menu--item__sports is-menu-desktop-only js-mega-menu-location" data-section-id="location-menu" style="justify-content: center;">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('/surry-location')}}" class="mega-menu-link">Surry-BC</a>
                                        <a href="{{url('/white-rock')}}" class="mega-menu-link">White Rock</a>
                                    </div>
                                </ul>


                                <li class="navigation-primary__expanded-section navigation-primary__expanded-section--big-list is-menu-mobile-only" data-section-id="shop">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('/coffee')}}" class="mobile-menu-link">Whole Bean Coffee</a>
                                        <a href="{{url('/equipment')}}" class="mobile-menu-link">Equipments</a>
                                    </div>
                                </li>

                                <li class="navigation-primary__expanded-section navigation-primary__expanded-section--big-list is-menu-mobile-only" data-section-id="sports">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('/about-us')}}" class="mobile-menu-link">Our Story</a>
                                        <a href="#" class="mobile-menu-link">Our Cafe</a>
                                        <a href="{{url('/work-with-us')}}" class="mobile-menu-link">Work With Us</a>
                                        <a href="{{url('/FAQ')}}" class="mobile-menu-link">Get in touch & FAQ</a>
                                    </div>
                                </li>

                                <li class="navigation-primary__expanded-section navigation-primary__expanded-section--big-list is-menu-mobile-only" data-section-id="location-mobile-menu">
                                    <div class="mega-menu-btn">
                                        <a href="{{url('surry-location')}}" class="mobile-menu-link">Surry-BC</a>
                                        <a href="{{url('white-rock')}}" class="mobile-menu-link">White Rock</a>
                                    </div>
                                </li>

                                <li class="navigation-primary__expanded-section navigation-primary__expanded-section--mobile" data-section-id="mobile">
                                    <ul class="mobile-specific-menu">
                                        <li>
                                            <a href="javascript:;" data-section-id="shop"><span class="h5">Shop</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-section-id="sports"><span class="h5">About us</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('/brewing')}}" ><span class="h5">How to Brew</span></a>
                                        </li>                              
                                        <li>
                                            <a href="javascript:void(0)" data-section-id="location-mobile-menu"><span class="h5">Locations</span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('/impact')}}"><span class="h5">Responsibility</span></a>
                                        </li>                              
                                    </ul>

                                    <div class="content-asset">
                                        <div class="navigation-primary__expanded-section--content-wrapper">
                                            <div class="navigation-primary__expanded-section--column d-none d-lg-block">
                                                <span class="p">Company</span>
                                                <ul>
                                                    <li>
                                                        <a href="#/business-unusual/">
                                                            <span class="h5">Business Unusual</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/one-percent-for-the-planet.html">
                                                            <span class="h5">1% for the Planet</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/how-we-fund/">
                                                            <span class="h5">How We Fund</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/jobs-at-patagonia/">
                                                            <span class="h5">Careers</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.patagoniaworks.com/" target="_blank">
                                                            <span class="h5">Press</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="navigation-primary__expanded-section--column d-none d-lg-block">
                                                <span class="p">Customer Service</span>
                                                <ul>
                                                    <li>
                                                        <a href="#/customer-service.html">
                                                            <span class="h5">Customer Service</span>
                                                        </a>
                                                    </li>
                                                    <li class="show-registered">
                                                        <a href="#/orders/">
                                                            <span class="h5">Order History</span>
                                                        </a>
                                                    </li>
                                                    <li class="show-unregistered">
                                                        <a href="#/order-status/">
                                                            <span class="h5">Order Status</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/canada-returns.html">
                                                            <span class="h5">Returns &amp; Repairs</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/ironclad-guarantee.html">
                                                            <span class="h5">Ironclad Guarantee</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/product-care.html">
                                                            <span class="h5">Product Care</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/pro-landing.html">
                                                            <span class="h5">Pro Program</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#/store-locator/">
                                                            <span class="h5">Find a Store</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="w-100 d-lg-none">
                                                <li class="my-0 mt-2">
                                                    <hr class="my-0" style="border-bottom: 2px solid #4a4a4a;">
                                                    <a href="{{url('/login')}}" class="bold h9 py-1 show-unregistered">
                                                        Login
                                                    </a>
                                                    <a href="{{url('/register')}}" target="_self" class="bold h9 py-1 show-registered">
                                                        Account
                                                    </a>
                                                </li>
                                                <li class="my-0">
                                                    <hr class="my-0" style="border-bottom: 3px solid #4a4a4a;">
                                                    <span data-toggle="collapse" href="#cs-company" role="button" aria-expanded="false" aria-controls="cs-company" class="bold h9 py-1 d-block is-dark d-flex justify-content-between align-items-center">
                                                        <span>Language: </span>
                                                    </span>
                                                    <div class="collapse" id="cs-company">
                                                        <ul class="mt-1 mb-2">
                                                            <li>
                                                                <a href="#">
                                                                    <span class="h10"><img src="{{asset('public/user/newlocation/images/france-icon.png')}}" class="mobile-lang-img">FR</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <span class="h10"><img src="{{asset('public/user/newlocation/images/canada-icon.png')}}" class="mobile-lang-img">CAD</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="my-0">
                                                    <hr class="my-0" style="border-bottom: 3px solid #4a4a4a;">
                                                    <br>
                                                    <a href="" class="login-link">Login</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="navigation-primary__expanded-submenu-wrapper"></div>
                    </div>
                </nav>

                <!------------------------------------------Navbar end---------------------------------------------->


                <div class="hero hero-main is-after-drawer is-top is-dark hero-main__height-100 hero-main__responsive hero-main__general hero-main--has-bg" data-hero-main data-anchor-link-destination="home-module-hero">
                    <div class="hero-main__container">
                        <div class="hero-main__inner-container">
                            <div class="hero-main__inner">
                                <div class="container">
                                    <div class="hero-main__content">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2 hero-main__content-wrapper">
                                                <h1 class="hero-main__headline  font__secondary">
                                                    The Resonance of Stone
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3 hero-main__content-wrapper">
                                                <p class="hero-main__snippet">Listen to Terry Tempest Williams read her new story on the pulse of Castleton&nbsp;Tower.</p>
                                                <div class="hero-main__cta-wrapper">
                                                    <a href="#/story-92810.html" class="btn btn-lg btn-light cta-100 hero-main__cta-primary">
                                                        <span>Listen to the Story</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-main__video-container">
                                <video width="100%" height="100%" loop muted autoplay playsinline poster="images/2_Castletonscreengrab4800.jpg">
                                    <source src="{{asset('public/user/newlocation/images/video/16x9_2.5MB_rhiannonklee.mp4')}}" type="video/mp4">
                                </video>
                                <div class="hero-main__video-overlay"></div>
                            </div>
                            <a href="#footer-jump">
                                <div class="hero-main__caret-wrapper">
                                    <figure class="hero-main__caret">
                                        <img src="{{asset('public/user/newlocation/images/down-errow.png')}}" style="width: 20px;">
                                    </figure>
                                </div>
                            </a>
                            <div class="hero-main__overlay general-overlay"></div>
                        </div>
                    </div>
                </div>


                <br><br><br><br><br><br><br><br><br><br><br><br>

                <footer class="footer dark-theme" id="footer-jump">
                    <div class="footer__promo"></div>
                    <wainclude url="#">
                        <div class="footer__sitemap" data-skrollex>
                            <ul>
                                <li class="footer__sitemap__column">
                                    <div class="content-asset">
                                        <div class="footer-email-capture-view" data-text-email-capture-success="Thank you for signing up.">
                                            <span class="h6">Keep in touch!</span>
                                            <p class="my-2">We share coffee stories, home brew tips, product launches, events and promos.</p>
                                            
                                            @if(Session::has('status'))
                                            <span class="h7" style="color: pink;">{{session('status')}}</span>
                                            @endif
                                            <div class="js-email-capture-form-parent">
                                                 <!---------------------------------------mailchimp------------------------------------------------------>
                                                 <form class="" action="{{url('newslatter')}}" method="post">
                                                     @csrf
                                                    <div class="custom-input">
                                                        <label for="email-subscription-footer-form-email">
                                                            <input type="text" id="email-subscription-footer-form-email" name="fname" placeholder="First Name" autocomplete="fname" />
                                                            <div id="email-subscription-footer-form-email-error" class="invalid-feedback"></div>
                                                            <span>First Name</span>
                                                        </label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="custom-input">
                                                        <label for="email-subscription-footer-form-email">
                                                            <input type="text" id="email-subscription-footer-form-email" name="lname" placeholder="Last Name" autocomplete="lname" />
                                                            <div id="email-subscription-footer-form-email-error" class="invalid-feedback"></div>
                                                            <span>Last Name</span>
                                                        </label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="custom-input">
                                                        <label for="email-subscription-footer-form-email">
                                                            <input type="email" id="email-subscription-footer-form-email" name="email" placeholder="Email Address" autocomplete="email" />
                                                            <div id="email-subscription-footer-form-email-error" class="invalid-feedback"></div>
                                                            <span>
                                                                Email Address
                                                            </span>
                                                        </label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <button class="btn btn btn-dark" type="submit"  id="subscribe-submit-footer">
                                                        Subscribe
                                                    </button>
                                                </form>
                                                 
                                                 <!----------------------------------------end mailchimp------------------------------------------------>
                                            </div>
                                        </div>
                                        <div class="footer-email-capture-view-next">
                                            <span class="h6">You're Signed Up</span>
                                            <p class="my-2">Sign up for exclusive offers, original stories, activism awareness, events and more.</p>
                                            <div class="footer-email-capture-view-next-cta-wrapper">
                                                <a href="#/account/login/?action=register" class="btn btn-dark">Create an Account</a>
                                                <a href="#/account/" class="cta-link-underline">Login to Existing Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="footer__sitemap__column">
                                    <div class="content-asset">
                                        <div class="footer__help-column footer-btn">
                                            <h6>Subscription</h6>
                                            <div class="bar-menu-btn"> 
                                                <br><br>
                                                <a href="{{url('/subscribe')}}" class="mega-menu-link">Build a Subscription</a>
                                                <a href="{{url('/gift-subscription')}}" class="mega-menu-link">Gift Subscription</a>
                                                <a href="#" class="mega-menu-link">Shop</a>
                                                <a href="{{url('/coffee')}}" class="mega-menu-link">Whole Bean</a>
                                                <a href="{{url('equipment')}}" class="mega-menu-link">Equipments</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="footer__sitemap__column">
                                    <div class="content-asset">
                                        <span class="h6">About us</span>
                                        <div class="footer__sitemap__links">
                                            <ul>
                                                <li><a href="{{url('/about-us')}}" target="_blank">Our Story</a></li>
                                                <li><a href="javascript:void(0)" target="_self">Our Cafes</a></li>
                                                <li><a href="{{url('/FAQ')}}" target="_self">Get in touch & F.A.Q</a></li>
                                                <li><a href="{{url('/work-with-us')}}">Work With Us</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="javascript:void(0)" target="_self">Impact</a></li>
                                                <li><a href="{{url('/brewing')}}" target="_blank">How to Brew</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <hr style="border-top: 1px solid #e0e0e0 !important; border-bottom: none;">
                        <div class="footer__bottom-wrapper">
                            <div class="footer__bottom-copyright">
                                <div class="footer-social">
                                    <div class="content-asset">
                                        &copy; {{date('Y')}} {{config('app.name')}}, Inc. All Rights Reserved.
                                    </div>
                                    <div class="footer-social-icon">
                                        <span><a href=""><img src="{{asset('public/user/newlocation/images/facebook-icon.png')}}"></a></span>
                                        <span><a href=""><img src="{{asset('public/user/newlocation/images/instagram-icon.png')}}"></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer__bottom-countryselector">
                                <div class="lazy-container">
                                    <div class="lazyload-ajax" ></div>
                                </div>
                            </div>
                        </div>
                </footer>

                <div class="search-overlay search-overlay--no-initial-results shopping-tool__wrapper" data-search-overlay data-search-wrapper data-js-module data-type-ahead="false" data-type-ahead-start="3" data-search-suggestions="false" data-search-suggestions-start="3" data-search-suggestions-result-count="8">
                    <div class="modal__close modal-close dark-theme">
                        <a href="javascript:;" class="cta-circle cta-circle-light cta-circle-outlined cta-close-x cta-close-x-light cta-close-x-outlined search-overlay__close-cta" data-cta-close-x data-modal-close data-modal-close>
                            <img src="{{asset('public/user/newlocation/images/close-icon.png')}}" class="close-img">
                            <figure class="cta-circle__outline"></figure>
                            <figure class="cta-circle__bg ">
                                <figure></figure>
                            </figure>
                            <div class="cta-circle__hit-area"></div>
                        </a>
                    </div>
                    <div class="search-overlay__query-field-wrapper search-overlay__query-field-wrapper__has-fade-gradient">
                        <div class="site-search field-search search-overlay__query-field is-no-outline" data-field-search data-js-module>
                            <figure class="is-left">
                                <svg class="icon--search">
                                <use xlink:href="#icon--search"></use>
                                </svg>
                            </figure>
                            <span class="field-search__visible-text" data-placeholder="What are you looking for?">
                                <span class="placeholder">What are you looking for?</span>
                            </span>
                            <form role="search" action=""  name="simpleSearch">
                                <input class="search-field field-search__input form-control" type="search" name="q" value="" placeholder="What are you looking for?" autocomplete="off" aria-label="Search (keywords,etc)" />
                                <div class="suggestions-wrapper" ></div>
                                <input type="hidden" value="en_CA" name="lang">
                            </form>
                        </div>
                    </div>
                    <div class="search-overlay__scrolling-wrapper  js-search-overlay__scrolling-wrapper__initial">
                        <div class="search-overlay__categories js-search-overlay__categories__initial">
                            <div class="search-overlay__categories-content-wrapper">
                                <span class="search-overlay__categories-header h9">Popular searches</span>
                                <ul class="search-overlay__categories-items-wrapper" data-search-popular-endpoint="/on/demandware.store/Sites-patagonia-ca-Site/en_CA/SearchServices-GetPopularSuggestions"></ul>
                            </div>
                        </div>
                        <div id="searchOverlayResults" class="search-overlay__results search-overlay__results__intial">
                            <script>
(function () {
    // window.CQuotient is provided on the page by the Analytics code:
    var cq = window.CQuotient;
    if (cq && ('function' == typeof cq.getCQUserId)
            && ('function' == typeof cq.getCQCookieId)
            && ('function' == typeof cq.getCQHashedEmail)
            && ('function' == typeof cq.getCQHashedLogin)) {
        var recommender = '[[&quot;recently-viewed&quot;]]';
        // cleaning up the leading/trailing brackets and quotes:
        recommender = recommender.slice(8, recommender.length - 8);
        var separator = '|||';
        var slotConfigurationUUID = 'fd8e28d6ad3f69b5da948fa68f';
        var contextAUID = '';
        var contextSecondaryAUID = '';
        var contextAltAUID = '';
        var contextType = '';
        var anchorsArray = [];
        var contextAUIDs = contextAUID.split(separator);
        var contextSecondaryAUIDs = contextSecondaryAUID.split(separator);
        var contextAltAUIDs = contextAltAUID.split(separator);
        var contextTypes = contextType.split(separator);
        var slotName = 'search-overlay-intial-products';
        var slotConfigId = 'search-overlay-initial-products';
        var slotConfigTemplate = 'slots/search/overlayGrid.isml';
        if (contextAUIDs.length == contextSecondaryAUIDs.length)
        {
            for (i = 0; i < contextAUIDs.length; i++) {
                anchorsArray.push({id: contextAUIDs[i], sku: contextSecondaryAUIDs[i], type: contextTypes[i], alt_id: contextAltAUIDs[i]});
            }
        } else {
            anchorsArray = [{id: contextAUID, sku: contextSecondaryAUID, type: contextType, alt_id: contextAltAUID}];
        }
        var urlToCall = '/on/demandware.store/Sites-patagonia-ca-Site/en_CA/CQRecomm-Start';
        var params = {
            userId: cq.getCQUserId(),
            cookieId: cq.getCQCookieId(),
            emailId: cq.getCQHashedEmail(),
            loginId: cq.getCQHashedLogin(),
            anchors: anchorsArray,
            ccver: '1.02'
        };
        if (cq.getRecs) {
            cq.getRecs(cq.clientId, recommender, params, cb);
        } else {
            cq.widgets = cq.widgets || [];
            cq.widgets.push({
                recommenderName: recommender,
                parameters: params,
                callback: cb
            });
        }
    }
    ;
    function cb(parsed) {
        var arr = parsed[recommender].recs;
        if (arr && 0 < arr.length) {
            var filteredProductIds = '';
            for (i = 0; i < arr.length; i++) {
                filteredProductIds = filteredProductIds + 'pid' + i + '=' + encodeURIComponent(arr[i].id) + '&';
            }
            filteredProductIds = filteredProductIds.substring(0, filteredProductIds.length - 1);//to remove the trailing '&'
            var formData = 'auid=' + encodeURIComponent(contextAUID)
                    + '&scid=' + slotConfigurationUUID
                    + '&' + filteredProductIds;
            var request = new XMLHttpRequest();
            request.open('POST.html', urlToCall, true);
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.onreadystatechange = function () {
                if (this.readyState === 4) {
                    // Got the product data from DW, showing the products now by changing the inner HTML of the DIV:
                    var divId = 'cq_recomm_slot-' + slotConfigurationUUID;
                    document.getElementById(divId).innerHTML = this.responseText;
                    //find and evaluate scripts in response:
                    var scripts = document.getElementById(divId).getElementsByTagName('script');
                    if (null != scripts) {
                        for (var i = 0; i < scripts.length; i++) {//not combining script snippets on purpose
                            var srcScript = document.createElement('script');
                            srcScript.text = scripts[i].innerHTML;
                            srcScript.asynch = scripts[i].asynch;
                            srcScript.defer = scripts[i].defer;
                            srcScript.type = scripts[i].type;
                            srcScript.charset = scripts[i].charset;
                            document.head.appendChild(srcScript);
                            document.head.removeChild(srcScript);
                        }
                    }
                }
            };
            request.send(formData);
            request = null;
        }
    }
    ;
})();
                            </script>
                            <div id="cq_recomm_slot-fd8e28d6ad3f69b5da948fa68f"></div>
                        </div>
                    </div>
                </div>



            </section>
        </main>
        <!--<=======================Login Model==================>-->
        @include('partials.login')
        <!--<====================================================>-->

        <div class="modal-background"></div>


        <script defer type="text/javascript" src="{{asset('public/user/newlocation/js/main.js')}}"></script>

    </body>
</html>

