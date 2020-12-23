 <h1>Welcome To Islands.Cafe! 😊</h1>
    <h4>Hi {{ ucwords($data['name']) }},</h4>
   
    <h4>{{ucwords($data['sender'])}} has invites you to create account on Island cafe. Link:</h4> <a href="{{$data['url']}}" target="_blank">{{$data['url']}}</a>
    <h4>{{$data['message']}}</h4>
    
    <h4>Thanks.</h4>
    <h4>Regards: Islands Cafe</h4>
    <hr>