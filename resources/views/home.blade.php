@extends('layouts.user_layouts.main')

@section('content')
@include('partials.banner')
<div class="mobile-nav">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="javascript:void(0)"><b>Try a subscription</b></a>
            <a href="javascript:void(0)">Gift Subscriptions</a>
            <a href="javascript:void(0)">About</a>
            <a href="javascript:void(0)">Services</a>
            <a href="javascript:void(0)">How to brew</a>
            <!--<a href="javascript:void(0)">Responsibility </a>-->
        </div>
        <div class="menu__top_right"><a class="button button--underline">EN</a></div>
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
            <a href="/">
                <svg class="icon icon--logo" viewBox="0 0 285 170">
                <g>
                <path d="M125.701,70.931l-24.382,9.503L10.965,48.451
                      c1.291-0.666,112.387-39.102,112.387-39.102c9.573-3.492,12.748,4.08,12.748,9.736v39.077
                      C136.099,65.806,133.526,68.113,125.701,70.931"></path>
                <path d="M125.827,102.661c7.644,3.045,10.347,4.668,10.347,12.309v39.806
                      c0,5.654-3.007,12.839-12.772,9.499L14.705,125.901c-7.787-2.507-10.349-4.665-10.349-12.31L4.36,59.686L125.827,102.661z"></path>
                <path d="M159.205,70.931l24.382,9.503l90.354-31.983c-1.291-0.665-112.387-39.1-112.387-39.1
                      c-9.573-3.492-12.748,4.078-12.748,9.736v39.075C148.806,65.806,151.379,68.113,159.205,70.931"></path>
                <path d="M159.079,102.663c-7.644,3.045-10.347,4.666-10.347,12.309v39.804
                      c0,5.654,3.007,12.839,12.771,9.499L270.2,125.903c7.787-2.508,10.349-4.667,10.349-12.312l-0.003-53.904L159.079,102.663z"></path>
                </g>
                </svg>
                <svg class="icon icon--logotype" viewBox="0 0 84 15">
                <polygon points="12.2506195 0.257015192 15.1943363 0.257015192 15.1943363 13.8655943 12.2506195 13.8655943"></polygon>
                <path d="M22.9847788,13.8655943 C25.6311504,13.8655943 27.0435398,11.7487042 27.0435398,9.54781055 C27.0435398,7.34691689 25.6311504,5.6668454 22.9847788,5.6668454 L22.4495575,5.65004468 C21.6467257,5.65004468 21.1858407,4.97801609 21.1858407,4.27238606 C21.1858407,3.56675603 21.6467257,3.21394102 22.4495575,3.21394102 L26.0176991,3.21394102 L26.0176991,0.257015192 L22.999646,0.257015192 L22.3157522,0.257015192 C19.6693805,0.257015192 18.2569912,2.05469169 18.2569912,4.27238606 C18.2569912,6.47327971 19.6842478,8.47256479 22.3157522,8.47256479 L22.8509735,8.4893655 C23.6538053,8.4893655 24.1146903,8.84218052 24.1146903,9.54781055 C24.1146903,10.2534406 23.6538053,10.9254692 22.8509735,10.9254692 L18.6732743,10.9254692 L18.6732743,13.8655943 L22.9847788,13.8655943 Z"></path>
                <path d="M47.2927434,1.63467382 C47.0846018,1.01304736 46.9210619,0.76103664 46.6831858,0.542627346 C46.3858407,0.273815907 46.0884956,0.173011618 45.6424779,0.173011618 C45.2113274,0.173011618 44.899115,0.273815907 44.6017699,0.542627346 C44.3638938,0.76103664 44.200354,1.02984808 43.9922124,1.63467382 L40.1564602,13.8655943 L43.0853097,13.8655943 L45.6424779,5.43163539 L48.1847788,13.8487936 L51.1136283,13.8487936 L47.2927434,1.63467382 Z"></path>
                <path d="M30.24,0.240214477 L35.0123894,0.240214477 C37.6587611,0.240214477 39.0711504,2.35710456 39.0711504,4.55799821 C39.0711504,6.75889187 37.6587611,8.87578195 35.0123894,8.87578195 L33.2283186,8.87578195 L33.2283186,13.8487936 L30.299469,13.8487936 L30.299469,7.41411975 L30.299469,7.39731903 C30.299469,6.80929401 30.5670796,6.30527256 30.9387611,6.1204647 C31.1915044,5.98605898 31.399646,5.95245755 31.8307965,5.93565684 L33.2431858,5.93565684 L34.8934513,5.93565684 C35.6962832,5.93565684 36.1571681,5.26362824 36.1571681,4.55799821 C36.1571681,3.85236819 35.6962832,3.18033959 34.8934513,3.18033959 L30.2548673,3.18033959 L30.2548673,0.240214477 L30.24,0.240214477 Z"></path>
                <polyline points="74.9161062 0.240214477 74.9161062 13.8655943 77.859823 13.8655943 77.859823 13.8655943 77.859823 8.4893655 80.9670796 8.4893655 80.9670796 13.8655943 80.9522124 13.8655943 83.8959292 13.8655943 83.8959292 0.240214477 80.9522124 0.240214477 80.9670796 0.240214477 80.9670796 5.53243968 77.859823 5.53243968 77.859823 0.240214477 77.859823 0.240214477 74.9161062 0.240214477"></polyline>
                <polyline points="54.9939823 13.8655943 54.9939823 13.8655943 57.9376991 13.8655943 57.9376991 13.8655943 57.9376991 3.1971403 60.9111504 3.1971403 60.9111504 0.240214477 52.0056637 0.240214477 52.0056637 3.1971403 54.9939823 3.1971403 54.9939823 13.8655943"></polyline>
                <path d="M6.09557522,7.14530831 C6.09557522,9.43020554 6.00637168,9.78302055 5.78336283,10.169437 C5.51575221,10.6230563 5.11433628,10.9254692 4.38584071,10.9254692 L3.09238938,10.9254692 L3.09238938,6.0028597 L0.148672566,6.0028597 L0.148672566,11.7319035 C0.148672566,12.2191242 0.118938053,12.9919571 0.386548673,13.411975 C0.728495575,13.9327971 1.3380531,13.882395 1.76920354,13.882395 L4.57911504,13.882395 C6.36318584,13.882395 7.6120354,13.1095621 8.44460177,11.6142985 C9.02442478,10.5390527 9.02442478,9.48060769 9.02442478,7.16210903 L9.02442478,6.99410188 C9.02442478,4.67560322 9.02442478,3.61715818 8.44460177,2.54191242 C7.62690265,1.04664879 6.3780531,0.273815907 4.57911504,0.273815907 L0.148672566,0.273815907 L0.148672566,3.21394102 L4.37097345,3.21394102 C5.09946903,3.21394102 5.50088496,3.51635389 5.76849558,3.96997319 C6.00637168,4.33958892 6.08070796,4.72600536 6.08070796,6.99410188 L6.08070796,7.14530831 L6.09557522,7.14530831 Z"></path>
                <path d="M65.8619469,6.96050045 C65.8619469,4.67560322 65.9511504,4.3227882 66.1741593,3.93637176 C66.4417699,3.48275246 66.8431858,3.18033959 67.5716814,3.18033959 L68.7907965,3.18033959 L71.6155752,3.18033959 L71.6155752,0.240214477 L67.3635398,0.240214477 C65.579469,0.240214477 64.3306195,1.01304736 63.4980531,2.50831099 C62.9182301,3.58355675 62.9182301,4.64200179 62.9182301,6.96050045 L62.9182301,7.1285076 C62.9182301,9.44700626 62.9182301,10.5054513 63.4980531,11.5806971 C64.3157522,13.0759607 65.5646018,13.8487936 67.3635398,13.8487936 L71.6155752,13.8487936 L71.6155752,10.9086685 L67.5568142,10.9086685 C66.8283186,10.9086685 66.4269027,10.6062556 66.159292,10.1526363 C65.9214159,9.78302055 65.8470796,9.39660411 65.8470796,7.1285076 L65.8470796,6.96050045 L65.8619469,6.96050045 Z"></path>
                </svg>
            </a>
        </div>
    </div>
    <div class="nav-right">
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <svg class="icon icon--profile" viewBox="0 0 19 18">
                <path d="M4.54,6.5a6.73,6.73,0,0,1,1-4.37,1.35,1.35,0,0,1,1-.63H9.5"></path>
                <path d="M14.46,6.5a6.73,6.73,0,0,0-1-4.37,1.35,1.35,0,0,0-1-.63H9.5"></path>
                <path d="M14.24,3.5a6,6,0,0,1,.26,1.76,5.65,5.65,0,0,1-1.93,4.32,24.5,24.5,0,0,1-8.71,4.14S1.5,14.29,1.5,16.5"></path>
                <path d="M4.76,3.5A6,6,0,0,0,4.5,5.26,5.65,5.65,0,0,0,6.43,9.58a24.5,24.5,0,0,0,8.71,4.14s2.36.57,2.36,2.78"></path>
                </svg>
            </button>
        </li>
        <li class="nav-item">
            <svg class="icon icon--cart" viewBox="0 0 22 17">
            <path d="M1,1H5.13a.46.46,0,0,1,.44.34l1.8,7.52a2.13,2.13,0,0,0,2,1.58h8.36a2.06,2.06,0,0,0,2-1.51l1.16-4.48a1.55,1.55,0,0,0-.29-1.38,1.55,1.55,0,0,0-1.3-.62H11"></path>
            <circle cx="9" cy="15" r="1"></circle>
            <circle cx="15" cy="15" r="1"></circle>
            </svg>
        </li>
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
</header>

