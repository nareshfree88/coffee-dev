@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading1">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    <h3 class="flat_bottom" style="opacity: 1;"><span class="h__step">1</span> {{__('customlang.choose_coffe_bag')}}</h3>
                                </a>
                            </h4>
                            <button type="button" class="button button--underline edit" style="display: none" data-toggle="collapse"
                                    data-parent="#accordion"  data-target="#collapse1">Edit</button>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body">
                                <img src="{{asset('public/user/assets/v2/Background.png')}}" style="height: 365px;">
                                <form id="bags">
                                    <p class="max_width max_width--short_text"> {{__('customlang.try_subscription_desc')}}</p>
                                    <nav class="content1">
                                        <div class="">
                                            <input type="number" id="bag"  class="number" name="qty" required="required" value="1" min="1" style="width: 100%;"/>
                                            <!--                                          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                                                         <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">1</a>
                                                                                         <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">2</a>
                                                                                         <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">3</a>
                                                                                         <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">4</a>
                                                                                      </div>-->
                                        </div>
                                        <div class="col brand">
                                            <h6 style="margin-left: 15px;">
                                                <strong>bags per month</strong><br>
                                                <small style="font-size: 0.9530rem;"><span id="per_gram"></span> or <span id="coffee_cup"></span> coffee cups</small>
                                            </h6>
                                        </div>
                                    </nav>
                                    <div class="more"><button type="button" class="button button--underline">Or more?</button></div>
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <table class="table--slight small_bottom small_top">
                                                <tbody>
                                                    <tr>
                                                        <td><strong id="per_coffee_cup">98 cents</strong> &nbsp; <span id="cent">cents</span><br><small>per coffee cup</small></td>
                                                        @php
                                                        $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                                        $stripe_cad_price = number_format(22.50,2);    
                                                        @endphp


                                                        <td style="text-align:right;"><strong><span class="alt_accent strike">{{$usd_price ? number_format($usd_price * $stripe_cad_price,2) :$stripe_cad_price}}</span> 
                                                                @php
                                                                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                                                $cad_price = number_format(20.50,2);    
                                                                @endphp


                                                                <span>$</span> <span id="default_price">{{$usd_price?$usd_price * $cad_price :$cad_price}}</span>
                                                            </strong><br>
                                                            <small>↻ per bag</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align:right;"><svg class="icon icon--shipping" viewBox="0 0 34 26">
                                                            <path d="M23.013 13.6722L33.091 10.2424V21.5915L23.1172 25.2121L14.1819 20.8744V13.089" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M22.8485 24.4242V13.4214L14.1819 9.45454" stroke-linecap="round"></path>
                                                            <path d="M14.1819 9.13826L24.209 5.51515L32.3031 9.45454" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6.30298 0.787872L14.9696 4.72727" stroke-linecap="round"></path>
                                                            <path d="M0 4.72726L10.2424 9.45454" stroke-linecap="round"></path>
                                                            <path d="M1.57568 11.8182L10.2423 15.7576" stroke-linecap="round"></path>
                                                            </svg>&nbsp; <strong>$10 Flat Rate Shipping to the US 🇺🇸</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <table class="table--slight small_bottom small_top">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>98 cents</strong><br><small>per coffee cup</small></td>
                                                        <td style="text-align:right;"><strong><span class="alt_accent strike">22.50</span> $20.50</strong><br><small>↻ per bag</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align:right;"><svg class="icon icon--shipping" viewBox="0 0 34 26">
                                                            <path d="M23.013 13.6722L33.091 10.2424V21.5915L23.1172 25.2121L14.1819 20.8744V13.089" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M22.8485 24.4242V13.4214L14.1819 9.45454" stroke-linecap="round"></path>
                                                            <path d="M14.1819 9.13826L24.209 5.51515L32.3031 9.45454" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6.30298 0.787872L14.9696 4.72727" stroke-linecap="round"></path>
                                                            <path d="M0 4.72726L10.2424 9.45454" stroke-linecap="round"></path>
                                                            <path d="M1.57568 11.8182L10.2423 15.7576" stroke-linecap="round"></path>
                                                            </svg>&nbsp; <strong>$10 Flat Rate Shipping to the US & CA</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <table class="table--slight small_bottom small_top">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>98 cents</strong><br><small>per coffee cup</small></td>
                                                        <td style="text-align:right;"><strong><span class="alt_accent strike">22.50</span> $20.50</strong><br><small>↻ per bag</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align:right;"><svg class="icon icon--shipping" viewBox="0 0 34 26">
                                                            <path d="M23.013 13.6722L33.091 10.2424V21.5915L23.1172 25.2121L14.1819 20.8744V13.089" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M22.8485 24.4242V13.4214L14.1819 9.45454" stroke-linecap="round"></path>
                                                            <path d="M14.1819 9.13826L24.209 5.51515L32.3031 9.45454" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6.30298 0.787872L14.9696 4.72727" stroke-linecap="round"></path>
                                                            <path d="M0 4.72726L10.2424 9.45454" stroke-linecap="round"></path>
                                                            <path d="M1.57568 11.8182L10.2423 15.7576" stroke-linecap="round"></path>
                                                            </svg>&nbsp; <strong>$10 Flat Rate Shipping to the US & CA</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                            <table class="table--slight small_bottom small_top">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>98 cents</strong><br><small>per coffee cup</small></td>
                                                        <td style="text-align:right;"><strong><span class="alt_accent strike">22.50</span> $20.50</strong><br><small>↻ per bag</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align:right;"><svg class="icon icon--shipping" viewBox="0 0 34 26">
                                                            <path d="M23.013 13.6722L33.091 10.2424V21.5915L23.1172 25.2121L14.1819 20.8744V13.089" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M22.8485 24.4242V13.4214L14.1819 9.45454" stroke-linecap="round"></path>
                                                            <path d="M14.1819 9.13826L24.209 5.51515L32.3031 9.45454" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6.30298 0.787872L14.9696 4.72727" stroke-linecap="round"></path>
                                                            <path d="M0 4.72726L10.2424 9.45454" stroke-linecap="round"></path>
                                                            <path d="M1.57568 11.8182L10.2423 15.7576" stroke-linecap="round"></path>
                                                            </svg>&nbsp; <strong>$10 Flat Rate Shipping to the US 🇺🇸</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center next-butn">
                                    <button type="button" class="button button--full btn-md bagQty"  data-toggle="collapse"
                                            data-parent="#accordion"  data-target="#collapse2" >Next step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Next panel start-->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="false" aria-controls="collapse2">
                                    <h3 class="flat_bottom" style="opacity: 1;"><span class="h__step">2</span> {{__('customlang.choose_coffee')}}</h3>
                                </a>
                            </h4>
                            <button type="button" class="button button--underline edit" style="display: none" data-toggle="collapse"
                                    data-parent="#accordion"  data-target="#collapse2">Edit</button>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                            <div class="panel-body">
                                <p class="max_width max_width--short_text">{{__('customlang.select_coffee')}}</p>
                                <form id="origins">
                                    <div class="container">
                                        <div class="row">

                                            @foreach($wholeBrans as $item)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="card">
                                                    <div class="card-img">

                                                        <?php $getImage = explode(",", $item->image); ?>
                                                        <img src="{{asset('public/uploads/products/'.$getImage[0])}}">

                                                    </div>
                                                    <div class="card__content">
                                                        <h6 class="text flat_bottom">{{$item->name}}</h6>
                                                        <p>{{$item->type}}</p>
                                                    </div>
                                                    <!--                                                    <div class="card__button">
                                                                                                            <button type="button" class="button button--muted button--full">Add Bag</button>
                                                                                                            <button type="button" class="button button--muted">–</button>
                                                                                                            <button type="button" class="button button--muted">+</button>
                                                                                                        </div>-->
                                                    <div class="card__button" >
                                                        <button type="button" class="button button--muted button--full removeItem{{$item->id}} add-bag" data-coffee-id="{{$item->id}}" id="show_button" style="display: block;height: 50px;padding: 0px 0px 0px 0px;">Add Bag</button>
                                                        <!--work area-->


                                                        <!--end work area-->
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center next-butn">
                                    <button type="button" class="button button--full btn-md bagQty3" disabled=""  data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">Next step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Next panel start-->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading3">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse32" aria-expanded="false" aria-controls="collapse3">
                                    <h3 class="flat_bottom" style="opacity: 1;"><span class="h__step">3</span>{{__('customlang.whole_or_ground')}}</h3>
                                </a>
                            </h4>
                            <button type="button" class="button button--underline edit" style="display: none" data-toggle="collapse"
                                    data-parent="#accordion"  data-target="#collapse3">Edit</button>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                            <div class="panel-body">
                                <form id="bags">
                                    <p class="max_width max_width--short_text">{{__('customlang.choose_box')}} </p>
                                    <nav class="content1">
                                        <div class="col">
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active whole_beans" id="nav-home-tab" data-toggle="tab" href="#whole" role="tab" aria-controls="nav-home" aria-selected="true">{{__('customlang.whole_beans')}}</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#ground" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('customlang.ground_for_brewing')}}</a>

                                            </div>
                                        </div>

                                    </nav>

                                    <div class="tab-content py-3 px-3 px-sm-0 space-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="whole" role="tabpanel" aria-labelledby="nav-home-tab">

                                        </div>

                                        <div class="tab-pane fade" id="ground" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <input type="radio" name="grind" id="bags_grind_espresso" value="espresso">
                                            <label for="bags_grind_espresso">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Espresso<small> – very fine</small>
                                                    </span>
                                                    <span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/espressocup-svg.png')}}"></span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_stovetop" value="stovetop">
                                            <label for="bags_grind_stovetop">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Stovetop<small> – fine</small></span>
                                                    <span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/stovetop-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_aeropress" value="aeropress">
                                            <label for="bags_grind_aeropress">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Aeropress<small> – medium-fine</small>
                                                    </span>
                                                    <span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/aeropress-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_v60" value="v60">
                                            <label for="bags_grind_v60">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>V60 / Pour Over<small> – medium</small>
                                                    </span><span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/v60-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_frenchpress" value="frenchpress">
                                            <label for="bags_grind_frenchpress">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>French Press<small> – medium-coarse</small></span>
                                                    <span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/frenchpress-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_chemex" value="chemex">
                                            <label for="bags_grind_chemex">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Chemex<small> – coarse</small></span>
                                                    <span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/chemex-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_autodrip" value="autodrip">
                                            <label for="bags_grind_autodrip">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Auto-Drip<small> – coarse</small></span>
                                                    <span style="width: 60px;">
                                                        <img class="img--center" src="{{asset('public/user/assets/brewing/auto-drip-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                            <input type="radio" name="grind" id="bags_grind_coldbrew" value="coldbrew">
                                            <label for="bags_grind_coldbrew">
                                                <div class="grid grid--spaced grid--middle">
                                                    <span>Cold Brew<small> – coarse</small></span>
                                                    <span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/cold-svg.png')}}">
                                                    </span>
                                                </div>
                                            </label>
                                        </div>


                                    </div>
                                </form>
                                <div class="text-center next-butn">
                                    <button type="button" class="button button--full select_beans"  data-toggle="collapse"
                                            data-parent="#accordion" data-target="#collapse5">Next step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Next panel start-->

                    <!--Next panel start-->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading5">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse54" aria-expanded="false" aria-controls="collapse5">
                                    <h3 class="flat_bottom" style="opacity: 1;"><span class="h__step">4</span>  {{__('customlang.review_subs')}}</h3>
                                </a>
                            </h4>
                            <!--<button type="button" class="button button--underline edit">Edit</button>-->
                        </div>
                        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                            <!--start checkout table-->

                            <div class="panel-body">
                                <table class="normal_bottom" id="tableData">
                                    <tbody class="checkout">

                                    </tbody>
                                    <tr><td colspan="2"><strong>Grind</strong></td><td colspan="2" id="SelectGrind">--</td></tr>
                                    <tr><td colspan="2"><strong>Shipping cost</strong></td><td colspan="2"><svg class="icon icon--shipping" viewBox="0 0 34 26"><path d="M23.013 13.6722L33.091 10.2424V21.5915L23.1172 25.2121L14.1819 20.8744V13.089" stroke-linecap="round" stroke-linejoin="round"></path><path d="M22.8485 24.4242V13.4214L14.1819 9.45454" stroke-linecap="round"></path><path d="M14.1819 9.13826L24.209 5.51515L32.3031 9.45454" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.30298 0.787872L14.9696 4.72727" stroke-linecap="round"></path><path d="M0 4.72726L10.2424 9.45454" stroke-linecap="round"></path><path d="M1.57568 11.8182L10.2423 15.7576" stroke-linecap="round"></path></svg>&nbsp; <strong>$10 Flat Rate Shipping to the US 🇺🇸</strong></td></tr>
                                    <tr>
                                        <td colspan="2"><strong>Expected ship date </strong></td>
                                        <td colspan="2">within 2 business days</td></tr><tr><td colspan="2"><strong>Monthly subtotal</strong></td>
                                        <td colspan="2">
                                            <h3><strong class="alt_accent strike"></strong> $<span class="sub__total">0</span></h3>
                                        </td>
                                    </tr>

                                </table>
                                <p class="text_center">No Strings Attached! Adjust, skip, cancel anytime.</p>
                                <button type="button" id="post_checkout" class="button button--full">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!---------------More info--------------------------->
