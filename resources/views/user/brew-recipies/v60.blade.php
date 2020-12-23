@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">V60</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{asset('public/user/assets/images/brew7.jpg')}}">
			 <img src="{{asset('public/user/assets/images/brew7.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>The V60 Dripper gets its name from the 60-degree angle created by the cone’s shape.</h2>
			The Hario company, founded in Japan in 1921, invented the V60 in the 1950s. Previously they were specialized in heat-resistant glassware for scientific research purposes. Prototypes for the V60 began in the 1950s during the rise in demand for various home-brew filter machine designs and was released for commercial sale in different materials in the 1980s. In 2004 the design was revisited to add the signature ribs that lift the paper filter off the sides and a larger hole, both features provide a faster flow and more clarity in the cup. <br>

            V60 is a pour over method. That means water passes through the ground coffee bed by gravity. The paper filter is slightly thinner than that of a Chemex, yielding a little more body, yet letting through many complex aromatics and solubles. We appreciate this brewer’s simplicity and beauty, and it’s versatility to yield one or two cups. It requires an attentive and consistent pouring technique to ensure all the coffee grinds get coated evenly.
			
			  </div>
			</div>
		  </div>
		</section>
		<!------------------------------------------>
		<section class="brew_mid">
		<div class="container">
		   <div class="row">
		   <div class="col-md-2"></div>
		      <div class="col-md-4">
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td>V60 A grinder </td></tr><tr><td> A kettle</td></tr><tr><td> V60 filter</td></tr><tr><td> Tablespoon or scale</td></tr><tr><td>Measuring cup or scale</td></tr><tr><td> A coffee mug or decanter</td></tr><tr><td> Timer</td></tr></tbody></table></div>
			  </div>
			   <div class="col-md-4">
			<div class="normal_bottom"><h2>Available in our shop</h2><table class="table--thick"><tbody><tr><td class="td--thumbnail">
			<img src="{{asset('public/user/assets/images/brew1.jpg')}}">
			</td><th class="td--left"><a class="underline brand" href="#">AeroPress</a></th></tr><tr><td class="td--thumbnail"><img src="{{asset('public/user/assets/images/brew2.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Filters - AeroPress (350 pk)</a></th></tr><tr><td class="td--thumbnail"><img src="{{asset('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Pour-Over Kettle Manual - Hario (1.2L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{asset('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Temperature Control Pour-Over Kettle - Bonavita (1L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{asset('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale AWS</a></th></tr><tr><td class="td--thumbnail"><img src="{{asset('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale with Timer - Hario</a></th></tr></tbody></table></div>
			  </div>
			   <div class="col-md-2"></div>
			</div>
		  </div>
		</section>
		<!-------------------------------->
		<section class="brew-tips">
		<div class="container">
		   <div class="row">
		      <div class="col-md-12 brew-l">
			 <h2 class="text_center h2--giant">Quick Tips!</h2>
			 <p>This brew should have taken about 2:15-2:45 minutes total. Brewed too fast? Try grinding slightly finer next time or pouring slower. Brewed too slow? Try grinding coarser or speeding up your pour.</p>
			  </div>
			  
			</div>
		  </div>
		</section>
		<!-------------------------------->
		<section class="brew-steps" id="steps">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 1</h2>
			  <img src="{{asset('public/user/assets/images/aeropress-step1.jpg')}}">
			  <p>Measure 285 ml of water, put it in the kettle and bring it to a boil.
                Measure 3.5 tablespoons of whole beans and grind them to the consistency of raw sugar.  </p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{asset('public/user/assets/images/v1.jpg')}}">
			  <p>Assemble dripper on top of a mug or receptacle.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{asset('public/user/assets/images/v2.jpg')}}">
			  <p>Rinse paper filter, discard the rinse water from the receptacle.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{asset('public/user/assets/images/v3.jpg')}}">
			  <p>Put in ground coffee and level out grinds to flatten the bed of coffee.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/v4.jpg')}}">
			  <p>Start a timer counting up. Pour about 10 ml of water, just off boil, to coat the coffee bed. Watch it bubble for up to 30 seconds.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/v5.jpg')}}">
			  <p>Pour the rest of the water continuously until timer reaches 1:30 mins. Try to pour consistently and coat grinds evenly. The colour of the coffee bed should be uniform. Let gravity draw down your coffee, and enjoy!</p>
			</div>
			</div>
	
		  </div>
		</section>

@endsection