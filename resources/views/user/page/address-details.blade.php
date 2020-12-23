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

                    <div class="col col--8of12 col--tablet_portrait--12of12">
                        <div><div class="padded white_back normal_bottom relative">
                                <div class="grid grid--spaced grid--middle normal_bottom">
                                    <h3 class="h3--alt"><strong>Address Book</strong></h3>
                                    <!--<div><button type="button" class="button button--small" style="margin-bottom: 14px;">+ Add new Address</button></div>-->
                                </div>
                                <table class="table--small_on_phone">
                                    <tbody>
                                        <tr>
                                            <td style="width: 75%;">
                                                <p style="font-size: 22px;">{{!empty($address->city)? $address->city :'No Address added yet.'}}<br>
                                                    {{!empty($address->address)? $address->address :''}}<br>
                                                    {{!empty($address->post_code)? $address->post_code: '' }}<br>
                                                    {{!empty($address->state)? $address->state: ''}}<br>
                                                    {{!empty($address->country)? $address->country: '' }}</p>
                                            </td>
                                            <td class="td--bottom">
                                                <div class="normal_bottom">
                                                    <!--<button type="button" class="button button--small" style="margin-left: 33px;">Edit</button></div>-->
                                                <!--<button type="button" class="button button--muted button--underline" disabled="">Delete</button>-->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</main>

@endsection