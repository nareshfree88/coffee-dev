    <h1>Welcome To Islands.Cafe! 😊</h1>
    <h4>Hi {{ ucwords(@$data['user']) }},</h4>
    <h4>You are subscribed for our gift-subscription please use the subscription code given below</h4>
    <h4>{{@$data['name']}} x 1</h4>
    <h4>Bag: {{@$data['quantity']}}</h4>
    <h4>Month: {{@$data['month']}}</h4>
    <h4>Total: ${{number_format(@$data['price'],2)}} </h4>
    <h4>your subscription code is: {{@$data['subscription_code']}}</h4>
    <h4>Thanks.</h4>
    <h4>Regards: Islands Cafe</h4>
    <hr>

