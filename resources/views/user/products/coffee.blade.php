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
                    <div><a class="header__link underline" href="{{url('/coffee')}}">Whole bean coffee</a></div>
                    <div><a class="header__link" href="{{url('/equipment')}}">Equipment</a></div></nav>
            </div>


        </div>
        <div class="row">
            @foreach($products as $product)

            <div class="col-md-4">
                <div class="pro-in">
                    <a href="{{url('/show/'.$product->id)}}">
                        <?php $getImage = explode(",", $product->image); ?>
                        <img src="{{asset('public/uploads/products/'.$getImage[0])}}">
                        <div class="content-b">
                            <h4><?php
                                if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                    echo $product->name;
                                } elseif (session()->get('locale') == 'fr') {
                                    echo $product->name_fr;
                                }
                                ?></h4></a>
                    <span class="tag">{{__('customlang.whole_beans')}}</span>

                    @php
                    $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                    $cad_price = number_format($product->price,2);
                    @endphp

                    <strong>${{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}</strong>
                    <!--                    <div class="price-b">
                                            <small class="brand"></small>
                                            
                                        </div>-->
                    <p class="slight">
                        <?php
                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                            echo $product->type;
                        } elseif (session()->get('locale') == 'fr') {
                            echo $product->type_fr;
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
</section>	

@endsection