<div class="banner-parent" style="width: 100%; position: inherit;">
  <section class="hero ">
 <?php $video =($video === null )?'' :$video->video ?>
<video   id="video"  loop="" muted="" autoplay="" playsinline="" poster="images/2_Castletonscreengrab4800.jpg">
                <source src="{{asset('public/uploads/videos/'.$video)}}" type="video/mp4">
  <source src="http://kosher.mmsservices.co.uk/1607518359_2.ogg" type="video/ogg">
            </video>
  
    <progress  id="progress" max="100" value="0">Progress</progress>
    


  <div id="banner-tc" class="banner-text" bis_skin_checked="1">
            <h1>{{__('customlang.title')}}</h1>
            <p>{{__('customlang.sub-heading')}}<br>
                {{__('customlang.sub-heading-2')}}<b>{{__('customlang.free_shipping')}}</b>
            </p>
            <div class="banner-button" bis_skin_checked="1">
                <a href="http://islands.cafe/shop/subscribe">{{__('customlang.subscribe')}}</a>
            </div>
            
        </div>
 
  </section> 
<button id="mute" class="mute">Mute</button>
</div>

<section class="section1">
<!--    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-h2">What Better Coffee Means to Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="best-in">
                    <img src="{{asset('public/user/assets/images/icon-1.png')}}">
                    <h3 class="text_center">Convenience</h3>
                    <hr class="hr--short">
                    <p>Receive one personalized monthly delivery of coffee beans. You can easily <strong class="text">skip, adjust, or cancel your subscription at any time. </strong>We remind you 48 hours before your next delivery to do so.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="best-in">
                    <img src="{{asset('public/user/assets/images/icon-2.png')}}">
                    <h3 class="text_center">A Fair Price</h3>
                    <hr class="hr--short">
                    <p>The coffee industry was founded on unfair margin distribution. Part of building a sustainable supply chain to us, means taking smaller margins and extending our wholesale price to you.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="best-in">
                    <img src="{{asset('public/user/assets/images/icon-3.png')}}">
                    <h3 class="text_center">Responsible Sourcing</h3>
                    <hr class="hr--short">
                    <p>We purchase coffee from small scale farmers and co-ops. All of our purchases reinforce positive social, economic, and environmental impacts. When you subscribe, you enable us to do more. <a href="{{url('/impact')}}"><u><strong class="text">Find out more.</strong></u></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 best-a">
                @php
                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                $cad_price = number_format(16.50,2);
                @endphp

                <a class="button button--big" href="{{url('subscribe')}}">Starting at ${{$usd_price? $usd_price*$cad_price :$cad_price}} /month</a>
            </div>
        </div>
    </div>-->
