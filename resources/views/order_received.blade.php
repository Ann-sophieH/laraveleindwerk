@extends('layouts/index')
@section('content')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-4 ">
        <aside aria-label="breadcrumb">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Order received</li>
            </ol>
        </aside>
    </div>



<section id="parallax2">

    <div class="container-fluid row col-lg-10 offset-lg-1 mt-3  ">

        <div class="d-lg-flex justify-content-center fs-reg">



            <article class="card bg-light p-5  col-md-8 col-lg-4 m-1 m-xl-2">
                <div class="card-body text-center br-none">

                    <i class="bi bi-cart-check-fill text-muted" style="font-size: 3rem;"></i>
                    <h1 class="fsize-5 mt-4 mb-3">Order received </h1>
                    <p class="fsize-1 text-muted mt-2">Thank you for you order! </p>
                       <p class="fsize-1 text-muted mt-2">We will start packing soon  </p>

                </div>

            </article>

        </div>


    </div>
</section>

@endsection
