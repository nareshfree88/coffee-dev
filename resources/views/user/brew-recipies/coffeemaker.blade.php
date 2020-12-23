@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">Automatic Coffeemaker</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{url('public/user/assets/images/auto.png')}}">
			 <img src="{{url('public/user/assets/images/brew2.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>Automatic drip brewers are an electronic brewing method.</h2>
			 <p>Thermally-induced pressure pumps cold water from a separate compartment, through a spray-head over a ground coffee bed. It’s then filtered through paper or metal mesh into a pot. Throughout the 20th century many inventors and companies patented various version of automatic drip machines.<br>

           We love drip coffee with a paper filter. It produces a medium to full-bodied cup, and allows for complexity and clarity at the same time. Variation from manufacturer to manufacturer will impact temperature stability and the evenness of water dispersion. These two variables that can contribute to the balance of extraction.</p>
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
			<img src="{{url('public/user/assets/images/brew1.jpg')}}">
			</td><th class="td--left"><a class="underline brand" href="#">AeroPress</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew2.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Filters - AeroPress (350 pk)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Pour-Over Kettle Manual - Hario (1.2L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Temperature Control Pour-Over Kettle - Bonavita (1L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale AWS</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale with Timer - Hario</a></th></tr></tbody></table></div>
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
			 <p>Taste too thin or watery for your liking? Try grinding finer or extending the total infusion time. Taste too syrupy or bitter for you? Try grinding coarser or shortening the brew time.</p>
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
			  <img src="{{url('public/user/assets/images/aeropress-step1.jpg')}}">
			  <p>Measure 9.5 heaping tablespoons of whole beans and grind them to a consistency that’s slightly finer than Panko breadcrumbs.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{url('public/user/assets/images/a1.jpg')}}">
			  <p>Measure 750 ml of cold water and place in your coffeemaker’s receptacle.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{url('public/user/assets/images/a2.jpg')}}">
			  <p>Insert paper filter into brewer. Rinse paper filter with some water and empty rinse water from the pot.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{url('public/user/assets/images/a3.jpg')}}">
			  <p>Put ground coffee into the filter and flatten the coffee bed.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{url('public/user/assets/images/a4.jpg')}}">
			  <p>Press the 'on' button.</p>
			</div>
			</div>
			
		  </div>
		  </div>
		</section>


                @endsection