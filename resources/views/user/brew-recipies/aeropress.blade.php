@extends('layouts.user_layouts.main')

@section('content')

<section class="inner-pages brew">
		<div class="container">
		   <div class="row">
		      <div class="col-md-6 brew-l">
			 <h1 class="text_center">Aeropress</h1>
			 <div class="r-img">
			 <img class="adiv" src="{{url('public/user/assets/images/aeropress.png')}}">
			 <img src="{{url('public/user/assets/images/brew1.jpg')}}">
			 </div>
			 <a href="#steps" class="underline brand">Scroll to the brewing steps ↓</a>
			  </div>
			   <div class="col-md-6 brew-r">
			 <h2>The Aeropress is a full-immersion brew method that produces a single cup.</h2>
			 <p>Allan Adlar, professor at Stanford and inventor of the Frisbee, claims the fame for this device. It was developed to produce a convenient single cup during a time when automatic coffeemakers were brewing 6-8 cups. This simple plastic syringe-looking device produces some of the best possible cups of coffee. We love this brewer because of its consistency, durability and versatility. If you like a shorter and more syrupy cup, try using less water and a finer grind for a shorter period of time. For a more traditional filtered coffee cup, like the one in this recipe, use coarser ground coffee and infuse for longer.</p>
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
			  
			 <div class="normal_bottom"><h2>What you’ll need</h2><table class="table--thick"><tbody><tr><td>Our whole coffee beans</td></tr><tr><td> Grinder</td></tr><tr><td> Aeropress filter</td></tr><tr><td> Tablespoon or scale</td></tr><tr><td> A kettle</td></tr><tr><td> Measuring cup or scale</td></tr><tr><td> Aeropress</td></tr><tr><td> Timer</td></tr></tbody></table></div>
			  </div>
			   <div class="col-md-4">
			<div class="normal_bottom"><h2>Available in our shop</h2><table class="table--thick"><tbody><tr><td class="td--thumbnail">
			<img src="{{url('public/user/assets/images/brew1.jpg')}}">
			</td><th class="td--left">
                            <a class="underline brand" href="#">AeroPress</a>
                        </th>
                                    </tr>
                                    <tr>
                                        <td class="td--thumbnail">
                                            <img src="{{url('public/user/assets/images/brew2.jpg')}}">
                                        </td><th class="td--left"><a class="underline brand" href="#">Coffee Filters - AeroPress (350 pk)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Pour-Over Kettle Manual - Hario (1.2L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Temperature Control Pour-Over Kettle - Bonavita (1L)</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale AWS</a></th></tr><tr><td class="td--thumbnail"><img src="{{url('public/user/assets/images/brew1.jpg')}}"></td><th class="td--left"><a class="underline brand" href="#">Coffee Scale with Timer - Hario</a></th></tr></tbody></table></div>
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
			  <p>Measure 250 ml of water and bring it to a boil.
                Measure 3.5 heaping tablespoons of whole beans and grind them to the consistency of cornmeal.</p>
			</div>
			</div>
			 <div class="col-md-6">
		      <div class="padded">
			 <h2>Step 2</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step2.jpg')}}">
			  <p>Insert two paper filters in the cap, and screw the cap to the base of the Aeropress.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 3</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step3.jpg')}}">
			  <p>Assemble your Aeropress, and rest on top of a mug or sturdy decanter. Rinse the paper filter with hot water, then discard the water from the receptacle.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 4</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step4.jpg')}}">
			  <p>Add ground coffee into the Aeropress. Start the timer counting up. Pour all of the brew water, just off boil, into the Aeropress. Make sure to coat the coffee grinds evenly with your pour.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 5</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step5.jpg')}}">
			  <p>Immediately seal the Aeropress by placing the plunger on top and submerging it a half inch. This will create suction and prevent coffee from dripping into your receptacle.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 6</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step6.jpg')}}">
			  <p>At 2:30 mins, remove the plunger and stir the crust just twice – one stroke North and one stroke South.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 7</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step7.jpg')}}">
			  <p>Replace the plunger on top of the Aeropress until the timer reaches 4:00 mins.</p>
			</div>
			</div>
			<div class="col-md-6">
		      <div class="padded">
			 <h2>Step 8</h2>
			  <img src="{{url('public/user/assets/images/aeropress-step8.jpg')}}">
			  <p>Slowly plunge until all brewed coffee has been expulsed and you feel too much resistance. It’s okay if some residual coffee remains in the Aeropress. You don’t want to force it!</p>
			</div>
			</div>
		  </div>
		  </div>
		</section>

@endsection

