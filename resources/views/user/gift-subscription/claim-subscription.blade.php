@extends('layouts.user_layouts.main')


@section('content')


<section class="inner-pages claim">
    <div class="gift-in">
        <div class="container" style="margin-top: 54px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero__text">
                        <h1>Claim Gift Subscription</h1>
                        @if(Session::has('message'))
                        <h2>{{ Session::get('message')}}</h2>
                        @endif
                        <p>If you've received a code from a friend, enter it here and you'll be able to enter your subscription details.</p>
                        <form id="claim" action="" method="post">
                            <label for="claim_code">Gift Code</label>
                            <input class="" name="code" id="claim_code" placeholder="xxxx-xxxx-xxxx" type="text" required="" step=""><div class="normal_bottom"><label for="grind">Optionally request a grind</label>
                                <input type="radio" name="grind" id="claim_grind_whole" value="whole"><label for="claim_grind_whole"><div class="grid grid--spaced grid--middle"><span>Whole Beans</span><span style="width: 60px;"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_espresso" value="espresso"><label for="claim_grind_espresso"><div class="grid grid--spaced grid--middle"><span>Espresso<small> – very fine</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/espressocup-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_stovetop" value="stovetop"><label for="claim_grind_stovetop"><div class="grid grid--spaced grid--middle"><span>Stovetop<small> – fine</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/stovetop-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_aeropress" value="aeropress"><label for="claim_grind_aeropress"><div class="grid grid--spaced grid--middle"><span>Aeropress<small> – medium-fine</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/aeropress-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_v60" value="v60"><label for="claim_grind_v60"><div class="grid grid--spaced grid--middle"><span>V60 / Pour Over<small> – medium</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/v60-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_frenchpress" value="frenchpress"><label for="claim_grind_frenchpress"><div class="grid grid--spaced grid--middle"><span>French Press<small> – medium-coarse</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/frenchpress-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_chemex" value="chemex"><label for="claim_grind_chemex"><div class="grid grid--spaced grid--middle"><span>Chemex<small> – coarse</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/chemex-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_autodrip" value="autodrip"><label for="claim_grind_autodrip"><div class="grid grid--spaced grid--middle"><span>Auto-Drip<small> – coarse</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/auto-drip-svg.png')}}"></span></div></label>
                                <input type="radio" name="grind" id="claim_grind_coldbrew" value="coldbrew"><label for="claim_grind_coldbrew"><div class="grid grid--spaced grid--middle"><span>Cold Brew<small> – coarse</small></span><span style="width: 60px;"><img class="img--center" src="{{asset('public/user/assets/brewing/cold-svg.png')}}"></span></div></label></div>
                            <button class="button--full" style="background-color: #f30808; display:none;"  id="error" type="button"></button>
                            <!--toast-->
                            <div class="toast">
                                <div class="toast-header">
                                    <strong class="mr-auto text-danger">Error</strong>
                                </div>
                                <div class="toast-body">
                                    <strong class="mr-auto text-danger">{{ucwords('please select grind')}}</strong>   
                                </div>
                            </div>
                            <!--end toast-->
                            <button class="button--full"  id="claim-subscription" type="button">Claim Subscription</button>
                        </form>

                    </div>
                </div>


            </div>


        </div>
    </div>
</div>
</section>

<section class="subscribe-div" id="shipping_address" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="forn-in">
                    
                    <form action="{{url('gift_claiming_address')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="request_grind" value="" id="request_grind"  required=""/>
                            <input type="hidden" name="sub_code" value="" id="sub_code"  required=""/>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" value="" placeholder="First Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="" placeholder="Last Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea  name="address" placeholder="Enter Your Address"></textarea>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country">
                                        <option value="">choose any</option>
                                        <option value="canada">Canada</option>
                                        <option value="united_state">United State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="state" value="" placeholder="Enter State" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>city</label>
                                    <input type="text" name="city" value="" placeholder="Enter City" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pin Code</label>
                                    <input type="text" name="pin_code" value="" placeholder="Enter City Pin Code" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>contact No</label>
                                    <input type="text" name="contact" value="" placeholder="Enter your contact No" required=""/>
                                </div>
                            </div>

                            <button class="button--full" type="submit">Submit</button>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {

        $('#claim-subscription').on('click', function () {
            var code = $('#claim_code').val();
            var grind = $('input[name="grind"]:checked').val();

            if (typeof grind === 'undefined') {
                $('.toast').toast('show', 2000);
            } else {

                $.ajax({
                    url: '{{route('clam.subscription')}}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {code: code},
                    success: function (data) {
                        if (data.error) {
                            document.getElementById("error").style.display = "block";
                            $('#error').text(data.error);
                            $('#error').fadeOut(3000);

                        } else {
                            var subscription = document.getElementById("error").style.display = "block";
                            document.getElementById("shipping_address").style.display = "block";
                            var subscription = document.getElementById("error").style.backgroundColor = "#1e7e34";

                            $('#request_grind').val(grind);
                            $('#sub_code').val(code);

                            $('#error').text(data.msg);
                            $('#error').fadeOut(3000);

                        }
                    }

                });

            }


        });

    });

</script>
@endsection