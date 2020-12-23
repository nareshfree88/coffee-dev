@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">Chemex</h1
			 <div class="r-img">
			 <img class="adiv" src="{{asset('public/user/assets/images/ch.png')}}">
			 <img src="{{asset('public/user/assets/images/brew3.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>The Chemex is a beautiful and iconic brewer.</h2>
			It’s a pourover brewing method. Water passes manually through the coffee bed and filtered through paper.<br>

             German chemist Peter J. Schlumbohm, holder of over 3000 patents, invented the Chemex in 1941. The chemex is made with heat-proof borosilicate glass.<br>
             
             The chemex filter is very thick, resulting in a cup that is very clean, aromatic and delicate. It will feel almost tea-like in the mouth. We like this brewer because it makes multiple cups at a time. Look out for the thick filter stalling your drip flow and over-extracting. We generally recommend a coarser grind, similar to french press. Don’t be afraid to lift up the filter with your fingers at the end to help the water pass through the coffee bed.
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
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td> A Grinder</td></tr><tr><td> Tablespoon or scale</td></tr><tr><td> Measuring cup or scale</td></tr><tr><td> Automatic coffeemaker</td></tr></tbody></table></div>
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
			 <p>This brew should take between 4:30 to 5 minutes total. Brewed too fast? Try grinding slightly finer next time or pouring slower. Brewed too slow? Try grinding coarser or speeding up your pour.</p>
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
			  <p>Measure 750 ml of water and bring it to a boil.
Measure 9.5 heaping tablespoons of whole beans and grind them to the consistency of breadcrumbs.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{asset('public/user/assets/images/c1.jpg')}}">
			  <p>Insert paper filter into brewer with the thicker (double fold) side against the spout. Rinse paper filter with some water and empty rinse water from the Chemex.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{asset('public/user/assets/images/c2.jpg')}}">
			  <p>Put ground coffee into the filter and flatten the coffee bed.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{asset('public/user/assets/images/c3.jpg')}}">
			  <p>Pre-infuse. Start timer counting up. Slowly pour about 1/3 of your brew water, just off boil, to coat the coffee. Wait until timer reaches 0:45 seconds.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/c4.jpg')}}">
			  <p>Second pour. At 0:45 secs, pour another 1/3 of water in slow concentric circles, making sure to coat the entire coffee be evenly. No crust should form, and coffee be should be a uniform colour. Pour until you reach 2:30 mins.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/c5.jpg')}}">
			  <p>Final pour. Allow the coffee to draw down a bit with gravity before emptying the rest of your brew water. Enjoy.
			</div>
		  </div>
		  </div>
		</section>

@endsection