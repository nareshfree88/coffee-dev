@extends('layouts.user_layouts.main')

@section('content')
<main>
<div class="sub-grid">
    <div class="container">
        <div class="row" style="margin-top: 55px;">
            <div class="col-md-3">
                <div class="subone">
                    <h2>Subscribe for one day</h2>
                    <p>799.00/INR<br> Per Day</p>
                    <a href="{{url('subscribe-now/day')}}">Subscribe Now</a>

                </div>
            </div>

            <div class="col-md-3">
                <div class="subt">
                    <h2>Subscribe for Week</h2>
                    <p>5,597.00/INR<br> Per Week</p>
                    <a href="{{url('subscribe-now/week')}}">Subscribe Now</a>

                </div>
            </div>

            <div class="col-md-3">
                <div class="subone">
                    <h2>Subscribe for Month</h2>
                    <p>23,970.00/INR<br> Per Month</p>
                    <a href="{{url('subscribe-now/month')}}">Subscribe Now</a>

                </div>
            </div>

            <div class="col-md-3">
                <div class="subt">
                    <h2>Subscribe for one Year</h2>
                    <p>2,87,640.00/INR<br> Per year</p>
                    <a href="{{url('subscribe-now/year')}}">Subscribe Now</a>

                </div>
            </div>


        </div>
    </div>
</div>
    </main>
@endsection