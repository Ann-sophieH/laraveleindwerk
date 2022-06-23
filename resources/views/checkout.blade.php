@extends('layouts/index')
@section('content')
    @include('includes.form_error')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-4">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">All products</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
        @if(Session::has('address_error'))
            <div class="alert alert-danger alert-dismissible fade show fs-reg" role="alert">
                <p class="alert-danger">Sorry! This is not a valid Coupon.</p>
                <hr>
                <button type="button" class="btn-close text-lg py-3 opacity-9" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        @endif
        @if(Session::has('coupon'))
            @if(Session::has('coupon_succes'))
                <div class="alert alert-success alert-dismissible fade show fs-reg" role="alert">
                    <p class="alert-success">Discount from Coupon was succesfull</p>
                    <p>You can only Validate One Coupon per Order</p>
                    <hr>
                    <button type="button" class="btn-close text-lg py-3 opacity-9" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>

            @endif
        @else
            <section>
                <div class="row">
                    @if(Session::has('coupon_error'))
                        <div class="alert alert-danger alert-dismissible fade show fs-reg" role="alert">
                            <p class="alert-danger">Sorry! This is not a valid Coupon.</p>
                            <hr>
                            <button type="button" class="btn-close text-lg py-3 opacity-9" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif

                    <p class="">Do you have a Coupon code? Please enter your code here and get your discount!</p>
                    <form class="row mb-0" name="getcoupon" action="{{action('App\Http\Controllers\AdminCouponController@coupon')}}" method="post">
                        @csrf
                        <div class="row">
                            <div>
                                <input name="coupon" type="number" class="form-control my-2 shadow-none" placeholder="Your coupon code" aria-label="coupon" aria-describedby="basic-addon1">
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center mb-5">
                                    <button class="btn btn-outline-dark br-none mt-2 " @empty( Session::get('cart') ) disabled
                                            @endempty type="submit">
                                        Get my coupon <i class="bi bi-arrow-right"></i>
                                    </button>                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </section>
        @endif
        <h1 class=" m-2 mt-4">Checkout</h1>

        <form method="post" action="{{route('pay.order')}}">
            @csrf
            <section class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4 br-none ">

                        <div class="card-body ">
                            {{--            @if(Auth::user())   @endif--}}
                            {{--                @if(!Auth::user())--}}

                            {{--            @if(empty(Auth::user()) )--}}
                            <p class="text-center  mb-0 text-uppercase">Complete your order </p>

                        <!--            <div class="border mt-4">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->username}}" @endif type="text" name="username" id="username" class="form-control border-0 mt-2 shadow-none" required >
                    <label for="username" class="text-muted ">Username *</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->password}}" @endif name="password" type="password" id="password" class="form-control border-0 mb-2 shadow-none" required >
                    <label for="password" class="text-muted">Password *</label>
                </div>
            </div>-->
                        <!--            <div class="border mt-4">
                <div class="form-floating offset-1 col-10">
                    <input disabled @if($user  != null) value="{{$user->first_name}}" @endif type="text" name="first_name" id="first_name" class="form-control border-0 mt-2 shadow-none" required >
                    <label for="first_name" class="text-muted ">First name </label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input disabled @if($user  != null) value="{{$user->last_name}}" @endif name="last_name" type="text" id="last_name" class="form-control border-0 mb-2 shadow-none" required >
                    <label for="last_name" class="text-muted">Last name </label>
                </div>
            </div>
                <div class="border mt-4">
                    <div class="form-floating offset-1 col-10">
                        <input disabled @if($user  != null) value="{{$user->email}}" @endif type="email"  name="email" id="email" class="form-control border-0 mt-2 shadow-none @error('email') is-invalid @enderror"  required >
                        <label for="email" class="text-muted ">Email *</label>
                    </div>
                    <hr class="offset-1 col-10">
                    <div class="form-floating offset-1 col-10">
                        <input @if($user  != null) value="{{$user->telephone ? $user->telephone : ''}}" @endif name="telephone" type="text" id="telephone" class="form-control border-0 mb-2 shadow-none"  >
                        <label for="telephone" class="text-muted"> Telephone Number</label>
                    </div>
                </div>-->
                            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4 py-3">select Delivery address</h2>
                            @foreach($delivery_addresses as $delivery)
                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10 d-flex p-3">
                                        <input  name="delivery_address_id" value="{{$delivery->id}}" class="form-check-input" type="radio"
                                             id="flexRadioDefault{{$delivery->id}}">
                                        <div class="ms-1 ms-md-3">
                                            <p class="fs-li fsize-1">   {{$delivery->name_recipient}} <br>
                                                {{$delivery->addressline_1}} <br>
                                                {{$delivery->addressline_2}}</p>
                                        </div>


                                    </div>

                                </div>
                            @endforeach
                            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4"><a class="btn btn-outline-secondary"
                                                                                data-bs-toggle="collapse"
                                                                                href="#collapseDelivery" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseDelivery">
                                    <i class="bi bi-plus "></i> new delivery address </a></h2>

                            <div class="collapse" id="collapseDelivery">
                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="name_recipient" type="text" id="name_recipient"
                                               class="form-control border-0 mt-2 shadow-none">
                                        <label for="name_recipient" class="text-muted">Name recipient</label>
                                    </div>

                                </div>

                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="addressline_1" type="text" id="addressline_1"
                                               class="form-control border-0 mt-2 shadow-none">
                                        <label for="addressline_1" class="text-muted">Street and number</label>
                                    </div>
                                    <hr class="offset-1 col-10">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="addressline_2" type="text" id="addressline_2"
                                               class="form-control border-0 mb-2 shadow-none">
                                        <label for="addressline_2" class="text-muted">City and Postalcode</label>
                                    </div>
                                </div>
                            </div>
                            {{--   <div class="border mt-4 ">
                                   <div class="form-floating offset-1 col-10">
                                       <input @if($delivery_address  != null) value="{{$delivery_address->name_recipient}}" @endif name="name_recipient" type="text" id="adress" class="form-control border-0 mt-2 shadow-none"  required="" >
                                       <label for="name_recipient" class="text-muted">Name recipient*</label>
                                   </div>

                               </div>
                             <div class="border mt-4 ">
                                 <input type="hidden" name="address_type" value="1">
                               <div class="form-floating offset-1 col-10">
                                 <input @if($delivery_address  != null) value="{{$delivery_address->addressline_1}}" @endif name="addressline_1" type="text" id="addressline_1" class="form-control border-0 mt-2 shadow-none"  required="" >
                                 <label for="addressline_1" class="text-muted">Street and number*</label>
                               </div>
                               <hr class="offset-1 col-10">
                               <div class="form-floating offset-1 col-10">
                                 <input @if($delivery_address  != null) value="{{$delivery_address->addressline_2}}" @endif name="addressline_2" type="text" id="addressline_2" class="form-control border-0 mb-2 shadow-none"  required="" >
                                 <label for="addressline_2" class="text-muted">City and Postalcode*</label>
                               </div>
                             </div>--}}
                            <hr class="mt-5 mb-1">
                            <h2 class="fsize-2 m-2 mt-5 text-uppercase ps-4 py-3">select facturation address</h2>
                            <p class="fsize-1 pt-0 ps-5 text-muted pt-0"> (default is same as delivery address)</p>
                            @foreach($facturation_addresses as $facturation)
                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10 d-flex p-3">
                                        <input name="facturation_address_id" value="{{$facturation->id}}" class="form-check-input" type="radio"
                                               id="flexRadioDefault{{$delivery->id}}">
                                        <div class=" ms-1 ms-md-3">
                                            <p class="fs-li fsize-1">   {{$facturation->name_recipient}} <br>
                                                {{$facturation->addressline_1}} <br>
                                                {{$facturation->addressline_2}}</p>
                                        </div>


                                    </div>

                                </div>
                            @endforeach
                            <h2 class="fsize-1 m-2 mt-4 text-uppercase ps-4"><a class="btn btn-outline-secondary"
                                                                                data-bs-toggle="collapse"
                                                                                href="#collapseExample" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseExample">
                                    <i class="bi bi-plus "></i> new Facturation address (optional) </a></h2>

                            <div class="collapse" id="collapseExample">
                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="fname_recipient" type="text" id="fname_recipient"
                                               class="form-control border-0 mt-2 shadow-none">
                                        <label for="fname_recipient" class="text-muted">Name recipient</label>
                                    </div>

                                </div>

                                <div class="border mt-4 ">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="faddressline_1" type="text" id="faddressline_1"
                                               class="form-control border-0 mt-2 shadow-none">
                                        <label for="faddressline_1" class="text-muted">Street and number</label>
                                    </div>
                                    <hr class="offset-1 col-10">
                                    <div class="form-floating offset-1 col-10">
                                        <input name="faddressline_2" type="text" id="faddressline_2"
                                               class="form-control border-0 mb-2 shadow-none">
                                        <label for="faddressline_2" class="text-muted">City and Postalcode</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body ">
                            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4">Delivery date</h2>
                            <p class="ps-5 text-muted pt-3">Delivery takes 1 to 5 days, you can expect your package
                                by: </p>
                            <p class="mb-0 ps-5">{{$delivery_date}}</p>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4 ">Payment</h2>
                            <div class="ps-5">
                                <p class="pt-2">We accept:</p>

                                <img src="{{asset('assetsfront/images/payment_icons/bancontact@2x.png')}}"
                                     class="img-fluid " alt="bancontact">
                                <img src="{{asset('assetsfront/images/payment_icons/paypal@2x.png')}}"
                                     class="img-fluid ps-md-3" alt="paypal">
                                <img src="{{asset('assetsfront/images/payment_icons/ideal@2x.png')}}"
                                     class="img-fluid  ps-md-3" alt="ideal">
                                <img src="{{asset('assetsfront/images/payment_icons/creditcard@2x.png')}}"
                                     class="img-fluid  ps-md-3 mt-2 mt-md-1" alt="creditcard">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="text-uppercase fs-bo fsize-2 mb-4">Order Total</h3>
                            @if(Session::has('cart'))
                                @foreach($cart as $item)
                                    <article class="row">
                                        <div class="col-5 col-lg-4 mb-4 mb-lg-0">
                                            <img alt="{{$item['product_name']}}"
                                                 src="{{$item['product_image'] ? asset($item['product_image']) : 'http://via.placeholder.com/400'}}"/>
                                        </div>
                                        <div class="col-7  mb-4 mb-lg-0 fs-li">
                                            <p class="fs-reg">{{$item['product_name']}}</p>
                                            <p> @foreach($item['product_colors'] as $color)
                                                    {{$color['name']}} <br>
                                                @endforeach</p>

                                        </div>
                                        <div class="col  mb-4 mb-lg-0  ">
                                            <p class="text-center ">{{$item['quantity']}} x
                                                &#8364; {{$item['product_price']}} = <span
                                                    class="fs-bo"> &#8364;{{$item['product_price'] * $item['quantity'] }} </span>
                                            </p>
                                        </div>
                                    </article>
                                    <hr class="my-4"/>
                                @endforeach
                            @endif

                            <ul class="list-group list-group-flush ">
                                <hr>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                                    Products
                                    <span>&#8364; {{Session::get('cart') ? Session::get('cart')->totalPrice    : '0'}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
                                    Coupon
                                    <span>  @if(Session::get('coupon') ) 	&#x25; @endif {{Session::get('coupon') ? Session::get('coupon')->discount : 'No coupon'}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
                                    Shipping
                                    <span>Free</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 mt-3">
                                    <div>
                                        Total amount
                                        <p class="mb-0">(including BTW (BE)</p>
                                    </div>
                                    <span>&#8364;  {{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}}</span>
                                </li>
                            </ul>

                            @if(Session::has('cart'))
                                @if(Session::get('cart')->totalPrice == 0 )
                                   <p class="fs-li text-danger">you cannot checkout without ordering anything</p>
                                @else
                                    <button class="btn btn-outline-dark br-none  "
                                            @empty( Session::get('cart') ) disabled
                                            @endempty type="submit">
                                        Pay now <i class="bi bi-arrow-right"></i>
                                    </button>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </section>
        </form>

    </div>

    <!--Login Modal -->



    <script>
        let myModal = document.getElementById('loginModal')
        window.onload = function () {
            document.getElementById('loginModal').show()
        };

    </script>
@endsection
