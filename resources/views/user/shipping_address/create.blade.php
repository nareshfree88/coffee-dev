<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/user/assets/style.css')}}">
        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <style>
            div#logo {
                margin: 34px 0 40px !important; 
                vertical-align: bottom;
                text-align: left;
                margin-right: 53px !important;
            }
            @media screen and (max-width: 768px){
                .custom-margin-left{
                    margin-left: 0px!important;
                }
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col" id="logo">
                    <a href="{{url('/')}}" >
                        <img src="{{asset('public/user/logo/Islands_cafe.png')}}" width="100px" />

                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <h3>{{__('customlang.shipping_info')}}</h3>
                        <div class="card-body p-0">
                            <!--<a href="{{ url('/user/shipping_address/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>-->
                            <br />
                            <br />

                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            {!! Form::open(['url' => '/shipping/store', 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off']) !!}

                            @include ('user.shipping_address.form', ['formMode' => 'create'])

                            {!! Form::close() !!}
                            @if(Session::has('subscribe'))

                            <a href="{{url('/coffee')}}" style="text-decoration:underline; display:none" ><i class="fa fa-angle-left" style="font-size:24px"></i> Return to cart</a>
                            @else
                            <a href="{{url('/coffee')}}" style="text-decoration:underline; display:block"><i class="fa fa-angle-left" style="font-size:24px"></i> Return to cart</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2 custom-margin-left" style="margin-left: 176px;">
                    <div class="card">
                        <div class="card-header"><h3>{{__('customlang.order_summary')}}</h3></div>
                        <div class="card-body">
                            <?php $subscribeStatus = Session::has('subscribe') ? Session::get('subscribe') : null; ?>
                            @if($subscribeStatus != null)
                            <div class="row">
                                <div class="col-md-9">Remove Subscription</div>
                                <div class="col-md-3">
                                    <a onclick="return confirm('Are you sure you want to delete this subscription');" href="{{route('delete.Trysubscription')}}">
                                        <i class="fa fa-trash-o" style="font-size:18px;color:red;padding: 11px;"></i>
                                    </a>
                                </div>
                            </div>
                            @endif


                            @if(Session::has('subscribe'))
                            <div class="row">

                                @foreach($subscribe as $key => $sub)

                                <!--$sub['name']-->
                                <div class="col-md-8"><p>{{($key =='grind')?'Coffee Type '. $sub['name']: $sub['name']}} x {{$sub['qty']}}</p></div>
                                <?php $price = ($sub['price'] == null) ? '' : number_format($sub['price'], 2); ?>
                                <div class="col-md-4">


                                    <p>${{$price}}</p>
                                </div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                @endforeach
                                <!--                                <div class="col-md-9">Remove Subscription</div>
                                              <div class="col-md-3"><a onclick="return confirm('Are you sure you want to delete this subscription');" href="{{route('delete.Trysubscription')}}"><i class="fa fa-trash-o" style="font-size:18px;color:red;padding: 11px;"></i></a></div>-->

                            </div>

                            @endif



                            @if(Session::has('cart'))

                            @if($totalPrice == 0)

                            @else
                            <div class="row">
                                @foreach($products as $Products)
                                <div class="col-md-6"><p>
                                        <?php
                                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                            echo $Products['item']['name'];
                                        } elseif (session()->get('locale') == 'fr') {
                                            echo $Products['item']['name_fr'];
                                        }
                                        ?>


                                        x {{$Products['qty']}}</p></div>

                                <div class="col-md-3">
                                    @php
                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                    $cad_price = number_format($Products['price'],2);
                                    @endphp

                                    <p>${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</p>
                                </div>
                                <div class="col-md-3"><a onclick="return confirm('Are you sure you want to delete this product');" href="{{ route('delete.item',['id'=>$Products['item']['id']]) }}"><i class="fa fa-trash-o" style="font-size:18px;color:red;padding: 11px;"></i></a></div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                @endforeach

                                <!--                                <div class="col-md-8 ">Sub Total</div>
                                                                <div class="col-md-4 ">${{$totalPrice}}</div>-->



                                <!--                                <div class="col-md-8 ">Sub Total</div>
                                                                <div class="col-md-4 ">${{number_format($totalPrice,2)}}</div>
                                                                <hr style="border-top: 1px solid#aeaeae;">-->
                            </div>
                            @endif
                            @endif

                            <!--gift-Subsciption-->
                            @if(Session::has('giftcart'))
                            @if($giftPrice == 0)

                            @else
                            <div class="row">
                                @foreach($gift as $subscription)

                                <div class="col-md-6"><p>{{$subscription['item']['name']}} x 1</p></div>
                                <div class="col-md-3">

                                    @php
                                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                    $cad_price = number_format($subscription['price'],2);
                                    @endphp




                                    <p>${{$usd_price? number_format($usd_price * $cad_price,2 ) :$cad_price}}</p>
                                </div>
                                <div class="col-md-3"><a onclick="return confirm('Are you sure you want to delete gift-subscription');" href="{{ route('delete.gift',['id'=>$subscription['item']['id']]) }}"><i class="fa fa-trash-o" style="font-size:18px;color:red;padding: 11px;"></i></a></div>

                                <div class="col-md-6 ">{{__('customlang.bag')}}</div>
                                <div class="col-md-3 ">{{$subscription['item']['quantity']}}</div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6 ">{{__('customlang.subscription_month')}} </div>
                                <div class="col-md-3 ">{{$subscription['item']['month']}}</div>
                                <div class="col-md-3"></div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                @endforeach

                                <div class="col-md-8 ">{{__('customlang.sub_total')}}</div>
                                @php
                                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                $cad_price = number_format($totalPrice+$giftPrice+ $subscriptionTotal,2);
                                @endphp
                                <div class="col-md-4 ">${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</div>
                                <hr style="border-top: 1px solid#aeaeae;">


                                <!--                                <div class="col-md-8 ">Total</div>
                                                                <div class="col-md-4 ">${{number_format($giftPrice,2)}}</div>
                                                                <hr style="border-top: 1px solid#aeaeae;">-->
                            </div>
                            @endif
                            @endif
                            <!--End gift-Subsciption-->
                            @if(Session::has('subscribe') || Session::has('giftcart'))
                            <div class="row" style="display:none">
                                <div class="col-md-8">Discount</div>
                                <div class="col-md-4" id="discountAmount-error">-</div>
                                <div class="col-md-12 " id="discount_link-error">
                                    <a onclick="applyDiscount()" id="apply_discount-error" style="display:flex;color: blue;cursor:pointer;" >Have a discount code? Enter it here < </a>
                                </div>
                                <div class="col-md-12" id="myDIV-error" style="display:none">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="discount" value="" id="discount-error"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" id="get_discount-error" class="button button--tight btn-xs" value="Ok">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-12" >
                                    <span id="response"></span></div>

                                <hr style="border-top: 1px solid#aeaeae;">
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-8">{{__('customlang.discount')}}</div>
                                <div class="col-md-4" id="discountAmount">-</div>
                                <div class="col-md-12 " id="discount_link">
                                    <a onclick="applyDiscount()" id="apply_discount" style="display:flex;color: blue;cursor:pointer;" >{{__('customlang.discount_desc')}} < </a>
                                </div>
                                <div class="col-md-12" id="myDIV" style="display:none">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="discount" value="" id="discount"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" id="get_discount" class="button button--tight btn-xs" value="Ok">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-12" >
                                    <span id="response"></span></div>

                                <hr style="border-top: 1px solid#aeaeae;">
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-8 ">{{__('customlang.shipping')}}</div>
                                <div class="col-md-4 ">-</div>
                                <hr style="border-top: 1px solid#aeaeae;">
                                <div class="col-md-8 ">{{__('customlang.taxes')}}</div>
                                <div class="col-md-4 ">-</div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8 "><h4>{{__('customlang.payment_due')}}</h4></div>
                                @php
                                if($subscriptionTotal !=0){
                                $subscriptionTotal=$subscriptionTotal;
                                }else{
                                $subscriptionTotal=0;
                                }

                                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                $cad_price = number_format($totalPrice + $giftPrice,2);
                                $finalPrice =    $usd_price? number_format($usd_price * $cad_price,2) :$cad_price;
                                $finalPrice += $subscriptionTotal;
                                @endphp
                                <div class="col-md-4 "><button class="btn btn-info">{{Session::get('curency_rate') !=0 ? 'USD':'CAD'}}</button><h4 id='carttotal'>${{number_format($finalPrice,2)}}
                                    </h4></div>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>

        <script>
            function applyDiscount() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            $(document).ready(function () {
                $('#get_discount').click(function () {
                    var discount = $('#discount').val();
                    $.ajax({
                        url: '{{route('get.discount')}}',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'post',
                        data: {discount: discount},
                        success: function (data) {
                            if (typeof data.coupan === 'undefined' || data.coupan === null) {
                                $('#response').html(data.error);
                                $('#response').css('color', 'red');
                            } else {
                                $('#response').html(data.msg);
                                $('#carttotal').html(data.grandTotal);
                                $('#discountAmount').html('$' + data.discountAmt);

                                $('#response').css('color', 'green');
                                document.getElementById("discount").disabled = true;
                                document.getElementById("myDIV").style.display = "none";
                                document.getElementById("discount_link").style.display = "none";
                            }
                        }
                    });

                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#country').on('change', function () {
                    var country = $(this).val();
                    if (country == 'united_states') {
                        $('#flat_rate').val(10);
                    } else {
                        $('#flat_rate').val(10);
                    }

                });
            });
        </script>

    </body>
</html>


