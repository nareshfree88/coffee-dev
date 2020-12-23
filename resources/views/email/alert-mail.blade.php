<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{config('app.name')}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .check-icon{
                width: 47px;
                margin-bottom: 15px;
            }
            .actice-status{
                font-size:27px;
            }
        </style>
    </head>
    <body>

        <div class="container">
<h4>Hi &nbsp; &nbsp;{{ ucwords(@$data['email']) }},</h4>
            <center>
                <span><img src = "{{asset('user/assets/images/check.png')}}" class = "check-icon" /> &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <span class = "actice-status"><b>Subscription Alert</b></span></span><h5>your subscription is ending in {{$data['days']}} days. Please maintain balance in your Account for re-active subscription</h5></br>
            </center>      
            

            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Plan</th>
                            <th scope="col"></th>
                            <th scope="col">1 Month Pack</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col"><b>start Date</b></td>
                            <td></td>
                            <td scope="col"><b>{{date('d-M-Y',$data['started_at'])}}</b></td>
                        </tr>
                        <tr>
                        <tr>
                            <td scope="col"><b>End Date</b></td>
                            <td></td>
                            <td scope="col"><b>{{date('d-M-Y',$data['ended_at'])}}</b></td>
                        </tr>
                        <tr>

                            <td scope="col"><b>Account</b></td>
                            <td></td>
                            <td scope="col"><b>{{$data['email']}}</b></td>
                        </tr>
                        <tr>

                            <td scope="col"><b>Subscription ID</b></td>
                            <td></td>
                            <td scope="col"><b>{{$data['subscription_id']}}</b></td>
                        </tr>
                        <!--<tr>-->

<!--                <td scope="col"><b>Total</b></td>
                <td></td>
                <td scope="col"><b></b></td>-->
                        <!--</tr>-->

                    </tbody>
                </table>
            </div>

            <hr>
        </div>

    </body>
</html>








