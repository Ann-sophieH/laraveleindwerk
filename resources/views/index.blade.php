@extends('layouts/index')


@section('content')
    <!--hero -->
    <h1 class="d-none">Bang&Olufsen speakers and headphones</h1>

    <section class="container-fluid p-0" id="hero">
        <div class="row g-0">
            <section class="col-md-6 " id="heroleft">
                <div class="card bg-dark text-white br-none border-0 ">
                    <div style="background-image:url( {{asset('assetsfront/images/heroleftpic.jpg')}})">
                        <img alt="..." class="card-img" src="assetsfront/images/heroleftpic.jpg">
                    </div>

                    <div class="card-img-overlay">
                        <div class="d-flex position-absolute pos-hero w-90 mb-5">
                            <h2 class="card-body p-0 fs-reg pt-3">Speakers</h2>
                            <a href="{{route('products')}}" class="btn btn-outline-light br-none fs-li mt-3 p-3 ">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class=" col-md-6 " id="heroright">
                <div class="card bg-dark text-white br-none border-0 position-relative ">
                    <img alt="..." class="card-img" src="assetsfront/images/GG_4.jpg">
                    <div class="card-img-overlay">
                        <div class="d-flex position-absolute pos-hero w-90 mb-5">
                            <h2 class="card-body p-0 fs-reg pt-3">Headphones</h2>
                            <a href="{{route('products')}}" class="btn btn-outline-light br-none fs-li mt-3 p-3 ">SHOP NOW</a>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
<!--section1: highlighted article -->
<div class="container-fluid" id="designSection">
    <div class="row col-10 offset-1 margins ">
        <div class="row">
            <div class="text-center mb-4">
                <p class="fs-reg text-uppercase text-muted">shop latest design speakers</p>
                <h3 class="fs-reg text-uppercase mb-3">Don't sacrifice style for sound</h3>
            </div>
            <div class="col-lg-6 mi p-1 ">
                <img alt="" class="w-100 h-100" src="{{asset('assetsfront/images/desgn2.jpg')}}">
            </div>
            <div class="col-6 col-lg-3 gx-2  fsize-1">
                <div class="mi position-relative mt-1 shadow">
                    <img alt="..." class="mi img-fluid" src="{{asset('assetsfront/images/highlightpic.png')}}">
                    <div class="kader position-absolute ps-1 d-none d-md-block">
                        <p class="text-uppercase mp-none ">beosound explore</p>
                        <p class="text-muted mp-none d-none d-md-block">cradle to cradle ceritfiedr</p>
                    </div>
                </div>
                <div class="mi position-relative mt-2 shadow">
                    <img alt="..." class="mi img-fluid " src="{{asset('assetsfront/images/all_sapekres.jpg')}}">
                    <div class="kader position-absolute ps-1 d-none d-md-block">
                        <p class="text-uppercase mp-none">beosound explore</p>
                        <p class="text-muted mp-none d-none d-md-block">Portable  speaker</p>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 gx-2  fsize-1">
                <div class="mi position-relative mt-1 shadow">
                    <img alt="..." class="mi img-fluid" src="{{asset('assetsfront/images/bigdesign.jpg')}}" style="height: auto" id="highlightfix">
                    <div class="kader position-absolute ps-1 d-none d-md-block">
                        <p class="text-uppercase mp-none">beosound level</p>
                        <p class="text-muted mp-none d-none d-md-block">cradle to cradle ceritfied</p>
                    </div>
                </div>
                <div class="mi position-relative mt-2 shadow">
                    <img alt="..." class="mi img-fluid " src="{{asset('assetsfront/images/desgn2.jpg')}}">
                    <div class="kader position-absolute ps-1 d-none d-md-block">
                        <p class="text-uppercase mp-none">beosound explore</p>
                        <p class="text-muted mp-none d-none d-md-block">Portable  speaker</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end section1 -->
<!--start parallax -->
<section class="parallax">
    <div class="container-fluid">
        <div class="position-relative col-lg-10 offset-lg-1">
            <div class="position-absolute p-3 w-auto bg-white fs-reg">
                <h4 class="mt-2"><span class="d-block ">Pair multiple </span>Stereos in the app</h4>
                <a class="fs-li underlined text-muted" href="{{route('products')}}">Shop Now</a>
            </div>
        </div>
    </div>
</section>
<!--end parallax -->

<!--highlighted items -->
<div class="container-fluid mb-5">
    <div class="row col-10 offset-1 mt-5 mb-5 g-2">
        <div class="col-md-6 fs-reg mt-5 mb-4">
            <p class="text-uppercase text-muted">On the go</p>
            <h3 class="text-uppercase mb-3">Our most portable items </h3>
        </div>
        <div class="col-md-6 text-end ">
            <a href="{{route('products')}}" class="text-muted">view more headphones</a>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel  row" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class=" col-10 offset-1 g-3 ">
                @foreach($carr_products->chunk(3) as $three)
                <div class="carousel-item @if ($loop->first) active @endif g-2">
                    <div class=" row row-cols-lg-3">
                        @foreach($three as $product)
                        <div class=" mi position-relative mt-2 col-lg-4">

                            @if(($product->photos)->isNotEmpty())
                                @foreach($product->photos as $photo)
                                    @if($loop->first)
                                        <img class="img-fluid" src="{{ empty($photo) ? 'http://via.placeholder.com/700' : asset($photo->file) }}" alt="{{$product->name}}">
                                    @endif
                                @endforeach
                            @else
                                <img  class="img-fluid" src="http://via.placeholder.com/700" alt="{{$product->name}}">

                            @endif
                                <a href="{{route('details', $product)}}">
                            <div class="kader position-absolute mx-auto m-1 ps-2 ">
                                <p class="text-uppercase mp-none">{{$product->name}}</p>
                                <p class="text-muted mp-none">{{$product->details}}</p>
                            </div></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                    </svg>                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>                    <span class="visually-hidden">Next</span>
                </button>


        </div>
    </div>
</div>
<!-- end highlighted items -->
@endsection