</section>
<section class="new-products">
    <div class="container" style="margin-top: -101px;">
        <!--        <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading-h2">Our Newest Releases</h2>
                        <p class="text_center medium medium_bottom">Produced by small scale farmers, roasted in Montreal </p>
                    </div>
                </div>-->
        <div class="row">
            @foreach($products as $product)

            <div class="col-md-4">
                <div class="pro-in">
                    <a href="{{url('/show/'.$product->id)}}">
                        <?php $getImage = explode(",", $product->image); ?>
                        <img src="{{asset('public/uploads/products/'.$getImage[0])}}">
                        <div class="content-b">
                            <h4><?php
                                if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                    echo $product->name;
                                } elseif (session()->get('locale') == 'fr') {
                                    echo $product->name_fr;
                                }
                                ?></h4></a>
                    <span class="tag">{{__('customlang.whole_beans')}}</span>
                    @php
                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                    $cad_price = number_format($product->price,2);
                    @endphp
                    <strong>${{$usd_price? number_format($usd_price*$cad_price,2) :$cad_price}}</strong>
                    <!--                    <div class="price-b">
                                            <small class="brand"></small>
                                            
                                        </div>-->
                    <p class="slight">
                        <?php
                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                            echo $product->type;
                        } elseif (session()->get('locale') == 'fr') {
                            echo $product->type_fr;
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>

        @endforeach



        <!--            <div class="col-md-4">
                        <div class="pro-in">
                            <img src="{{asset('public/user/assets/images/product2.jpg')}}">
                            <div class="content-b">
                                <h4>La Claudinota - Colombia</h4>
                                <span class="tag">Whole bean</span>
                                <div class="price-b">
                                    <small class="brand">333g bag</small>
                                    <strong>$24.00</strong>
                                </div>
                                <p class="slight">Apricot, plum, and cotton candy.</p>
                            </div>
                        </div>
                    </div>-->
        <!--            <div class="col-md-4">
                        <div class="pro-in">
                            <img src="{{asset('public/user/assets/images/product-3.jpg')}}">
                            <div class="content-b">
                                <h4>Buhorwa - Burundi</h4>
                                <span class="tag">Whole bean</span>
                                <div class="price-b">
                                    <small class="brand">333g bag</small>
                                    <strong>$22.50</strong>
                                </div>
                                <p class="slight">Black tea, orange and butterscotch.</p>
                            </div>
                        </div>
                    </div>-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text_center button-bg"><a class="button button--big" href="{{url('/all')}}">Shop All</a></div>
        </div>
    </div>
</div>
</section>
<!--<section class="equal-div home">
    <div class="text-divv">
        <h2>Our Promise: From a Better Place</h2>
        <p class="slight">Since 2012, we've been working to build a fairer, and transparent supply chain, and for us, this requires approaches to trade that go beyond certifications. </p>
        <div><a class="button button--big" href="#">Learn more</a></div>
    </div>
    <div class="img-div">
        <img src="{{asset('public/user/assets/images/img-right.jpg')}}">
    </div>
</section>
<section class="equal-div home">
    <div class="img-div">
        <img src="{{asset('public/user/assets/images/img-left.jpg')}}">
    </div>
    <div class="text-divv">
        <h2>Preparation Guides</h2>
        <p class="slight">Brewing is one of the most critical steps in a coffee's journey from farm to your cup. Read our step-by-step guides to perfect your home brew. </p>
        <div><a class="button button--big" href="#">Free recipes</a></div>
    </div>
</section>-->
<section class="insta-div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-h2 insta-h">Follow our story <a href="https://www.instagram.com/islandscafe/?hl=en" target="_Blank">@Islandscoffee</a></h2>
                <div class="insta-img">
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-1.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-2.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-3.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-4.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-5.png')}}">
                    </div>
                </div>
                <div class="insta-img">
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-8.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-9.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-10.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-11.png')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/brew-12.png')}}">
                    </div>
                </div>
                <div class="insta-img">
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-6.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-7.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-13.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-14.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-15.jpg')}}">
                    </div>
                    
                </div>
                
                <div class="insta-img">
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-16.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-17.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-18.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-19.jpg')}}">
                    </div>
                    <div class="insta-in">
                        <img src="{{asset('public/user/assets/v2/insta-20.jpg')}}">
                    </div>
                </div>
                 
                </div>
            </div>
        </div>
    </div>
    <!-- <script> -->
    
