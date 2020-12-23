@extends('layouts.user_layouts.main')


@section('content')
<section class="equal-div inner-pages about-div">
    <div class="text-divv">
        <h2>ALOHA,</h2>
        <h5>{{__('customlang.about_us_welcome')}}</h5>
        <h2>{{__('customlang.mission_statement')}}</h2>
        <p class="slight">{{__('customlang.about_us_p1')}}  <strong>- Robb Harding, Owner</strong>.</p>
        <div><a class="button button--big" href="javascript:void(0)">Learn more</a></div>
    </div>
    <div class="img-div">
        <img src="{{asset('public/user/assets/images/brew-9.png')}}">
    </div>
</section>
<section class="equal-div about-div">
    <div class="img-div">
        <img src="{{asset('public/user/assets/images/brew-4.png')}}">
    </div>
    <div class="text-divv white-bg">
        <h2>{{__('customlang.history')}}</h2>
        <h5><strong>Aloha,</strong></h5>
        <p class="slight">{{__('customlang.about_us_p2')}}</p>

       
       


        <div><a class="button button--big"  href="#read_more">Read More</a></div>
    </div>
</section>


<section class="equal-div inner-pages about-div" style="padding-top: 0rem;" id="read_more">
    <div class="text-divv" style="width: 100%;">
         <p class="slight">{{__('customlang.about_us_p3')}}</p>
         <p class="slight">{{__('customlang.about_us_p4')}}</p>
         <p class="slight">{{__('customlang.about_us_p5')}}</p>
         <p class="slight">{{__('customlang.about_us_p6')}}</p>
         <p class="slight">{{__('customlang.about_us_p7')}}</p>
         <p class="slight">{{__('customlang.about_us_p8')}}</p>
         <p class="slight">{{__('customlang.about_us_p9')}}</p>
         <p class="slight">{{__('customlang.about_us_p10')}}</p>
        <p class="slight">Mahalo,</p>
        <p class="slight">Robb Harding</p>
    </div>
   
</section>
<section>
    <center><h2>ARTICLES IN THE PRESS</h2></center>
    
    <hr style="width: 100%; margin: auto;">
    <br><br>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <img src="{{asset('public/user/assets/images/about-us-post.jpg')}}" width="100%">
        </div>
        <div class="col-lg-6 col-md-6">
            <img src="{{asset('public/user/assets/images/about-us-2.jpg')}}" width="100%">
        </div>
    </div>
</section>




<!--      <section class="insta-div about-insta">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
          
            <div class="insta-img">
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta-img.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta2.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta3.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta4.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta5.jpg')}}">
               </div>
            </div>
            <div class="insta-img">
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta6.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta7.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta8.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta9.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta10.jpg')}}">
               </div>
            </div>
            <div class="insta-img insta-m">
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta-img.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta2.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta3.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta4.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta5.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta6.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta7.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta8.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta9.jpg')}}">
               </div>
               <div class="insta-in">
                  <img src="{{asset('public/user/assets/images/insta10.jpg')}}">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>-->
<!--      <section class="subscribe-div">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="forn-in">
               <h2>Keep in touch!</h2>
               <p>We share coffee stories, home brew tips, product launches, events and promos.</p>
               <form method="" action="" target="_blank">
                   <input type="email" name="email" placeholder="Enter your email">
                   <button class="button--full" type="button">Submit</button></form>
            </div>
         </div>
      </div>
   </div>
</section>-->
@endsection