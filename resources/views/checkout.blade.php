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
          <h2 class="fsize-2 m-2 mt-4 text-uppercase ps-4">Delivery address</h2>
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
              <label for="adresslijn2" class="text-muted">Apt, Suite, etc. (optional)</label>
            </div>
          </div>

          <div class="border mt-4">
            <div class="form-floating offset-1 col-10">
              <input type="name" id="city" class="form-control border-0 mt-2 shadow-none" placeholder="Name" required="" >
              <label for="city" class="text-muted">City</label>
            </div>
            <hr class="offset-1 col-10">
            <div class="form-floating offset-1 col-10 mb-3">
              <select class="form-select shadow-none" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Choose your province</option>
                <option value="1">West-Vlaanderen</option>
                <option value="2">Oost-Vlaanderen</option>
                <option value="3">Vlaams-Brabant</option>
                <option value="4">Waals-Brabant</option>
                <option value="5">Limburg</option>
                <option value="6">Antwerpen</option>
                <option value="7">Luxemburg</option>
                <option value="8">Luik</option>
                <option value="9">Henegouwen</option>
              </select>
              <label for="floatingSelect" class="pb-3">Works with selects</label>
            </div>
          </div>
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

          <article class="row">
            <div class="col-5 col-lg-4 mb-4 mb-lg-0">
              <img alt="cart product" src="{{asset('./assets/images/products/bo_speakers_a94.png')}}"/>
            </div>
            <div class="col-7  mb-4 mb-lg-0 fs-li">
              <p class="fs-reg">Beoplay A9 4th Gen</p>
              <p>Color: Black</p>
            </div>
            <div class="col  mb-4 mb-lg-0  ">
              <p class="text-center fs-bo"> € 2,699</p>
            </div>
          </article>
          <hr class="my-4"/>
          <article class="row">
            <div class="col-5 col-lg-4 mb-4 mb-lg-0">
              <img alt="cart product" src="{{asset('./assets/images/products/bo_speakers_shape.png')}}"/>
            </div>
            <div class="col-7  mb-4 mb-lg-0 fs-li">
              <p class="fs-reg">Beosound Shape</p>
              <p>Color: Purple heart</p>
            </div>

            <div class="col  mb-4 mb-lg-0  ">
              <p class="text-center fs-bo"> € 1,899</p>
            </div>

          </article>

          <ul class="list-group list-group-flush ">
            <hr>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
              Products
              <span>&#8364; 4,199</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
              Shipping
              <span>Free</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 mt-3">
              <div>
                Total amount
                <p class="mb-0">(including VAT)</p>
              </div>
              <span>&#8364; 4,199</span>
            </li>
          </ul>


        </div>
      </div>
    </div>
  </section>

</div>
@endsection
