<div class="container-fluid row mp-none ">


<div class="bg-gray-100 d-none d-lg-inline-block ">

        <aside class="col-10 mx-auto my-5 d-flex justify-content-start " id="filtertabs">
            @if($category == [])
            <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">
                <label for="speakerstab" class=" fsize-1 text-uppercase">
                    <img src="{{asset('assets/img/navtypes/speakers.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">
                    <div class="card-body filtercard">
                        <input wire:model="category.speakers" id="speakerstab" type="checkbox"  value="2">
                      <strong> speakers</strong>
                    </div>
                </label>

            </div>
            <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">

                <label for="generaltab" class=" fsize-1 text-uppercase">
                    <img src="{{asset('assets/img/navtypes/headphones.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">
                    <div class="card-body">
                        <input wire:model="category.headphones" id="generaltab" type="checkbox" value="1">
                       <strong> headphones</strong>
                    </div></label>
            </div>
            @endif
          @if($types->isNotEmpty())
              @foreach($category as $cat => $v)
                    <div class="card filtercard border-0 br-none me-5" style="width: 15rem;height: 13rem;">
                        <label class=" fsize-1 text-uppercase" for="{{$cat}}tab">
                            @if($v === "1")
                                <img src="{{asset('assets/img/navtypes/headphones.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">

                            @else
                                <img src="{{asset('assets/img/navtypes/speakers.png')}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;">

                            @endif
                        <div class="card-body bg-gray-400">
                            <input class="card-title fsize-1 text-uppercase" id="{{$cat}}tab" type="hidden" onclick="changeColour();"><strong> {{$cat}}</strong>
                        </div></label>
                    </div>
                    @endforeach
            @foreach($types as $type)
                <div class="filtercard card border-0 me-5 br-none" style="width: 15rem;height: 13rem;">
                    <label class=" filtercard-label fsize-1 text-uppercase" for="{{$type->name}}tab">

                        <img src="{{$type->photo ? $type->photo->file : 'http://via.placeholder.com/62x62'}}" class="card-img-top img-fluid" alt="..." style="height: 10rem;" >
                        <div class="card-body filtercard-body">
                            <input class="filtercard-input "  wire:model="type.{{$type->name}}" id="{{$type->name}}tab" type="checkbox" value="{{$type->id}}" >

                         <strong>{{$type->name}}</strong>
                        </div>
                    </label>
                </div>
            @endforeach
            @endif
        </aside>
    </div>
    @if(session('cart_message'))


        <div class="alert alert-success opacity-1 alert-dismissible text-muted mt-3 col-lg-10 offset-lg-1  fs-reg" role="alert">
            <i class="bi bi-cart-check ps-3">

            </i>
            <span class="text-sm ps-4">{{session('cart_message')}} </span>
            <button type="button" class="btn-close text-lg py-3 opacity-8" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                <span aria-hidden="true"></span>
            </button>
        </div>

    @endif
    <div class="flex-column d-md-flex flex-md-row col-lg-11 mx-auto mt-5 ">

        @include('includes.filter_accordeon')

        <div class="ms-3 mt-3 " id="productOverzicht">
            <h1 class=" fsize-3 text-uppercase mb-3"> Products found</h1>
            <div class="row row-cols-md-2 row-cols-lg-3 g-4 gy-4 fs-reg my-auto mt-2" >
                @foreach($products as $product)
                    <article class="card border-0 mb-4 ">
                        <div id="carousel{{$product->id}}Controls" class="carousel  carousel-dark slide "  data-bs-interval="false" data-bs-ride="carousel">
                            <a href="{{route('details', $product)}}" class="br-none">
                                <div class="carousel-inner ">
                                    @if(($product->photos)->isNotEmpty())
                                        @foreach($product->photos as $photo)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img alt="product" class=" card-img-top d-block w-100" src="{{asset($photo->file) }}">
                                            </div>
                                            <button class="carousel-control-prev " type="button" data-bs-target="#carousel{{$product->id}}Controls" data-bs-slide="prev">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                </svg>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$product->id}}Controls" data-bs-slide="next">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#381b52" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                </svg>
                                                <span class="visually-hidden">Next</span>
                                            </button>

                                        @endforeach
                                    @else
                                        <img class="card-img-top  img-fluid " src="http://via.placeholder.com/400x400" alt="{{$product->name}}">
                                    @endif
                                </div></a>
                            <div class="card-body row flex-wrap mt-auto">
                                <div class="product-details col-8   ">
                                    <h2 class="card-title text-uppercase fsize-2 "><strong>{{$product->name}}</strong></h2>
                                    <p class="card-text text-muted fsize-1">{{Str::limit($product->details, 40)}}</p>
                                    <p class="card-text fsize-1 "><strong>€{{$product->price}}</strong></p>
                                </div>
                                <div class="product-color-size col-4 justify-content-end "   aria-label="4 Colours">
                                    <div class=" d-flex align-items-start justify-content-end">
                                        @foreach($product->colors as $color )
                                            <div class="swatch-container swatch-color-container"
                                                 style="z-index: {{$loop->iteration}};">
                                                <em class="swatch-color" style="background-color: {{$color->hex_value}}"></em>
                                            </div>
                                        @endforeach
                                    </div>
                                <!--                                            <form wire:submit.prevent="addToCart({{ $product->id}})" action="">
                                                @csrf-->
{{--                                <!--                                            <button type="submit" href="{{route('addToCart', $product->id)}}" class="btn  pt-3 ms-5 ps-5 align-items-end ">--}}
{{--                                                <i class="bi bi-cart-plus fs-4"></i>--}}
{{--                                           </button>--}}
                                    <button  wire:click="addToCart({{$product->id}})" class="btn btn-outline-dark mt-auto text-center" ><i class="bi bi-cart-plus fs-4"></i></button>

                                </div>
                            </div>
                        </div>


                    </article>
                @endforeach


            </div>
        </div>

    </div>
    <div class="row col-3  mx-auto mt-5">
        {{$products->render()}}
    </div>

</div>