<div class="modal fade more-in" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                    <li data-target="#demo" data-slide-to="3"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="corner">New Release!</div>
                                    <div class="carousel-item active">
                                        <img src="{{asset('public/user/assets/images/LaClaudinota.jpg')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('public/user/assets/images/claudinota1.jpg')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('public/user/assets/images/claudinota2.jpg')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('public/user/assets/images/claudinota3.jpg')}}">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="more-info"> 
                                <h2>La Claudinota <small class="small--bottom">333g bag</small></h2>
                                <div class="medium_bottom"><p>La Claudinota is a dry-processed lot from a farm called La Claudina, in Antioquia, Colombia. Juan Saldarriaga has two farms in Antioquia that deviate from the region's commercial estate status quo. He now works with young farmers in his area to heighten their market access and self-sufficiency. In the cup, we taste apricot, plum, and cotton candy.</p><p><i>All of our coffees are medium-light roast and packaged in 333g bags. Coffee is whole bean, and can be ground for subscription orders only.</i>
                                    </p></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        document.getElementsByClassName("bagQty3").disabled = true;

        $('.bagQty').click(function () {
            $("#collapse1").removeClass("show");
            $('#heading1').children('.edit').css('display', 'block');
        });
        $('.bagQty3').click(function () {
            $("#collapse1").removeClass("show");
            $("#collapse2").removeClass("show");
            $('#heading2').children('.edit').css('display', 'block');
        });

        $('.select_beans').click(function () {
            $("#collapse1").removeClass("show");
            $("#collapse2").removeClass("show");
            $("#collapse3").removeClass("show");
            $('#heading3').children('.edit').css('display', 'block');
        });

        $('.bagQty5').click(function () {
            $("#collapse1").removeClass("show");
            $("#collapse2").removeClass("show");
            $("#collapse4").removeClass("show");
            $('#heading4').children('.edit').css('display', 'block');
        });
        $('#heading1').children('.edit').click(function () {

            $("#collapse2").removeClass("show");
            $("#collapse3").removeClass("show");
            $("#collapse4").removeClass("show");
            $("#collapse5").removeClass("show");
            $('#heading2').children('.edit').prop('disabled', true);
            $('#heading3').children('.edit').prop('disabled', true);
            $('#heading4').children('.edit').prop('disabled', true);

            $('#heading2').children('.edit').css('display', 'none');
            $('#heading3').children('.edit').css('display', 'none');
            $('#heading4').children('.edit').css('display', 'none');
        });

        $('#heading2').children('.edit').click(function () {

            $("#collapse3").removeClass("show");
            $("#collapse4").removeClass("show");
            $("#collapse5").removeClass("show");
            $('#heading3').children('.edit').prop('disabled', true);
            $('#heading4').children('.edit').prop('disabled', true);

            $('#heading3').children('.edit').css('display', 'none');
            $('#heading4').children('.edit').css('display', 'none');
        });



    });

    $(document).ready(function () {
        var bag = 1, perGram = 333, perBagPrice, coffeeCup = 21, per_coffee_cup = 98;
        $('#coffee_cup').html(coffeeCup);
        $('#per_gram').html(perGram + 'g');
        perBagPrice = $('#default_price').text();

        $('#default_price').html(perBagPrice);
        $('.bagQty3').html("0/" + bag + " Bag Added");
        $('#bag').on('change', function () {
            var bagValue = $(this).val();
            var perGramValue = (perGram) * (bagValue);
            var perCoffeeCupValue = (coffeeCup) * (bagValue);
            $('#coffee_cup').html(perCoffeeCupValue);
//            gram total
            if (perGramValue >= 1000) {
                $('#per_gram').html(perGramValue / 1000 + 'kg');
            } else {
                $('#per_gram').html(perGramValue + 'g');
            }
//            end gram total
            if (bagValue <= 5) {
                var TotalPrice = perBagPrice - (bagValue - 1);
                $('#default_price').html(TotalPrice.toFixed(2));

                var coffee_per_cent = TotalPrice / coffeeCup;
                var perCent = coffee_per_cent.toFixed(2);
                var perCent1 = perCent.toString().split(".")[1];
                var perCent2 = perCent;
                if (TotalPrice > 20.50) {
                    $('#per_coffee_cup').html(perCent2);
                    $('#cent').text('Dollar');
                } else {
                    $('#per_coffee_cup').html(perCent1);
                    $('#cent').text('Cents');
                }
            }

            $('.bagQty3').html("0/" + bagValue + " Bag Added");

        });
    });

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    $('#blogCarousel').carousel({
        interval: 4000
    });
    $('#blogCarouse2').carousel({
        interval: 5000
    });
    $('#blogCarouse3').carousel({
        interval: 7000
    });


