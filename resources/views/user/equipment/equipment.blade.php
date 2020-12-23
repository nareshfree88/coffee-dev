@extends('layouts.user_layouts.main')



@section('content')

<section class="inner-pages">
    <div class="collection-grid">
    </div>
</section>




<section class="col-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="col-menu">
                    <div><a class="header__link" href="{{url('/all')}}">Shop All</a></div>
                    <div><a class="header__link" href="{{url('/coffee')}}">Whole bean coffee</a></div>
                    <div><a class="header__link underline" href="{{url('/equipment')}}">Equipment</a></div></nav>
            </div>


        </div>
        <div class="row">

            @if(isset($equipments))
            @foreach($equipments as $equipment)
            <div class="col-md-4">
                <div class="pro-in equip">
                    <a href="{{url('/show/'.$equipment->id)}}">
                        <img src="{{asset('public/uploads/products/'.$equipment->image)}}">
                        <div class="content-b">
                            <h4>
                                <?php
                                if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                    echo $equipment->name;
                                } elseif (session()->get('locale') == 'fr') {
                                    echo $equipment->name_fr;
                                }
                                ?></h4>
                    </a>	   
                    @php
                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                    $cad_price = number_format($equipment->price,2);
                    @endphp
                    
                    <strong>${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</strong>
                </div>
            </div>
        </div>
        @endforeach
        @endif


    </div>
</div>
</section>		





@endsection