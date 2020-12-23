@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">Cold Brew</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{url('public/user/assets/images/brew5.jpg')}}">
			 <img src="{{url('public/user/assets/images/brew5.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>For many coffee drinkers - espresso is coffee, but it is, in fact, just one brewing method.</h2>
			Espresso is the result of highly pressurized hot water (7-10 bars of atmospheric pressure compared to a fraction of 1 bar for an automatic coffee maker) passed through a finely ground coffee “puck”, tamped in a contained environment, and filtered through fine metal mesh holes. It produces a small and concentrated extraction, that can be the base of such drinks as Lattes and Cappuccinos. The creamy layer atop espresso is called crema, and is the result of emulsified coffee oils bound to tiny water bubbles from the pressurized brew.<br>

           This revolutionary brew method evolved in the 19th century during peak coffee consumption in Europe in hope of shortening the infusion time and make coffee brewing more productive. It claims its first patent by Angelo Moriondo in Turin in 1884.<br>

           The first manufactured espresso machine hits the 1906 World’s Fair in Milano via Luigi Bezzera and Desidero Pavoni. In our stores we use La Marzoccos, a 90 year old Italian heritage machine manufacturer who has innovated the espresso machine for decades and still today.<br>
 
           Though it shortens the brew time, espresso as a method is very volatile and requires extreme precision and calibration of multiple variables to get a consistent and balanced extraction. Older models may only fit 7-14 grams of coffee in their baskets, as these were developed when coffee was roasted darker, and was more soluble and easy to extract. Because our roasts are lighter to preserve the beans' natural sugars and aromas, our recipe is designed for modern espresso machines that have the capacity in portafilter baskets for 18-23 grams of finely ground coffee. When prepared right, we love espresso for its creamy mouthfeel, and the aromatic and flavour subtleties that can be extracted into a cup.<br>
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
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td>Tablespoon or scale </td></tr><tr><td> An espresso machine</td></tr><tr><td> An espresso grinder</td></tr></tbody></table></div>
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
			 <p>End weight of espresso in the cup : 36-40 grams/ml<br>

               Fix all your variables except the grind size. Try to achieve double the amount of coffee in your espresso cup within 28-38 seconds (example if you used 18g of coffee, aim for 36 g of yield in your espresso cup, with the yield achieved by 28-38 seconds) If you achieve your desired yield in less than 28 seconds, the shot is running to fast and you should fine your grind setting and retain the same dose of dry coffee and yield target. If you do not achieve your desired yield in under 38 seconds, you should coarsen your grind setting and retain the same dose of dry coffee and yield target.</p>
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
			  <img src="{{url('public/user/assets/images/Espresso1.jpg')}}">
			  <p>Your portafilter should be dry and hot when you begin. Make sure you have a timer on hand, a dry rag, a scale (optional - will provide you with a more consistent outcome), and a cup. Let your machine heat up.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{url('public/user/assets/images/Espresso4.jpg')}}">
			  <p>Grind your coffee to a fine espresso setting.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{url('public/user/assets/images/Espresso2.jpg')}}">
			  <p>Fill your portafilter with 18 grams of ground coffee. Before tamping, use your finger, extended and straight, to distribute the coffee as evenly as possible.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{url('public/user/assets/images/Espresso3.jpg')}}">
			  <p>Tamp your coffee. When tamping, it is important to tamp evenly and flat. To tamp evenly every time, press downward with even pressure, and do not twist your tamper when you're done. Lock your portafilter into your machine.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{url('public/user/assets/images/Espresso5.jpg')}}">
			  <p>If you are using a scale, place your cup on the scale and tare it to "zero". Begin pulling your shot and start your timer. If you're using a scale, stop your shot when the scale reads 36 grams (or double the amount of dry coffee used), and stop your timer at that time. This yield should have poured in between 35-40 seconds. If you're not using a scale or timer, stop your shot the minute the stream of coffee becomes pale and opaque instead of brown and caramel.</p>
			</div>
			</div>
	
		  </div>
		</section>

@endsection