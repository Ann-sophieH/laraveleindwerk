@extends('layouts/index')
@section('content')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-4">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb fs-li">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li aria-current="page" class="breadcrumb-item active">All products</li>
    </ol>
  </nav>
</div>
<div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
  <h1 class=" m-2 mt-4">Checkout</h1>
  <section class="row d-flex justify-content-center my-4">
    <div class="col-md-8">
      <div class="card mb-4 br-none ">

        <div class="card-body ">
            @if(empty(Auth::user()) )
                <div class="border mt-4">
                    <div class="form-floating offset-1 col-10">
                        <input type="name" id="inputName1" class="form-control border-0 mt-2 shadow-none" placeholder="First Name" required="" >
                        <label for="inputName1" class="text-muted ">Email *</label>
                    </div>
                    <hr class="offset-1 col-10">
                    <div class="form-floating offset-1 col-10">
                        <input type="text" id="inputLastName" class="form-control border-0 mb-2 shadow-none" placeholder="Last Name" required="" >
                        <label for="inputLastName" class="text-muted"> Telephone Number</label>
                    </div>
                </div>
            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4">Delivery address</h2>
          <div class="border mt-4">
            <div class="form-floating offset-1 col-10">
              <input type="name" id="inputName1" class="form-control border-0 mt-2 shadow-none" placeholder="First Name" required="" >
              <label for="inputName1" class="text-muted ">First name *</label>
            </div>
            <hr class="offset-1 col-10">
            <div class="form-floating offset-1 col-10">
            <input type="text" id="inputLastName" class="form-control border-0 mb-2 shadow-none" placeholder="Last Name" required="" >
              <label for="inputLastName" class="text-muted">Last name *</label>
            </div>
          </div>

          <div class="border mt-4 ">
            <div class="form-floating offset-1 col-10">
              <input type="name" id="adress" class="form-control border-0 mt-2 shadow-none" placeholder="Name" required="" >
              <label for="adress" class="text-muted">Street and number</label>
            </div>
            <hr class="offset-1 col-10">
            <div class="form-floating offset-1 col-10">
              <input type="text" id="adresslijn2" class="form-control border-0 mb-2 shadow-none" placeholder="Last Name" required="" >
              <label for="adresslijn2" class="text-muted">City and Postalcode</label>
            </div>
          </div>

            <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4"> <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-plus " ></i>   Facturation address (optional) </a> </h2>

            <div class="collapse" id="collapseExample">
            <div class="border mt-4">
                <div class="form-floating offset-1 col-10">
                    <input type="name" id="inputName1" class="form-control border-0 mt-2 shadow-none" placeholder="First Name" required="" >
                    <label for="inputName1" class="text-muted ">First name</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input type="text" id="inputLastName" class="form-control border-0 mb-2 shadow-none" placeholder="Last Name" required="" >
                    <label for="inputLastName" class="text-muted">Last name</label>
                </div>
            </div>

            <div class="border mt-4 ">
                <div class="form-floating offset-1 col-10">
                    <input type="name" id="adress" class="form-control border-0 mt-2 shadow-none" placeholder="Name" required="" >
                    <label for="adress" class="text-muted">Street and number</label>
                </div>
                <hr class="offset-1 col-10">
                <div class="form-floating offset-1 col-10">
                    <input type="text" id="adresslijn2" class="form-control border-0 mb-2 shadow-none" placeholder="Last Name" required="" >
                    <label for="adresslijn2" class="text-muted">City and Postalcode</label>
                </div>
            </div>
            </div>
                @endif

        </div>


      </div>
      <div class="card mb-4">
        <div class="card-body ">
          <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4">Delivery option(s)</h2>
          <p class="mb-0 ps-5">12.12.2021 - 14.10.2022</p>
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
              <p class="text-center fs-bo">{{$item['quantity']}} x &#8364; {{$item['product_price']}}  </p>
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


        </div>
      </div>
    </div>
  </section>

</div>
@endsection