//    button script

    $(document).ready(function () {
        var items = {};
        var total = 0;

        $('#bag').on('change', function () {
            var bagValue = $(this).val();
            $(".bagQty3").prop('disabled', true);
            items = {};
            var html_content = '';
            $('.checkout').html(html_content);
            $('.sub__total').text('0');

            var $this = $('.add-bag');
            $this.prop('id', 'show_button');
debugger;
//            var $EditFliter = $('.edit-filter');
//            $EditFliter.prop('id', 'show_filter');

//            var $EditMerch = $('.edit-merch');
//            $EditMerch.prop('id', 'show_merch');

//            var $EditEquip = $('.edit-equip');
//            $EditEquip.prop('id', 'show_equipments');
            var hide = '<button type="button" class="button button--muted button--full" id="hide_button" style="display: block;height: 50px;padding: 0px 0px 0px 0px;">Add Bag</button>';
            $this.html(hide);
            debugger;
//            $EditFliter.html(hide);
//            $EditMerch.html(hide);
//            $EditEquip.html(hide);


        });

        $('.bagQty').click(function () {
            items = {};
            var html_content = '';
            $('.checkout').html(html_content);
            $('.sub__total').text('0');

            var $this = $('.add-bag');
            $this.prop('id', 'show_button');
            var hide = '<button type="button" class="button button--muted button--full" id="hide_button" style="display: block;height: 50px;padding: 0px 0px 0px 0px;">Add Bag</button>';
            $this.html(hide);
        });



        $(document).on('click', '#show_button', function () {
            var productData = {};
            var data = '<div class="input-group" > <span class="input-group-btn"> <button type="button" id="subs" class="btn  btn-number" data-type="minus" data-field="quant"> <span class="glyphicon glyphicon-minus"></span> </button> </span> <input type="button" name="noOfcoffee" id="noOfcoffee" class="form-control input-number" value="1" min="1" max="100"> <span class="input-group-btn"> <button type="button" id="adds" class="btn btn-number" data-type="plus" data-field="quant"> <span class="glyphicon glyphicon-plus"></span> </button> </span></div>';
            var $this = $(this);


            $this.prop('id', 'hide_button');

            var coffeeName = $(this).parents('.card').find('h6, .flat_bottom').text();
            var coffeeImage = $(this).parents('.card').find('img').attr("src");

            var strikePrice = $('.alt_accent').html();
            var def_Price = $('#default_price').html();

            var perMonthBag = $('#bag').val();
            var DivId = $(this).attr("data-coffee-id");



            $this.html(data);

            var html_content = '<tr id=coffeetr' + DivId + '>\n\
        <td class="td--flat" style="width: 15%;">\n\
        <picture>\n\
         <img  class="lazyloaded" src="' + coffeeImage + '">\n\
        </picture>\n\
    </td>\n\
        <td>\n\
            <strong class="coffee_name' + DivId + '">' + coffeeName + '</strong> <br> \n\
            <small>Cherry, brown sugar and cookie dough.</small>\n\
    </td>\n\
    <td>\n\
            <strong class="qty' + DivId + ' getCount">1</strong><br> \n\
            <small>Bag</small>\n\
    </td>\n\
    <td> \n\
            <strong><span class="alt_accent strike totalstrike' + DivId + '">' + strikePrice + '</span>$<span class="coffeeTotal' + DivId + '">' + def_Price + '</span></strong><br> \n\
            <small>↻ monthly total</small>\n\
    </td>\n\
</tr>';
            //<tr><td class="subTotal"><input type="text" name="subTotal" value="' + def_Price + '" /></td></tr>';
            $('.checkout').append(html_content);
            productData.id = DivId;
            productData.name = coffeeName;
            productData.price = def_Price;
            productData.qty = 1;
            productData.months = perMonthBag;
            productData.image = coffeeImage;

            items['coffeetr' + DivId + ''] = productData;

            var getTotal = $('.sub__total').html();
            $.each(items, function (element) {
                total = parseFloat(getTotal) + parseFloat(items[element].price);
                $('.sub__total').html(total.toFixed(2));
            });

            var sum = 0;
            $('tr .getCount').each(function () {
                sum += parseFloat($(this).text());
            });
            $('.bagQty3').html(sum + "/" + perMonthBag + " Bag Added");
            if (sum >= perMonthBag) {
                $('.bagQty3').html("Next Step");

                $(".bagQty3").prop("disabled", false);
            } else {
                $(".bagQty3").prop("disabled", true);
            }




        });


//        $(document).on('click', '#hide_button', function () {
//            var $this = $(this);
//            $this.prop('id', 'show_button');
//            var hide = '<button type="button" class="button button--muted button--full" id="hide_button" style="display: block;height: 50px;padding: 0px 0px 0px 0px;">Add Bag</button>';
//            $this.html(hide);
//        });

// increment decrement code-------------------------------------------------------->

        $(document).on('click', '#adds', function add() {

            var $coffee = $(this).parents('.input-group').find("#noOfcoffee");
            var a = $coffee.val();
            a++;

            $("#subs").prop("disabled", !a);
            $coffee.val(a);
            var buttonParentId = $(this).parents('button').attr("data-coffee-id");

            var trId = $('.checkout').find('tr .qty' + buttonParentId + '');
            trId.html(a);
            var bagCount = $('.checkout').find('tr .qty' + buttonParentId + '').html();

            var coffee_qty = $('.checkout').find('tr .qty' + buttonParentId + '').text();
//mycode
            var sum = 0;
            var perMonthBag = $('#bag').val();
            $('tr .getCount').each(function () {
                sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
            });
            $('.bagQty3').html(sum + "/" + perMonthBag + " Bag Added");
            if (sum >= perMonthBag) {
                $('.bagQty3').html("Next Step");
                $(".bagQty3").prop("disabled", false);
            } else {
                $(".bagQty3").prop("disabled", true);
            }

//end mycode

            var coffee_Price = $('#default_price').text();
            var coffeeTotal = coffee_Price * coffee_qty;
            $('.subTotal').val(coffeeTotal);

            var strikePrice = $('.alt_accent').html();
            var TotalStrikePrice = strikePrice * coffee_qty;
            $('.totalstrike').html(TotalStrikePrice);
            $('.checkout').find('tr .totalstrike' + buttonParentId + '').html(TotalStrikePrice.toFixed(2));

            $('.checkout').find('tr  .coffeeTotal' + buttonParentId + '').html(coffeeTotal.toFixed(2));

            $.each(items['coffeetr' + buttonParentId + ''], function () {
                var avc = items['coffeetr' + buttonParentId + ''];
                avc.qty = coffee_qty;
                avc.price = coffeeTotal.toFixed(2);

            });

            var getTotal = $('.sub__total').html();
            var mytotal = parseFloat(coffee_Price) + parseFloat(getTotal);
            $('.sub__total').text(mytotal.toFixed(2));



        });
        $("#subs").prop("disabled", !$("#noOfcoffee").val());

        $(document).on('click', '#subs', function subst() {

            var $coffee = $(this).parents('.input-group').find("#noOfcoffee");
            var b = $coffee.val();

            if (b > 1) {
                debugger;
                b--;
                $coffee.val(b);
                var buttonParentId = $(this).parents('button').attr("data-coffee-id");

                var trId = $('.checkout').find('tr .qty' + buttonParentId + '');
                trId.html(b);
                var coffee_qty = $('.checkout').find('tr .qty' + buttonParentId + '').text();
                var coffee_Price = $('#default_price').text();

                var coffeeTotal = coffee_Price * coffee_qty;

                var strikePrice = $('.alt_accent').html();
                var TotalStrikePrice = strikePrice * coffee_qty;

                var sum = 0;
                var perMonthBag = $('#bag').val();
                $('tr .getCount').each(function () {
                    sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                });
                $('.bagQty3').html(sum + "/" + perMonthBag + " Bag Added");
                if (sum >= perMonthBag) {
                    $('.bagQty3').html("Next Step");
                    $(".bagQty3").prop("disabled", false);
                } else {
                    $(".bagQty3").prop("disabled", true);
                }

                $('.checkout').find('tr .totalstrike' + buttonParentId + '').html(TotalStrikePrice.toFixed(2));

                $('.checkout').find('tr .coffeeTotal' + buttonParentId + '').html(coffeeTotal.toFixed(2));
                $.each(items['coffeetr' + buttonParentId + ''], function () {
                    var avc = items['coffeetr' + buttonParentId + ''];
                    avc.qty = coffee_qty;
                    avc.price = coffeeTotal.toFixed(2);

                });
                var getTotal = $('.sub__total').html();
                var mytotal = parseFloat(getTotal) - parseFloat(coffee_Price);
                $('.sub__total').text(mytotal.toFixed(2));

            } else if (b <= 1) {

//                $(this).parents('.input-group').parents('button').prop('id','show_button');
                var sum = 0;
                var perMonthBag = $('#bag').val();
                $('tr .getCount').each(function () {
                    sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                });
                $('.bagQty3').html(sum + "/" + perMonthBag + " Bag Added");
                if (sum > perMonthBag) {
                    $('.bagQty3').html("Next Step");
                    $(".bagQty3").prop("disabled", false);
                } else {
                    $(".bagQty3").prop("disabled", true);
                }
                debugger;
                var removeId1 = $(this).parents('.input-group').parents('button').attr('data-coffee-id');
                $('#coffeetr' + removeId1).remove();
                $(this).parents('.input-group').parents('button').empty();

//                mycode
                var coffee_Price = $('#default_price').text();
                var getTotal = $('.sub__total').html();
                var mytotal = parseFloat(getTotal) - parseFloat(coffee_Price);
                $('.sub__total').text(mytotal.toFixed(2));
//endmycode

                $('.removeItem' + removeId1).html('Add Bag');
                $('.removeItem' + removeId1).prop('id', 'show_button');

                var xarray = items;
                var proIndex = 'coffeetr' + removeId1;
                delete xarray[proIndex];

                $("#subs").prop("disabled", true);
            }
        });
// end increment decrement code---------------------------------------------------->










//Whole beans
        var grindData = {};
        $("input[type='radio']").click(function () {
            var grind = $(this).val();
            $('#SelectGrind').html(grind);
            grindData.name = grind;
            grindData.price = null;
            grindData.qty = '';
            grindData.image = null;
            grindData.months = null;
            items['grind'] = grindData;
        });

        $('.select_beans').click(function () {
            var whole_beans = $('#nav-home-tab').text();
            $('#SelectGrind').html(whole_beans);
            grindData.name = whole_beans;
            grindData.price = null;
            grindData.qty = 'Grind';
            grindData.image = null;
            grindData.months = null;
            items['grind'] = grindData;
        });






        $('#nav-home-tab').click(function () {
//            var whole_beans = $('#nav-home-tab').text();
            whole_beans = $(this).text();

            $('#SelectGrind').html(whole_beans);
            grindData.name = whole_beans;
            grindData.price = null;
            grindData.qty = '';
            grindData.image = null;
            grindData.months = null;
            items['grind'] = grindData;

        });
//end hole beans

//        $('#collapse5').click(function () {
//
//        });


        $('#post_checkout').click(function () {
            var ProductTotal = $('.sub__total').html();
            items['subTotal'] = ProductTotal;
            var allItems = items;

            $.ajax({
                url: "{{route('subscribe.post')}}",
                type: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: JSON.stringify(items),
                contentType: "application/json",
                success: function (data) {
                    console.log('subscription success');
                    window.location = data.url;
                },
                error: function (data) {
                    alert('Error');
                }
            });
        });
    });



</script>



@endsection