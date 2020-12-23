@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">French Press</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{asset('public/user/assets/images/brew6.jpg')}}">
			 <img src="{{asset('public/user/assets/images/brew6.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>French press is a full immersion brew method.</h2>
			That means ground coffee infuses in the same receptacle as the water. The technology of the French Press method dates back to the 1800’s in France, where a metalsmith and merchant patented a device for “filtering coffee by means of a piston.” This came to be known as the cafetière britain. In 1929, an Italian designer named Attilio Calimani patented a version with a seal around the plunger disks to keep them flush with the receptacle, and make plunging more efficient.<br>

            This design spread and introduced further iterations of the patent adopted by different brands across Europe and North America. We like this method for its rich design history, it’s simplicity, and that it leads to slightly more forgiving and balanced extractions without much thought. It’s easy. The metal filter lets heavier solubles and oils into the cup, yielding more texture and a full body, but reducing some of the nuance and flavour clarity you can yield from a paper brew method. Be careful to decant your french press when you have completed your brew - the coffee particles still in contact with water could continue to extract, causing bitterness in the cup.
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
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td>A grinder </td></tr><tr><td> Tablespoon or scale</td></tr><tr><td> A kettle</td></tr><tr><td> Measuring cup or scale</td></tr><tr><td> French-Press</td></tr><tr><td> Timer</td></tr></tbody></table></div>
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
			  <img src="{{asset('public/user/assets/images/aeropress-step1.jpg')}}">
			  <p>Measure 500 ml of water, put it in the kettle and bring it to a boil.
                Measure 8 heaping tablespoons of whole beans and grind them to the consistency of raw sugar.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{asset('public/user/assets/images/fp1.jpg')}}">
			  <p>Put ground coffee into the base of the french press.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{asset('public/user/assets/images/fp2.jpg')}}">
			  <p>Pre-infuse. Start a timer counting up. Pour in about half of your brew water, just off boil, to coat the coffee bed. Place the lid on top without pressing the plunger down. Count up to 2:30 mins.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{asset('public/user/assets/images/fp3.jpg')}}">
			  <p>Complete the pour. At 2:30 minutes, pour the rest of water continuously until all brew water has been used. Stir the coffee bed North, South, East and West, with one stroke in each direction.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/fp4.jpg')}}">
			  <p>Place plunger on top of receptacle and wait until counter reaches 5:00 minutes. Plunge slowly (about 15-20 seconds)</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{asset('public/user/assets/images/fp5.jpg')}}">
			  <p>Decant into mugs or another receptacle, or your coffee will keep brewing. Enjoy</p>
			</div>
			</div>
	
		  </div>
		</section>

@endsection