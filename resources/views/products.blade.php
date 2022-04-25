@extends('layouts/index')
@section('content')

    <div class="container-fluid row mp-none ">
        {{--    filtercards home product page--}}

        <div class="bg-gray-100">
            <aside class="col-10 mx-auto my-5 d-flex justify-content-start ">
                <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">
                    <a class="" href="{{route('products')}}">
                        <img src="{{asset('assetsfront/images/highlightpic.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">
                        <div class="card-body">
                            <p class="card-title fsize-1 text-uppercase"><strong>All Products</strong></p>
                        </div> </a>
                </div>
                <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">
                    <a class="" href="{{route('speakers')}}">
                        <img src="{{asset('assetsfront/images/highlightpic.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">
                        <div class="card-body">
                            <p class="card-title fsize-1 text-uppercase"><strong> speakers</strong></p>
                        </div> </a>
                </div>
                <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">
                    <a class="" href="{{route('headphones')}}">
                        <img src="{{asset('assetsfront/images/highlightpic.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">
                        <div class="card-body">
                            <p class="card-title fsize-1 text-uppercase"><strong> headphones</strong></p>
                        </div> </a>
                </div>


            </aside>
        </div>
        <div class="flex-column d-md-flex flex-md-row col-lg-11 mx-auto mt-3">

            @include('includes.filter_accordeon')

            <div class="ms-3 mt-3 " id="productOverzicht">
                <h1 class=" fsize-3 text-uppercase mb-3">All Products</h1>
                <div class="row row-cols-md-2 row-cols-lg-3 g-4 gy-4 fs-reg my-auto mt-2" >
                    @foreach($products as $product)
                        <article class="card border-0 mb-4 "> <a href="{{route('details', $product->id)}}" class="br-none">
                                <div id="carouselExampleControls" class="carousel  carousel-dark slide "  data-bs-interval="false" data-bs-ride="carousel">
                                    <div class="carousel-inner ">
                                        @if(($product->photos)->isNotEmpty())
                                            @foreach($product->photos as $photo)
                                                <div class="carousel-item @if ($loop->first) active @endif">
                                                    <img alt="product" class=" card-img-top d-block w-100" src="{{asset($photo->file) }}">
                                                </div>
                                                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                    </svg>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                    </svg>
                                                    <span class="visually-hidden">Next</span>
                                                </button>

                                            @endforeach
                                        @else
                                            <img class="card-img-top  img-fluid " src="http://via.placeholder.com/400x400" alt="{{$product->name}}">
                                        @endif
                                    </div>
                                    <div class="card-body row flex-wrap mt-auto">
                                        <div class="product-details col-8   ">
                                            <h2 class="card-title text-uppercase fsize-2 "><strong>{{$product->name}}</strong></h2>
                                            <p class="card-text text-muted fsize-1">{{Str::limit($product->details, 40)}}</p>
                                            <p class="card-text fsize-1 "><strong>€{{$product->price}}</strong></p>

                                        </div>

                                        <div class="product-color-size col-4  d-flex align-items-end justify-content-end"   aria-label="4 Colours">
                                            @foreach($product->colors as $color )
                                                <div class="swatch-container swatch-color-container"
                                                     style="z-index: {{$loop->iteration}};">
                                                    <em class="swatch-color" style="background-color: {{$color->hex_value}}"></em>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </article>
                    @endforeach


                </div>
            </div>

        </div>
        <div class="row col-3  mx-auto mt-5">
            {{$products->render()}}
        </div>

    </div>
    <script>
        const
            range = document.getElementById('range'),
            rangeV = document.getElementById('rangeV'),
            setValue = ()=>{
                const
                    newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
                    newPosition = 10 - (newValue * 0.2);
                rangeV.innerHTML = `<span>${range.value}</span>`;
                rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
            };
        document.addEventListener("DOMContentLoaded", setValue);
        range.addEventListener('input', setValue);

    </script>
@endsection
