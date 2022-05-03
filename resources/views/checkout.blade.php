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
                        <p class="text-center  mb-0 text-uppercase">Register new account </p>
                    <p class="text-center fsize-1"> you can also  <button type="button" class="btn p-1 shadow-none  fs-bo text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            login here</button> if you have previous orders </p>
            <div class="border mt-4">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->username}}" @endif type="text" name="username" id="username" class="form-control border-0 mt-2 shadow-none" required >
                    <label for="username" class="text-muted ">Username *</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->password}}" @endif name="password" type="password" id="password" class="form-control border-0 mb-2 shadow-none" required >
                    <label for="password" class="text-muted">Password *</label>
                </div>
            </div>
            <div class="border mt-4">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->first_name}}" @endif type="text" name="first_name" id="first_name" class="form-control border-0 mt-2 shadow-none" required >
                    <label for="first_name" class="text-muted ">First name *</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input  @if($user  != null) value="{{$user->last_name}}" @endif name="last_name" type="text" id="last_name" class="form-control border-0 mb-2 shadow-none" required >
                    <label for="last_name" class="text-muted">Last name *</label>
                </div>
            </div>
                <div class="border mt-4">
                    <div class="form-floating offset-1 col-10">
                        <input @if($user  != null) value="{{$user->email}}" @endif type="email"  name="email" id="email" class="form-control border-0 mt-2 shadow-none @error('email') is-invalid @enderror"  required >
                        <label for="email" class="text-muted ">Email *</label>
                    </div>
                    <hr class="offset-1 col-10">
                    <div class="form-floating offset-1 col-10">
                        <input @if($user  != null) value="{{$user->telephone ? $user->telephone : ''}}" @endif name="telephone" type="text" id="telephone" class="form-control border-0 mb-2 shadow-none"  >
                        <label for="telephone" class="text-muted"> Telephone Number</label>
                    </div>
                </div>
            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4 py-3">Delivery address</h2>

            <div class="border mt-4 ">
                <div class="form-floating offset-1 col-10">
                    <input @if($delivery_address  != null) value="{{$delivery_address->name_recipient}}" @endif name="name_recipient" type="text" id="adress" class="form-control border-0 mt-2 shadow-none"  required="" >
                    <label for="name_recipient" class="text-muted">Name recipient</label>
                </div>

            </div>
          <div class="border mt-4 ">
              <input type="hidden" name="address_type" value="1">
            <div class="form-floating offset-1 col-10">
              <input @if($delivery_address  != null) value="{{$delivery_address->addressline_1}}" @endif name="addressline_1" type="text" id="addressline_1" class="form-control border-0 mt-2 shadow-none"  required="" >
              <label for="addressline_1" class="text-muted">Street and number</label>
            </div>
            <hr class="offset-1 col-10">
            <div class="form-floating offset-1 col-10">
              <input @if($delivery_address  != null) value="{{$delivery_address->addressline_2}}" @endif name="addressline_2" type="text" id="addressline_2" class="form-control border-0 mb-2 shadow-none"  required="" >
              <label for="addressline_2" class="text-muted">City and Postalcode</label>
            </div>
          </div>

            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4"> <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-plus " ></i>   Facturation address (optional) </a> </h2>

            <div class="collapse" id="collapseExample">
                <div class="border mt-4 ">
                    <div class="form-floating offset-1 col-10">
                        <input @if($facturation_address  != null) value="{{$facturation_address->name_recipient}}" @endif name="fname_recipient" type="text" id="fname_recipient" class="form-control border-0 mt-2 shadow-none"  >
                        <label for="fname_recipient" class="text-muted">Name recipient</label>
                    </div>

                </div>

            <div class="border mt-4 ">
                <div class="form-floating offset-1 col-10">
                    <input @if($facturation_address  != null) value="{{$facturation_address->addressline_1}}" @endif name="faddressline_1" type="text" id="faddressline_1" class="form-control border-0 mt-2 shadow-none"  >
                    <label for="faddressline_1" class="text-muted">Street and number</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input  @if($facturation_address  != null) value="{{$facturation_address->addressline_2}}" @endif name="faddressline_2" type="text" id="faddressline_2" class="form-control border-0 mb-2 shadow-none"  >
                    <label for="faddressline_2" class="text-muted">City and Postalcode</label>
                </div>
            </div>
            </div>



        </div>


      </div>
      <div class="card mb-4">
        <div class="card-body ">
          <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4">Delivery date</h2>
            <p class="ps-5 text-muted pt-3">Delivery takes 1 to 5 days, you can expect your package by: </p>
          <p class="mb-0 ps-5">{{$delivery_date}}</p>
        </div>
      </div>
      <div class="card mb-4 mb-lg-0">
        <div class="card-body">
          <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4 ">Payment</h2>
          <div class="ps-5">
            <p>We accept</p>
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                 alt="Visa" />
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                 alt="American Express" />
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                 alt="Mastercard" />
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
              <img alt="{{$item['product_name']}}" src="{{$item['product_image'] ? asset($item['product_image']) : 'http://via.placeholder.com/400'}}"/>
            </div>
            <div class="col-7  mb-4 mb-lg-0 fs-li">
              <p class="fs-reg">{{$item['product_name']}}</p>
                <p> @foreach($item['product_colors'] as $color)
                        {{$color['name']}} <br>
                    @endforeach</p>

            </div>
            <div class="col  mb-4 mb-lg-0  ">
              <p class="text-center ">{{$item['quantity']}} x &#8364; {{$item['product_price']}} =  <span class="fs-bo"> &#8364;{{$item['product_price'] * $item['quantity'] }} </span></p>
            </div>
          </article>
          <hr class="my-4"/>
            @endforeach
            @endif

            <ul class="list-group list-group-flush ">
            <hr>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
              Products
              <span>&#8364; {{Session::get('cart') ? Session::get('cart')->totalPrice : '0'}}</span>
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


            <button class="btn btn-outline-dark br-none  " @empty( Session::get('cart') ) disabled @endempty type="submit">
                Pay now <i class="bi bi-arrow-right"></i>
            </button>
        </div>
      </div>
    </div>
  </section>
    </form>
</div>

    <!-- Modal -->


                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="row justify-content-center py-5 my-5">

                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <div class=" modal-title" id="exampleModalLabel">{{ __('Login') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">

                                                <button type="submit" class="btn btn-outline-secondary col-3 mx-auto my-3"><i class="bi bi-door-open"></i>
                                                    {{ __('Login') }}
                                                </button>
                                                <div class="d-flex justify-content-evenly mt-4">
                                                    {{-- Login with GitHub --}}
                                                    <div class="  ">
                                                        <a class="btn btn-outline-warning" href="{{ url('login/github') }}"
                                                        ><i class="bi bi-github"></i> <br>
                                                            Login with GitHub
                                                        </a>
                                                    </div>
                                                    {{-- Login with google --}}
                                                    <div class="  ">
                                                        <a class="btn btn-outline-primary" href="{{ url('/login/google') }}"
                                                        >
                                                            <i class="bi bi-google"></i> <br>Login with Google
                                                        </a>
                                                    </div>
                                                </div>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link link-secondary mt-3"
                                                   href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif

                                        </div>
                                    </form>
                                </div>


                            </div>
                    </div>
                    </div> </div>

@endsection
