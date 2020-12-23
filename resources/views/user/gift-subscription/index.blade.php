@extends('layouts.user_layouts.main')




@section('content')

<section class="inner-pages gift-banner">
    <div class="gift-in">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="padded padded--tight">{{__('customlang.gift-claim')}}</span> <a class="gift-a" href="{{url('claim')}}">{{__('customlang.claim-subscription')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="equal-div gift-div">



    <div class="img-div">
        <div id="gift-s" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#gift-s" data-slide-to="0" class="active"></li>
                <li data-target="#gift-s" data-slide-to="1"></li>

            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{asset('public/user/assets/images/islands_product-1.png')}}">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('public/user/assets/images/islands_product-1.png')}}">
                </div>

            </div>


        </div>
    </div>

    <div class="text-divv gift-text">
        <h2>{{__('customlang.gift_subscription')}}</h2>
        <div class="medium_bottom">{{__('customlang.gift-subscription-description')}}
            <p><i>Prices:</i><br>
                <b>3 months: </b>$18.50 per 333g bag<br>
                <b>6 months: </b>$17.76 per 333g bag <b> (</b><i><b>4% off)</b></i><br>
                <b>9 months: </b>$17.02 per 333g bag <b>(8</b><i><b>% off)</b></i><br>
                <b>12 months: </b>$16.28 per 333g bag <b>(12</b><i><b>% off)</b></i><br>
            </p>
        </div>


        <form id="options">
            <div class="gift-select">
                <div class="g-div">
                    <label for="options_Months">Months</label>
                    <div class="select_container">
                        <select name="Months" id="options_months" class="options_months">
                            <option disabled=""></option>
                            <!--option  value="" selected>choose any</option-->
                            <option value="3" data-percent="100" selected>3</option>
                            <option value="6" data-percent="96" >6</option>
                            <option value="9" data-percent="92" >9</option>
                            <option value="12" data-percent="88" >12</option>
                        </select>
                        <svg class="icon icon--divet" viewBox="0 0 12 8">
                        <polygon points="1.41 0 6 4.58 10.59 0 12 1.41 6 7.41 0 1.41"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="g-div">
                    <label for="options_Bags">Bags</label>
                    <div class="select_container">
                        <select  name="Bags" class="bags" id="options_bags">
                            <option disabled=""></option>
                            <!--<option  value="" selected>choose any</option>-->
                            <option  value="1" selected >1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <svg class="icon icon--divet" viewBox="0 0 12 8">
                        <polygon points="1.41 0 6 4.58 10.59 0 12 1.41 6 7.41 0 1.41"></polygon>
                        </svg>
                    </div>
                </div>
            </div>
        </form>
        @if (Session::has('message'))
        <div class="openGift">{{ Session::get('message') }}</div>
        @endif
        <form id="add_to_cart" action="{{route('gift.subscription')}}" method="post">
            @csrf
            

            <input type="hidden" name="" class="bagValue" value="18.50" />
            <input type="hidden" id="month" name="month" class="" value="" />
            <input type="hidden" id="price" name="total" class="price" value="" />
            <input type="hidden" id="quantity" name="bag" class="quantity" value="" />
            <button class="button--full" id="subscriptionTotal" type="submit">Add to Cart / $00.00</button></form>
        <div class="small medium_top"><p><i>* Coffee beans shipped are Roaster's Choice. They will always be usable for filter coffee or espresso brew methods.<br>
                    * The recipient of a gift subscription will have the option to receive their coffee ground, or in whole bean format<br>
                    * Prices are inclusive of shipping in Canada, Shipping is additional to the us ($8 Flat Rate per monthly shipment)<br>
                    * Reach out to us at </i><a href="javascript:void(0)"><b><i><u>info@dispatchcoffee.ca</u></i></b></a><b><i> </i></b><i>if you have any questions at all!</i></p></div>
    </div>



</section>
<section class="gift-b">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><h2>Cup to Bag Conversion</h2><table class="table--thick"><tbody><tr><th>1 cup a day / household</th><td>2 bags / month</td></tr><tr><th>2 cups a day / household</th><td>3-4 bags / month</td></tr><tr><th>3 cups a day / household</th><td>5 bags / month</td></tr><tr><th>4 cups a day / household</th><td>7 bags / month</td></tr></tbody></table></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script>
    $(document).ready(function () {

        var month = 3, percent = 100, bag = 1, bagValue, total, finalPrice;
        subscriptionTotal(month, bag);
        $(".options_months").change(function () {

            month = $(this).val();
            if (month == 6) {
                percent = 96;
            } else if (month == 9) {
                percent = 92;
            } else if (month == 12) {
                percent = 88;
            }
//        alert(percent);
            subscriptionTotal(month, bag);
        });

        $(".bags").change(function () {
            bag = $(this).val();
            subscriptionTotal(month, bag);
        });
        function subscriptionTotal(month, bag) {
            bagValue = 18.50;

            total = bag * (bagValue * percent / 100) * month;
            finalPrice = (total * <?php 
                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                    $conversion_rate = ($usd_price?$usd_price : 1);
                    echo $conversion_rate;	
             ?>).toFixed(2);
            
            $('#price').val(total);
            $('#quantity').val(bag);
            $('#month').val(month);
//        console.log(total);
            $('#subscriptionTotal').html('Add to Cart / $' + finalPrice);
        }

//    $('#subscriptionTotal').click(function () {
//
//        $.ajax({
//            url: "{{route('gift.subscription')}}",
//            type: "post",
//            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//            data: {bag: bag, total: total},
//            success: function (data) {
//
//                if (data.cartValue.length != 0) {
//                    $.each(data.cartValue, function (i, clstr) {
//                        $.each(data.cartValue, function (i, clstr) {
//                            $('.cartWrap').html(' <li class="items odd"><hr style="border-top: 1px solid#aeaeae;"><div class="infoWrap"><div class="cartSection"><h4 class="p-title">' + clstr.item.name + '</h4><p class="p-price">' + clstr.item.price + ' x ' + clstr.item.quantity + '</p></div> </div></li>');
//                        });
//
//                        console.log(clstr.item.name);
//
//                    });
//                }
//
//
//            }
//        });
//
//    });


        var openGift = $('.openGift').text();
        console.log(openGift);
        if (openGift == 'openGift') {
            $('#myModal2').modal('show');
        }
    });
</script>



@endsection