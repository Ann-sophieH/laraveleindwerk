@extends('layouts/index')
@section('content')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-4 ">
        <aside aria-label="breadcrumb">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Contact</li>
            </ol>
        </aside>
    </div>



<section id="parallax2">

    <div class="container-fluid row col-lg-10 offset-lg-1 mt-3  ">

        <div class="d-lg-flex justify-content-between fs-reg">

            <article class="card bg-light p-5 col-md-8 col-lg-4 m-1 m-xl-2">
                <div class="card-body text-center ">
                    <a href="tel:00323334455">
                    <i class="bi bi-telephone text-muted" style="font-size: 3rem;"></i>
                    <h2 class="fsize-5 mt-4 mb-3 ">Call us</h2>
                    <p class="fsize-2">1-888-963-8944</p>
                    <p class="fsize-1 text-muted mt-2">Monday - Friday 9am-5pm</p>
                    </a>
                </div>

            </article>

            <article class="card bg-light p-5 col-md-8 col-lg-4 m-1 m-xl-2">
                <div class="card-body text-center br-none">
                   <a {{-- href="mailto:info@test.be"--}} href="{{url('/contactformulier')}}">
                    <i class="bi bi-envelope text-muted" style="font-size: 3rem;"></i>
                    <h2 class="fsize-5 mt-4 mb-3">Email us</h2>
                    <a class="fsize-2 text-muted">Send a message</a>
                    <p class="fsize-1 text-muted mt-2">We'll reply within 24 hours</p>
                    </a>
                </div>

            </article>

            <article class="card bg-light p-5 col-md-8 col-lg-4 m-1 m-xl-2">
                <div class="card-body text-center ">
                    <a href="{{route('blog')}}">
                    <i class="bi bi-chat text-muted" style="font-size: 3rem;"></i>
                    <h2 class="fsize-5 mt-4 mb-3">Blog</h2>
                    <a class="fsize-2 text-muted">Find your answer</a>
                    <p class="fsize-1 text-muted mt-2">Find the info you need in our blog.</p>
                    </a>
                </div>

            </article>
        </div>


    </div>
</section>

@endsection
