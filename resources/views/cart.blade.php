@extends('layouts/index')
@section('content')
    @include('includes.breadcrum_top')
<div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
    <h1 class=" m-2 mt-4">Shopping Cart</h1>
    <span class="badge bg-primary rounded-pill"> {{Session::get('cart') ? Session::get('cart')->totalQuantity : '0'}}</span>



    <div>
        <section class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4 br-none ">
                    <div class="card-body ">
                        <!--  item -->
                        <div  >
                            @foreach($cart as $item)
                            <article class="row" >
                                <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                                   <img src="{{$item['product_image'] ? asset( $item['product_image']) : 'http://via.placeholder.com/400'}}" alt="">
                                </div>
                                <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                                    <p>{{$item['product_name']}}</p>
                                    <p class="fs-reg">{{$item['product_name']}}</p>
                                    <p class="fs-reg">{{Str::limit($item['product_details'],30)}}</p>
                                    <p>color</p>
                                </div>
                                <div class="col-1 order-1 order-lg-2">
                                    <button class="btn" type="button">  <a href="{{route('removeItem', $item['product_id'])}}"><i class="bi bi-x-circle"  ></i></a></button>
                                </div>
                                <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                                    <form method="POST" action="{{action('App\Http\Controllers\FrontendController@updateQuantityUp')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    <a href="{{route('updateQuantityUp', $item['product_id'] )}}"><i class="bi bi-arrow-down"></i></a>
                                    </form>
                                        <input readonly class="text-center mb-4 border pt-1"  style="max-width: 60px" value="{{$item['quantity']}}" >
                                    <form method="POST" action="{{action('App\Http\Controllers\FrontendController@updateQuantityUp', $item['product_id'] )}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <button class="btn  shadow-none" type="submit"   ><i class="bi bi-arrow-up" ></i></button>

<!--
                                        <a href="{{route('updateQuantityUp', $item['product_id'] )}}"><i class="bi bi-arrow-up  "></i></a>
-->
                                    </form>
                                        <p class="text-start text-md-center fs-bo"> &euro;{{$item['product_price']}}</p>
                                    <p class="text-start text-md-center fs-bo">totaal: &euro; </p>

                                </div>

                            </article>
                            @endforeach
                            <hr class="my-4"/>
                        </div>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.12.2021 - 14.10.2022</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="text-uppercase fs-bo fsize-2 mb-3">Order Total</h2>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                                Products
                                <p>&#8364;{{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
                                Shipping
                                <p>Free</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 mt-3">
                                <div>
                                    Total amount
                                    <p class="mb-0">(including VAT)</p>
                                </div>
                                <p>&#8364;{{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}} </p>
                            </li>
                        </ul>
                        <a href="{{route('checkout')}}"><button class="btn btn-outline-dark br-none  " type="button">
                                Go to checkout
                            </button>                    </a>

                    </div>
                </div>
            </div>

        </section>
    </div>

</div>



@endsection
