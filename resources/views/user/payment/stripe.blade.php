<!DOCTYPE html>
<html >
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('public/user/assets/stripe.css')}}">
        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            @media screen and (max-width: 768px){
                #logo{
                    padding-left: 15px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col" id="logo" style="text-align: left;">
                    <a href="{{url('/')}}">
                        <img src="{{asset('public/user/logo/Islands_cafe.png')}}" width="100px" />
                    </a>
                </div>    
            </div>

            <div class="form-row row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>{{__('customlang.shipping_info')}}</h4></div>
                        <div class="panel-body">
                            <p class="fnt">{{$getUser->email}}</p>
                            <p class="fnt">{{ ucwords($getUser->name) }}</p>
                            <p class="fnt">{{ ucwords($getAddress->address) }}</p>
                            <p class="fnt">{{ ucwords($getAddress->city) }}, {{ucwords($getAddress->state)}}, {{$getAddress->post_code}}</p>
                            <p class="fnt">{{ucwords($getAddress->country)}}</p>

                        </div>
                    </div>

                    <!--stripe payment code-->
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading "  >
                            <div class="row " >
                                <h3 class="panel-title" > &nbsp;&nbsp;&nbsp;{{__('customlang.payment_details')}}</h3>
                                <!--                                <div class="display-td" >                            
                                                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                                </div>-->
                            </div>                    
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                  data-cc-on-file="false"
                                  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                  id="payment-form">
                                @csrf
                                @if(Session::has('giftcart'))
                                @if(isset($gift))
                                @foreach($gift as $gift_susbcription)
                                @endforeach
                                @endif


                                <?php
                                $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($totalPrice + $giftPrice, 2);
                                if ($subscriptionTotal != 0) {
                                    $subscriptionTotal = $subscriptionTotal;
                                } else {
                                    $subscriptionTotal = 0;
                                }
                                $grandTotal = $allTotal + $getAddress->flat_rate + $subscriptionTotal;
                                ?>
                                @endif

                                <input type="hidden" id="" value="<?php if (isset($gift_susbcription['item']['name'])) echo $gift_susbcription['item']['name'] ?>" name="subscription_type"/>
                                <input type="hidden" id="" value="<?php if (isset($gift_susbcription['item']['price'])) echo $gift_susbcription['item']['price'] ?>" name="giftprice"/>
                                <!--<input type="hidden" id="" value="<?php //if (isset($subscription['item']['month'])) echo $subscription['item']['month']                                                        ?>" name="month"/>-->
                                <input type="hidden" id="" value="<?php if (isset($gift_susbcription['item']['quantity'])) echo $gift_susbcription['item']['quantity'] ?>" name="quantity"/>
                                <input type="hidden" id="" value="<?php if (isset($giftPrice)) echo $giftPrice; ?>" name="Sub_totalprice"/>
                                <input type="hidden" id="" value="<?php if (isset($totalPrice)) echo $totalPrice; ?>" name="product_total_price"/>
                                <input type="hidden" id="" value="<?php
                                if (isset($Products['item']['price'])) {
                                    echo $Products['item']['price'];
                                } else {
                                    echo '0';
                                }
                                ?>" name="price"/>
                                       <?php
                                       $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($totalPrice + $giftPrice, 2);

                                       $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                                       $cad_price = $allTotal + $getAddress->flat_rate;
                                       $grandTotal = $usd_price ? number_format($usd_price * $cad_price, 2) : $cad_price;
                                       $grandTotal += $subscriptionTotal;
                                       $Try_subscriptionAmt = $subscriptionTotal;
                                       ?>
                                <input type="hidden" name="flat_rate" value="<?php echo $getAddress->flat_rate; ?>" />
                                <input type="hidden" value="<?php echo $grandTotal ?>" name="total"/>
                                <input type="hidden" value="<?php echo $Try_subscriptionAmt ?>" name="subscriptionAmt"/>
                                <input type="hidden" value="" name="productId" />
                                <input type="hidden" value="{{Session::get('curency_rate') !=0 ? 'USD':'CAD'}}" name="currency" />
                                <input type="hidden" value="<?php if (isset($getUser->email)) echo $getUser->email ?>" name="email"/>
                                <input type="hidden" value="<?php if (isset($getAddress->address)) echo $getAddress->address ?>" name="address"/>
                                <input type="hidden" value="<?php if (isset($getAddress->city)) echo $getAddress->city ?>" name="city"/>
                                <input type="hidden" value="<?php if (isset($getAddress->state)) echo $getAddress->state ?>" name="state"/>
                                <input type="hidden" value="<?php if (isset($getAddress->post_code)) echo $getAddress->post_code ?>" name="post_code"/>
                                <input type="hidden" value="<?php if (isset($getAddress->country)) echo $getAddress->country ?>" name="country"/>


                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> 
                                        <input class='form-control' size='4' type='text'  name="name">
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVV</label> <input autocomplete='off'
                                                                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                                        type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php
                                        $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                                        $price_on_button = number_format($totalPrice + $giftPrice, 2);
                                        $get_price_on_button = $usd_price ? number_format($usd_price * $price_on_button, 2) : $price_on_button;

                                        $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($get_price_on_button, 2);
//                                        $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($totalPrice + $giftPrice, 2);

                                        if ($subscriptionTotal != 0) {
                                            $subscriptionTotal = $subscriptionTotal;
                                        } else {
                                            $subscriptionTotal = 0;
                                        }
                                        $trySubscription = session::has('subscribe') == true ? session::get('subscribe')['subTotal'] : 0;
                                        $cad_price = $allTotal + $getAddress->flat_rate + $trySubscription;
//                                        dd($cad_price);
//                                        $grandTotal = $usd_price ? number_format($usd_price * $cad_price, 2) : $cad_price;
//                                        dd($grandTotal);
//                                       dd($allTotal.'+'.$getAddress->flat_rate.'='.$cad_price.''.$grandTotal);
                                        ?>
                                        <button class="btn  btn-lg btn-block check" type="submit">{{__('customlang.pay_now')}}  ${{ number_format($cad_price,2)}}</button>
                                    </div>
                                    <!--Paypal code-->
                                    <div class="col-xs-12 text-center" style="margin-top: 20px">
                                        - OR -

                                    </div>

                                    <div class="col-xs-12 text-center" style="margin-top: 20px">
                                        <div id="paypal-button"></div>
                                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                                        <script>
paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'AbTWRbWnc9MoCicCPi2u-vljE5ORi7PZt4VtuMr1Jnx7fuJRUOz9nxCeQEcKQv-y-O9W-jbnLRaJpaxv',
        production: 'AbTWRbWnc9MoCicCPi2u-vljE5ORi7PZt4VtuMr1Jnx7fuJRUOz9nxCeQEcKQv-y-O9W-jbnLRaJpaxv'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'large',
        color: 'black',
        shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                    amount: {
                        total: '{{ $cad_price }}',
                        currency: "{{Session::get('curency_rate') !=0 ? 'USD':'CAD'}}"
                    }
                }]
        });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute().then(function () {
            // Show a confirmation message to the buyer
            var giftprice, quantity, Sub_totalprice, product_total_price,
                    product_total_price, price, flat_rate, total, productId,
                    currency, subscription_type, email, name, subscriptionAmt,
                    address, city, state, post_code, country;

            giftprice = $('input[name="giftprice"]').val();
            quantity = $('input[name="quantity"]').val();
            Sub_totalprice = $('input[name="Sub_totalprice"]').val();
            product_total_price = $('input[name="product_total_price"]').val();
            price = $('input[name="price"]').val();
            flat_rate = $('input[name="flat_rate"]').val();
            total = $('input[name="total"]').val();
            productId = $('input[name="productId"]').val();
            currency = $('input[name="currency"]').val();
            subscription_type = $('input[name="subscription_type"]').val();
            email = $('input[name="email"]').val();
            name = $('input[name="name"]').val();
            subscriptionAmt = $('input[name="subscriptionAmt"]').val();

            address = $('input[name="address"]').val();
            city = $('input[name="city"]').val();
            state = $('input[name="state"]').val();
            post_code = $('input[name="post_code"]').val();
            country = $('input[name="country"]').val();

            $.ajax({
                url: "{{ url('save-paypal-payment') }}",
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                data: {
                    params: data,
                    charge_id: data.paymentID,
                    giftprice: giftprice,
                    quantity: quantity,
                    Sub_totalprice: Sub_totalprice,
                    product_total_price: product_total_price,
                    price: price,
                    subscriptionAmt: subscriptionAmt,
                    flat_rate: flat_rate,
                    total: total,
                    productId: productId,
                    currency: currency,
                    subscription_type: subscription_type,
                    email: email,
                    name: name,
                    address: address,
                    city: city,
                    state: state,
                    post_code: post_code,
                    country: country
                },
                success: function (response) {
                    if (response.success == true) {
                        window.location = "{{ url('/order-success') }}";
                    }
                }
            })
            //window.alert('Thank you for your purchase!'); 
        });
    }
}, '#paypal-button');

                                        </script>
                                    </div>
                                    <!--End paypal code-->
                                </div>

                            </form>
                        </div>
                        <!----------------My New PayPal code------------------>

                        <!---------------End New PayPal code------------------>
                    </div>        
                    <!--end stripe payment code-->
                </div>
                <!--mycode-->
                <div class="col-md-5 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>{{__('customlang.order_summary')}}</h4></div>
                        <div class="panel-body">
                            @if(Session::has('subscribe'))
                            <?php $trySubscription = session::has('subscribe') == true ? session::get('subscribe')['subTotal'] : 0; ?>
                            <div class="form-row row">
                                @foreach($subscribe as $sub)
                                <div class="col-md-8"><p>{{$sub['name']}} x {{$sub['qty']}}</p></div>
                                <?php $price = ($sub['price'] == null) ? '' : number_format($sub['price'], 2); ?>
                                <div class="col-md-4">

                                    <p>${{$price}}</p>
                                </div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                @endforeach
                            </div>
                            @endif
                            @if(Session::has('cart'))
                            @if($totalPrice == 0)
                            @else
                            <div class="form-row row">
                                @foreach($products as $Products)
                                @php
                                $id[]= $Products['item']['id'];
                                @endphp

                                <div class="col-md-8"><label>
                                        <?php
                                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                            echo $Products['item']['name'];
                                        } elseif (session()->get('locale') == 'fr') {
                                            echo $Products['item']['name_fr'];
                                        }
                                        ?>

                                        x {{$Products['qty']}}</label></div>
                                <div class="col-md-4">
                                    @php
                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                    $cad_price = number_format($Products['price'],2);
                                    @endphp
                                    <p>${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</p>
                                </div>
                                @endforeach

                                @php
                                $product_id=implode(",",$id);
                                @endphp
                                <span id="productId" style="display:none">{{$product_id}}</span>
                                <!--<div class="col-md-12"><hr style="border-top: 1px solid#aeaeae;"></div>-->
                                <!--                                <div class="col-md-8 ">Sub Total</div>
                                                                <div class="col-md-4 ">${{$totalPrice}}</div>-->



                                <!--                                <div class="col-md-8 ">Sub Total</div>
                                                                <div class="col-md-4 ">${{number_format($totalPrice,2)}}</div>-->
                                <hr style="border-top: 1px solid#aeaeae;">
                            </div>
                            @endif
                            @endif
                            <!--gift-Subsciption-->
                            @if(Session::has('giftcart'))

                            @if($giftPrice == 0)
                            @else
                            <div class="form-row row">
                                @foreach($gift as $subscription)

                                <div class="col-md-8">

                                    <label>{{$subscription['item']['name']}} x 1</label></div>
                                <div class="col-md-4">
                                    @php
                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                    $gift_cad_price = number_format($subscription['price'],2);
                                    @endphp
                                    <p>${{$usd_price? number_format($usd_price * $gift_cad_price,2) :$gift_cad_price}}</p>
                                </div>
                                <div class="col-md-8 "><label>Beg</label></div>
                                <div class="col-md-4 ">{{$subscription['item']['quantity']}}</div>
                                <div class="col-md-8 "><label>Subscription Month</label></div>
                                <div class="col-md-4 ">{{$subscription['item']['month']}}</div>
                                <div class="col-md-12"></div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                @endforeach

                            </div>
                            @endif
                            @endif
                            <!--End gift-Subsciption-->
                            @if(Session::has('subscribe'))
                            <div class="form-row row" style="display: none">
                                <div class="col-md-12"><hr style="border-top: 1px solid#aeaeae;"></div>
                                <div class="col-md-8 "><label>Discount</label></div>
                                <div class="col-md-4 "></div>
                            </div>
                            @else
                            <div class="form-row row">
                                <!--<hr style="border-top: 1px solid#aeaeae;">-->
                                <div class="col-md-12"></div>
                                <div class="col-md-8 "><label>{{__('customlang.discount')}}</label></div>
                                <div class="col-md-4 ">{{Session::has('TotalDiscount')? '$'.number_format(Session::get('TotalDiscount'),2):'-'}}</div>
                                <div class="col-md-12"></div>
                                <hr style="border-top: 1px solid#aeaeae;">
                            </div>
                            @endif
                            <div class="form-row row">
                                <div class="col-md-8 "><label>Total</label></div>
                                @php
                                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                $cad_price = number_format($giftPrice + $totalPrice,2)+ $trySubscription;
                                @endphp
                                <div class="col-md-4 ">${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</div>
                            </div>
                            <div class="form-row row">
                                <hr style="border-top: 1px solid#aeaeae;">
                                <div class="col-md-12"></div>
                                <div class="col-md-8 "><label>{{__('customlang.shipping')}}</label></div>
                                <div class="col-md-4 ">{{ ($getAddress->flat_rate == 0)?'$0.00': '$'.number_format($getAddress->flat_rate,2) }}</div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                <div class="col-md-12"></div>
                                <div class="col-md-8 "><label>{{__('customlang.taxes')}}</label></div>
                                <div class="col-md-4 ">$0.00</div>
                                <div class="col-md-12"></div>
                                <hr style="border-top: 1px solid#aeaeae;">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-row row">
                                <div class="col-md-8 "><h4>{{__('customlang.payment_due')}}</h4></div>
                                <?php
                                $usd_price = Session::has('curency_rate') ? Session::get('curency_rate') : 0;
                                $xprice = number_format($totalPrice + $giftPrice, 2);
                                $Cad_xprice = $usd_price ? number_format($usd_price * $xprice, 2) : $xprice;
//                                $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($totalPrice + $giftPrice, 2);
                                $allTotal = Session::has('gTotal') ? number_format(Session::get('gTotal'), 2) : number_format($Cad_xprice, 2);
                                $grandTotal = $allTotal + $getAddress->flat_rate + number_format($trySubscription, 2);
                                $cad_price = $grandTotal;
                                $restTotal = $usd_price ? number_format($usd_price * $cad_price, 2) : $cad_price;
                                $restTotal += $subscriptionTotal;
//                                dd($allTotal . '+' . $getAddress->flat_rate . '=' . $grandTotal);
                                ?>
                                <div class="col-md-4 "><h4><button class="btn btn-default">{{Session::get('curency_rate') !=0 ? 'USD':'CAD'}}</button>{{number_format($grandTotal,2)}}</h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--endycode-->
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
$(function () {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function (e) {
        var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]', 'input[type=hidden]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function (i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});

$(document).ready(function () {
    var productId = $('#productId').html();
    $("input[name='productId']").val(productId);
});
    </script>
</html>