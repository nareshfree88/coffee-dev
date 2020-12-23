@extends('layouts.user_layouts.main')


@section('content')

<section class="inner-pages product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php
                        $img = explode(",", $product->image);
                        for ($i = 0; $i < count($img); $i++) {
                            ?>
                            <li data-target="#demo" data-slide-to="<?php $i; ?>" class="<?php if ($i == 0) echo 'active'; ?>"></li>
                        <?php } ?>

                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php
                        $img = explode(",", $product->image);
//                       dd($img);
                        for ($i = 0; $i < count($img); $i++) {
                            ?>

                            <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                                <img src="{{asset('public/uploads/products/'.$img[$i])}}">
                            </div>
                        <?php } ?>

                        <!--                        <div class="carousel-item">
                                                    <img src="{{asset('user/assets/images/claudinota1.jpg')}}">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{asset('user/assets/images/claudinota2.jpg')}}">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{asset('user/assets/images/claudinota3.jpg')}}">
                                                </div>-->
                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="more-info"> 
                    <a href="{{url('/coffee')}}" class="back-shop">{{__('customlang.back_to_shop')}}</a>
                    <h2 class="heading1">
                        <?php
                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                            echo $product->name;
                        } elseif (session()->get('locale') == 'fr') {
                            echo $product->name_fr;
                        }
                        ?>
                        <small class="small--bottom">{{ $product->weight }}</small></h2>
                    <div class="medium_bottom"><p>
                            <?php
                            if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                echo $product->description;
                            } elseif (session()->get('locale') == 'fr') {
                                echo $product->description_fr;
                            }
                            ?>

                        </p></div>

                    @if (Session::has('message'))
                    <div class="opencart">{{ Session::get('message') }}</div>
                    @endif

                    <div class="quantity">
                        <form action="{{url('addItem')}}" method="post" >
                            @csrf
                            <label><small>{{__('customlang.quantity')}}</small></label>
                            <input  type="number" id="num" onchange="productQuantity()"  min="1" class="num" name="qty" required="required" value="1">
                            <input type="hidden" value="{{$product->id}}" id="product_id" name="product_id">

                            <button type="submit">{{__('customlang.add_to_cart')}}
                                @php
                                $usd_price = Session::has('curency_rate')? Session::get('curency_rate'):0;
                                $cad_price = number_format($product->price,2);
                                @endphp
                                /$<span id="price">{{$usd_price? number_format($usd_price * $cad_price,2) :$cad_price}}
</span></button>
                            </a>

                            <a class="underline" href="javascript:void(0)">{{__('customlang.save_upto')}}</a>
                        </form>
                    </div>
                    <div class="extra-info">
                        <?php
                        if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                            echo $product->long_description;
                        } elseif (session()->get('locale') == 'fr') {
                            echo $product->long_description_fr;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>


        <div class="flavour">
            <h2>Flavour profile:</h2>
            <table class="table--thick">
                <tbody>
                    <tr><th>Taste</th>
                        <td><?php
                            if (session()->get('locale') == 'en' || session()->get('locale') == null) {
                                echo $product->type;
                            } elseif (session()->get('locale') == 'fr') {
                                echo $product->type_fr;
                            }
                            ?></td>
                    </tr>
                    <tr><th>Mouthfeel</th>
                        <td>Smooth and syrupy</td>
                    </tr>
                </tbody></table>
        </div> 
    </div>	 


</section>
<script>
    $(document).ready(function () {

        var price = $('#price').html();

        $('#num').on('change', function () {
            var quantity = $('#num').val();
            var TotalCart = price * quantity;
            $('#price').html(TotalCart.toFixed(2));
        });

        var opencart = $('.opencart').text();
        if (opencart == 'open_cart') {
            $('#myModal2').modal('show');
        }
    });
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });



</script>

@endsection

