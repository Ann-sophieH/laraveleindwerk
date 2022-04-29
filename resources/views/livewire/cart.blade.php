<section class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
            <div class="card mb-4 br-none ">
                <div class="card-body ">
                    @if(Session::has('cart'))
                    <!--  item -->
                    <div  >

                        @foreach($cart as $item)
                            @if($item['quantity'] <= 0)
                                <p class="text-center p-5 m-2"> Nothing to see here... <br><a href="{{route('products')}}" class="">Browse products  </a> <i class="bi bi-arrow-right"></i> </p>
                           @else()
                        <article class="row" >
                            <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                                <img src="{{$item['product_image']?asset($item['product_image']):'http://via.placeholder.com/400'}}" alt="">
                            </div>
                            <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                                <p >{{$item['product_name']}}</p>
                                <p class="fs-reg">{{Str::limit($item['product_details'],30)}}</p>
                                <p>black</p>
                            </div>
                            <div class="col-1 order-1 order-lg-2">
                                <button class="btn" type="button"><i class="bi bi-x-circle" wire:click="removeItem({{$item['product_id']}})" ></i></button>
                            </div>
                            <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                                <button class="btn  shadow-none" type="button"   wire:click="quantDown({{$item['product_id']}},'{{$item['quantity']}}' )" ><i class="bi bi-arrow-down"></i></button>
                                <input  readonly class="text-center mb-4 border pt-1 "  style="max-width: 60px" value="{{$item['quantity']}}" >
                                <button class="btn  shadow-none" type="button" wire:click="quantUp({{$item['product_id']}} , '{{$item['quantity']}}' )"><i class="bi bi-arrow-up  "></i></button>
                                <p class="text-start text-md-center fs-bo">Item price € {{$item['product_price']}} </p>
                                <p class="text-start text-md-center fs-bo">total: € {{Session::get('cart') ? Session::get('cart')->extraProdsPrice : '0'}}</p>

                            </div>

                        </article>
                        <hr class="my-4"/>
                            @endif
                            @endforeach
                    </div>
                 @else( )

                    <div>
                        <p class="p-2">
                            this cart has no items yet! <a href="{{route('products')}}">shop now </a>
                        </p>
                    </div>


                        @endif


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
                    <span class="badge bg-primary rounded-pill"> {{Session::get('cart') ? Session::get('cart')->totalQuantity : '0'}}</span>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                            Products
                            <p>&#8364;  {{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}}</p>
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
                            <p>&#8364; {{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}}</p>
                        </li>
                    </ul>
                    <a href="{{route('checkout')}}"><button class="btn btn-outline-dark br-none  " type="button">
                            Go to checkout
                        </button>                    </a>

                </div>
            </div>
        </div>


</section>
