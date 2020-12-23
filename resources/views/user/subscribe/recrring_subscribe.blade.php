<!DOCTYPE html>
<html >
    <head>
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('public/user/assets/stripe.css')}}">
        <link rel="alternate shortcut icon" href="{{asset('public/user/logo/Islands_cafe.png')}}" type="image/png"/>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
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
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >{{__('customlang.payment_details')}}</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif

                            <form role="form" action="{{ route('recuring.post') }}" method="post" class="require-validation"data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf
                                <div class='form-row row'>
                                   
                                    
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>pack</label> 
                                        <input class='form-control'  type='text' value="{{$pack}}"  disabled="disabled"/>
                                        <input class='form-control'  type='hidden' value="{{$pack}}"  name="pack" />
                                    </div>
                               
                                    
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>Name</label> 
                                        <input class='form-control'  type='text'  name="fname">
                                    </div>
                                </div>
                               
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Email</label> 
                                        <input class='form-control'  type='text'  name="email">
                                    </div>
                                </div>
                                
                                

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Address</label> 
                                        <textarea name="address" class="form-control">  </textarea>
                                    </div>
                                </div>


                                <div class='form-row row'>
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>city</label> 
                                        <input class='form-control'  type='text'  name="city">
                                    </div>
                                    
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>State</label> 
                                        <input class='form-control'  type='text'  name="state">
                                    </div>
                                    
                                </div>
                               

                                <div class='form-row row'>
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>country</label> 
                                        <input class='form-control'  type='text'  name="country">
                                    </div>
                                    <div class='col-xs-6 form-group required'>
                                        <label class='control-label'>pincode</label> 
                                        <input class='form-control'  type='text'  name="country">
                                    </div>
                                </div>
                          
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
                                <button class="btn  btn-lg btn-block check" type="submit">Pay Now</button>
                            </form>
                        </div>
                    </div>        
                    <!--end stripe payment code-->

                </div></div></body>

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


    </script>
</html>