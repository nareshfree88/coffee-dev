@extends('layouts.user_layouts.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/user/profile/profile.css') }}" >

<main>
    <div class="container account-setting">
        <h2 class="title-h2">Welcome to your account! 😊</h2>

        <div class="row">
            @include('partials.profile-sidebar')
            <div class="col-sm-8">
                <div class="content-account">
                    <div class="padded white_back normal_bottom">
                        <h3 class="h3--alt">Account Information</h3>
                        <form class="undefined" id="user" method="post">
                            <label for="user_email"><strong>Email address</strong></label>
                            <input class="" name="email" id="user_email" type="text" value="{{$user->email}}"  step="">
                            <p id="errors"></p>
                            <label for="user_locale"><strong>Preferred Language</strong></label>
                            <div class="select_container">
                                <select class="" name="locale" id="user_locale">
                                    <option disabled=""></option><option value="en-US">English</option>
                                    <option value="fr-CA">Français</option>
                                </select>
                                <svg class="icon icon--divet" viewBox="0 0 12 8">
                                <polygon points="1.41 0 6 4.58 10.59 0 12 1.41 6 7.41 0 1.41"></polygon>
                                </svg>
                            </div>
                            <label for="user_password"><strong>New password (Optional)</strong></label>
                            <input class="" name="password" value="" id="user_password" type="password" autocomplete="new-password" step="">
                            <div class="normal_bottom">

                            </div><div><button class="button--full" id="reset" type="button">Save</button>
                            </div>
                        </form>
                    </div> 

                </div>
            </div>


        </div>
    </div>
</main>

<script>
    $(document).ready(function () {


        $('#reset').click(function () {
            var email = $('#user_email').val();
            var password = $('#user_password').val();

            $.ajax({
                url: "{{route('update.info')}}",
                type: "post",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function () {
                    $('#reset').text('Please Wait');

                },

                data: {email: email, password: password},
                success: function (data) {
                    console.log(data.message.errors);
                    $('#reset').text('Saved');
                    $('#reset').css('background-color', 'green');
                },
                error: function (xhr, status, error)
                {
                    $('#reset').text('Error');
                    $('#reset').css('background-color', 'red');
                    $.each(xhr.responseJSON.errors, function (key, item)
                    {
                        $("#errors").append("<li class='alert alert-danger'>" + item + "</li>")

                    });
                    location.reload();

                }

            });
        });


    });
</script>


@endsection