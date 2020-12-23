<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{config('app.name')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="jumbotron">
      <center> <h1>Payment Successful</h1>      
    <p>Thank-You For Shopping!</p></center>
  </div>
    <center><a href="{{url('coffee')}}" class="btn btn-primary">Return To Home Page</a></center>     
       
</div>

</body>
</html>