</section>

<style type="text/css">
    .header-bottom {
        border-bottom: none;
        box-shadow: none;
    }
    .header-bottom #logo{
        filter: brightness(1);
    }

    .header-bottom:hover #logo{
        filter: brightness(0);
    }

    .header-bottom span.cart-img img {
        filter: brightness(1);
    }
    .header-bottom:hover span.cart-img img {
        filter: brightness(0);
    }
    header a {
        font-weight: 400;
        color: #fff;
        margin-left: 1rem;
    }
    .header-bottom {
        padding: 20px 0px;
        background: transparent;
        transition: .4s;
    }
    a.subscribe-bold {
        transition: .4s;
        border: 3px solid white;
        padding: 8px 30px;
        border-radius: 10px;
        color: #fff;
    }
    .header-bottom:hover a.subscribe-bold {
        border: 3px solid #000;
        padding: 8px 30px;
        border-radius: 10px;
        color: #000;
    }
</style>


@include('partials.keep_in_touch')
<script>


//            Homepage video script


            const progress = document.getElementById("progress");
            const element = document.getElementById("banner-tc");
            const mute = document.getElementById("mute");

            function progressLoop() {
                setInterval(function () {
                    progress.value = Math.round((video.currentTime / video.duration) * 100);



                    if (progress.value == 12) {
                        element.classList.add("mystyle");
                    }
                    if (progress.value == 15) {
                        video.currentTime = 0;
                    }
                    if (progress.value == 15) {
                        element.classList.remove("mystyle");
                    }
                });
            }
            progressLoop();

            function myFunction() {
                if (video.muted == true) {
                    video.muted = false;
                } else {
                    video.muted = true;
                }
            }
            mute.onclick = function () {
                myFunction()
            };
//End hoempage script

</script>
@endsection
