@extends('layouts.user_layouts.main')



@section('content')
<section class="col-nav brew inner-pages">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="pro-in">
                    <a href="javascript:void(0)">
                        <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-4.jpg')}}">
                        <div class="content-b">
                            <h4>Aeropress</h4>
                            <span class="underline">Learn to brew</span>

                    </a>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pro-in">
                <a href="javascript:void(0)">
                    <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-10.jpg')}}">
                    <div class="content-b">
                        <h4>Automatic Coffeemaker</h4>
                        <span class="underline">Learn to brew</span>

                </a>


            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="pro-in">
            <a href="javascript:void(0)">
                <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-6.jpg')}}">
                <div class="content-b">
                    <h4>Chemex</h4>
                    <span class="underline">Learn to brew</span>

            </a>


        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="pro-in">
        <a href="javascript:void(0)">
            <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-8.jpg')}}">
            <div class="content-b">
                <h4>Cold Brew</h4>
                <span class="underline">Learn to brew</span>

        </a>


    </div>
</div>
</div>
<div class="col-md-4">
    <div class="pro-in">
        <a href="javascript:void(0)">
            <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-9.jpg')}}">
            <div class="content-b">
                <h4>Espresso</h4>
                <span class="underline">Learn to brew</span>
        </a>


    </div>
</div>
</div>


<div class="col-md-4">
    <div class="pro-in">
        <a href="javascript:void(0)" > 
            <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-5.jpg')}}"/>
            <div class="content-b">
                <h4>Frenchpress</h4>
                <span class="underline">Learn to brew</span>
        </a>
    </div>
</div>
</div>
<div class="col-md-4">
    <div class="pro-in">
        <a href="javascript:void(0)"> 
            <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-11.jpg')}}">
            <div class="content-b">
                <h4>V60</h4>
                <span class="underline">Learn to brew</span>
        </a>
    </div>
</div>
</div>
<div class="col-md-4">
    <div class="pro-in">
        <a href="javascript:void(0)"> 
            <img src="{{asset('public/user/assets/brewing/brew-method/IslandsCafe-7.jpg')}}">
            <div class="content-b">
                <h4>Siphon</h4>
                <span class="underline">Learn to brew</span>
        </a>
    </div>
</div>
</div>





</div>

</div>
</section>		

<section class="recipe">
    <div class="container">

        <div class="row">
            <div class="col-md-4 brew-l">
                <h2>Brew Recipes</h2>
            </div>
            <div class="col-md-4">
                <p>Manipulating the following variables will affect your end cup no matter what brew method you use. Depending on your equipment at home, some of these variables may be automatized or fixed already.</p>
            </div>
            <div class="col-md-4">
                <p>Like any experiment, it’s best to only change one variable at a time and fix the other variables. Play with the different variables below to get more or less extracted into your cup, or to the desired flavours that you want to taste.</p>
            </div>
        </div>
        <hr class="hr--thick">
        <div class="row">
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Water:</h6><p>What minerals and compounds are in it will impact what coffee compounds bind to the water and extract, and at what rate. We recommend using filtered water if possible to prevent chlorine or other undesirable flavours from impacting the final cup.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Grind size:</h6><p>A fine grind will cause coffee to extract at higher rates and a coarser grind will extract at slower rates.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Grind quality:</h6><p>An even particle size of ground coffee promotes a more even extraction. Like chopping an onion into wildly different sized chunks will cook at different rates on a frying pan, ground coffee particles in a coffee bed being brewed will extract at different rates. We recommend using burr grinders. They grind coffee into more consistent particles than propeller/blade grinders.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Temperature:</h6><p>We use brewing water that is 95 degrees celcius or 203 degrees fahrenheit. A simple trick if you don't have a thermometer to measure your brew water is to pull your kettle off boil and wait 8 seconds before you use this water.</p></div>
            </div>
        </div>
        <div class="row padding-row">
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Equipment:</h6><p>Keeping your brewing equipment clean will preserve the flavour.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Agitation:</h6><p>High pressure like the kind produced by an espresso machine, or stirring your coffee slurry if using a pour-over method, will accelerate extraction.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Time:</h6><p>Ground coffee in contact with hot water for a longer period of time will accelerate extraction. A shorter time will decrease and shorten extraction. Think of a tea bag, and how when you let it sit in your mug for a long time, it gets too strong. It’s the same with coffee.</p></div>
            </div>
            <div class="col-md-3">
                <div class="padded border-in" style="margin:-1px"><h6 class="colored">Dose:</h6><p>Different brew methods require different ranges of coffee used to brewing water used. Generally, filter coffee methods are a 1:15-1:16 ratio of coffee to water, and espresso is 1:2.</p></div>
            </div>
        </div>
    </div>
</section>
<!--<section class="subscribe-div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="forn-in">
                    <h2>Keep in touch!</h2>
                    <p>We share coffee stories, home brew tips, product launches, events and promos.</p>
                    <form method="POST" action="https://manage.kmail-lists.com/subscriptions/subscribe?a=NMnKW7&amp;g=LNwB4K" target="_blank"><input type="email" name="email" placeholder="Enter your email"><button class="button--full" type="submit">Submit</button></form>
                </div>
            </div>
        </div>
    </div>
</section>-->
@endsection