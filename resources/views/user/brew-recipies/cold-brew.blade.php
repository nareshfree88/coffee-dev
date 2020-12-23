@extends('layouts.user_layouts.main')

@section('content')
<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">Cold Brew</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{url('public/user/assets/images/brew4.jpg')}}">
			 <img src="{{url('public/user/assets/images/brew4.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>Though cold brew has recently become more popular, cold coffee has been around for centuries.</h2>
			Cold brew is simply the process of steeping ground coffee in cold water for an extended period of time to extract either a ready-to-drink or concentrated cold coffee product. Earliest documentation of this process traces back to the Netherlands and Japan in the 17th century. Likely, for the Dutch, it was a method developed to meet the demands of long voyages, pre-brewing coffee for reheating and consumption later. Cold brew was one of the first products we produced as a company, we still sell it in refillable 2L growlers in concentrate, or ready to drink on tap at our stores. We like to brew it as concentrate because it can be diluted with milk or water depending on how you or your house guests take their coffee. At our stores, we prepare a concentrate and brew about 200 liters at a time. Here is a modified version of our recipe that you can do in your own kitchen! We like it because it requires minimal preparation time for a large quantity of brew that keeps for several weeks in your fridge.
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
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td>A paper filter </td></tr><tr><td> A Grinder</td></tr><tr><td> Tablespoon or scale</td></tr><tr><td> A 1L receptacle</td></tr><tr><td> Measuring cup or scale</td></tr><tr><td> A sieve</td></tr></tbody></table></div>
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
			 <p>If your coffee tastes acidic or lacks sweetness, consider brewing a longer amount of time (up to 24 hours), or pre-infusing with a third of your brew water being hot, and adding the rest cold. If it's bitter, brew shorter (down to 8 hours). For best results consume within 20 days. As if it will last that long.<br>

             If you have a French Press, try this recipe using the French Press as a receptacle. You can skip the filtration step and choose to filter through a sieve and paper filter for a cleaner end product.</p>
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
			  <p>Grind 20 tablespoons of coffee to the consistency of breadcrumbs.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{url('public/user/assets/images/cb-1.jpg')}}">
			  <p>Place ground coffee in a 1L mason jar or pitcher</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{url('public/user/assets/images/cb-2.jpg')}}">
			  <p>Introduce cold water and stir to coat all of the grinds evenly.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{url('public/user/assets/images/cb-3.jpg')}}">
			  <p>Cover to prevent fridge aromas from being absorbed into the coffee. Let it infuse for 16 hours.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{url('public/user/assets/images/cb-4.jpg')}}">
			  <p>At 16 hours, line a sieve with a paper filter, and rinse the paper filter with some water.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 6</h2>
			  <img src="{{url('public/user/assets/images/cb-5.jpg')}}">
			  <p>Pour the cold infused coffee through the paper filter into another resealable receptacle. Do your best to filter out the grinds when you're done. You now have a cold brew concentrate.</p>
			</div>
		  </div>
		  <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 7</h2>
			  <img src="{{url('public/user/assets/images/brew4.jpg')}}">
			  <p>To serve, use one portion of concentrate to one portion of water, milk, or milk alternative. Serve in a cup with ice.</p>
			</div>
		  </div>
		  </div>
		</section>
@endsection