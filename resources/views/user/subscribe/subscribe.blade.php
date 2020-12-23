<!DOCTYPE html>

<html >
    <head>
        <title>{{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('public/user/assets/stripe.css')}}">
        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>
    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;}
        </style>
        <body>




            <div class="container-fluid">
            <div class="row">
                <div class="col" id="logo">
                    <a href="{{url('/')}}" style="margin-right:1079px">
                        <img src="{{asset('public/user/logo/Islands_cafe.png')}}" width="8%" />

                    </a>
                </div>    
            </div>


            <div class="form-row row">
                <div class="col-md-5 col-md-offset-1">


                    <!--stripe payment code-->
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Payment Details</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
                            </div>                    
                        </div>
                        <div class="stripe-errors"></div>
                        <div class="stripe-success"></div>

                        <div class="panel panel-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input id="fname" type="text" class="form-control" name="fname" value="<?php echo $address ? $address->first_name : '' ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="lname" type="text" class="form-control" name="lname" value="<?php echo $address ? $address->last_name : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" id="address"><?php echo $address ? $address->address : '' ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>city</label>
                                    <input id="city" type="text" class="form-control" name="city" value="<?php echo $address ? $address->city : '' ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input id="state" type="text" class="form-control" name="state" value="<?php echo $address ? $address->state : '' ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control"name="country" id="country">
                                        <option value="canada" <?php if (isset($address)) : $address->country == 'canada' ? 'selected' : '';
endif; ?> >Canada</option>
                                        <option value="united_state" <?php if (isset($address)) : $address->country == 'united_state' ? 'selected' : '';
endif; ?>>United State</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postal code</label>
                                    <input id="post_code" type="text" class="form-control" name="post_code" value="<?php echo $address ? $address->post_code : '' ?>">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subscription Plan</label>
                                    <select class="form-control" id="subscription-plan">
                                        @foreach($plans as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Card Holder Name</label>
                                    <input id="card-holder-name" type="text" class="form-control" name="card-holder-name">
                                </div>
                            </div>



                            <!-- Stripe Elements Placeholder -->
                            <div class="col-md-12">
                                <div id="card-element"></div>
                            </div>

                            <div class="col-md-12">
                                <button id="card-button"  class="subscribe btn btn success" data-secret="{{ $intent->client_secret }}">
                                    Subscribe Now
                                </button>
                            </div>

                        </div>

                    </div>        
                    <!--end stripe payment code-->
                </div>
            </div>
        </div>
    </body>
    <script src="https://js.stripe.com/v3/"></script>
 <script>
const stripe = Stripe('{{env('STRIPE_KEY')}}');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const plan = document.getElementById('subscription-plan').value;



const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

cardButton.addEventListener('click', async (e) => {
    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const country = document.getElementById('country').value;
    const post_code = document.getElementById('post_code').value;
    const {setupIntent, error} = await stripe.handleCardSetup(
            clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: {name: cardHolderName.value}
                }
            }
    );

    if (error) {
        // Display "error.message" to the user...
        console.log(error.message);
    } else {
        $.ajax({
            url: "{{route('subscribe.now')}}",
            type: "post",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                payment_method: setupIntent.payment_method,
                plan: plan,
                fname: fname,
                lname: lname,
                address: address,
                city: city,
                state: state,
                country: country,
                post_code: post_code,
            },

            success: function (res) {

                $('.stripe-success').text(res.message);
                window.location = res.url;
            },
            error: function (error) {

            },
        });
    }
});

    </script>
</html>