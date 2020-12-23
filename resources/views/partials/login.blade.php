<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="regForm">
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2 class="small_bottom">{{__('customlang.login')}}</h2>
                            <!--<p>Login here</p>-->

                            <p>Sign in with your social media account</p>
                            <a href="{{url('login/google')}}" class="fa fa-google icons"></a>
                            <a href="{{url('login/facebook')}}" class="fa fa-facebook icons"></a>
                            <div class="seperator"><b>or</b></div>


                            <label for="login_email">{{ __('customlang.email') }}</label>
                            <input class=" @error('email') is-invalid @enderror" name="email" id="email"  placeholder="your.email@gmail.com" type="email" required="" step="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="login_password">{{ __('customlang.password') }}</label>
                            <input class=" @error('password') is-invalid @enderror" name="password" id="login_password" placeholder="********" type="password" required="" step=""><button class="button--full" type="submit">{{__('customlang.login')}}</button>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">{{__('customlang.dnt_have_ac')}} –</button>
                        </form>

                        <!--@if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password? Hey, it happens.') }}
                        </a>
                        @endif --> 

                        <button type="button" id="prevBtn1" onclick="nextPrev(+2)" class="g-div">{{__('custom.lang.forgot_password')}}.</button>
                        </form>
                    </div>
                    <div class="tab">
                        <form method="POST" id="signup">
                            @csrf
                            <h2 class="small_bottom">{{__('customlang.sign_up')}}</h2>
                            <p>{{__('customlang.signup_desc')}}</p>
                            <label for="name">{{ __('customlang.name') }}</label>
                            <input class="" name="name" id="signup_name" placeholder="Your Name" type="text" required="required" >

                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>

                            <label for="email">{{ __('customlang.email') }}</label>
                            <input class="" name="email" id="signup_email" placeholder="Your Email" type="email" required autocomplete="email" >

                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>

                            <label for="password">{{ __('customlang.password') }}</label>
                            <input class="" name="password" id="signup_password" placeholder="********" type="password" required="" autocomplete="new-password" step="">

                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>

                            <label for="password_confirmation">{{ __('customlang.c_password') }}</label>
                            <input class="" name="password_confirmation" id="signup_password" placeholder="********" type="password" required="" autocomplete="new-password" step="">
                            <button class="button--full" type="submit">{{__('customlang.sign_up')}}</button>



                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="g-div"> {{__('customlang.already_have_ac')}}</button>
                        </form>
                    </div>



                    <div class="tab">
                        <h2 class="small_bottom">Password Recovery</h2>
                        <p>If your account exists we'll send you an email with reset password instructions.</p>
                        <form method="POST" id="recover">
                            @csrf
                            <span class="alert-success fade" role="alert" id="recover_emailSuccess">
                            </span>
                            <span class="alert-danger fade" role="alert" id="recover_emailNotFound">
                            </span>

                            <label for="recover_email">Email address</label>
                            <input class="" name="email" id="recover_email" placeholder="your.email@gmail.com" type="email"   step="">

                            <button class="button--full" type="submit">Request Reset</button>
                        </form>
                        <hr>
                        <button type="button" class="" id="prevBtn2" onclick="nextPrev(-2)" class="g-div">Oh wait, I remember my login information</button>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:

        document.getElementById("prevBtn").style.display = "I already have an account";
        document.getElementById("nextBtn").innerHTML = "I don't yet have an account -";
        document.getElementById("prevBtn1").innerHTML = "Forgot your password? Hey, it happens.";
        document.getElementById("prevBtn2").innerHTML = "Oh wait, I remember my login information";

        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:

        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();


            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }


    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
<script>
    $(function () {
        $('#myModal').modal({
            show: true
        });
    });
</script>
@endif
@endsection

@section('scripts')
@parent

<script>
    $(function () {
        $('#signup').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();

            $(".invalid-feedback").children("strong").text("");
            $("#signup input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('register') }}",
                data: formData,
                success: () => window.location.assign("{{ route('home') }}"),
                error: (response) => {
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#signup_" + key).addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });

        $('#recover').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray(),
                    dataObj = {};

            $(formData).each(function (i, field) {
                dataObj[field.name] = field.value;
            });
            if (dataObj['email'] == "") {
                $("#recover_emailNotFound").text('The email field is required.');
                $("#recover_emailNotFound").removeClass("fade");
            } else {
                $(".invalid-feedback").children("strong").text("");
                $("#recover input").removeClass("is-invalid");
                $("#recover_emailSuccess").text("");
                $("#recover_emailNotFound").text("");

                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('emailToken') }}",
                    data: formData,
                    success: (response) => {
                        //alert(response);
                        if (response == "NOT_EXIST") {
                            $("#recover_emailNotFound").text('Customer Not Found!');
                            $("#recover_emailNotFound").removeClass("fade");
                        } else if (response == "SENT") {
                            $("#recover_emailSuccess").text('We have e-mailed your password reset link!');
                            $("#recover_emailSuccess").removeClass("fade");
                        } else {
                            $("#recover_emailNotFound").text('A Network Error occurred. Please try again!');
                            $("#recover_emailNotFound").removeClass("fade");
                        }
                    },
                    error: (response) => {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#recover_" + key).addClass("is-invalid");
                                $("#recover_" + key + "emailError").children("strong").text(errors[key][0]);
                            });
                        } else {
                            let errors = response.responseJSON.errors;// create an object with the key of the array
                            alert(errors);
                            //window.location.reload();
                        }
                    }
                });
            }

        });
    })
</script>
@endsection