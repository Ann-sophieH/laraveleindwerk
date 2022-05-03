@extends('layouts/index')
@section('content')

 @include('includes.breadcrum_top')
<section class="container-fluid">
    <article class="row col-10 offset-1 carousel slide carousel-thumbnails" id="carouselExampleIndicators" data-bs-ride="carousel">
        <div class="col-lg-7 row">
            <div class="col-lg-9 order-lg-2">
                <div class="carousel-inner">
                    @foreach($product->photos as $photo)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{asset($photo->file) }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-2 order-lg-1 pt-5 d-flex flex-lg-column g-2 " id="carouselindicators">
                @foreach($product->photos as $photo)
                    <button  data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="@if ($loop->first) active @endif bg-white " aria-current="true" aria-label="Slide 1">
                        <img src="{{asset($photo->file) }}" alt=""></button>
                @endforeach

            </div>
        </div>
        <div class="col"></div>
        <div class="col-lg-4 fs-reg fsize-1 mt-5">
            <h1 class="fsize-5">{{$product->name}}</h1>
            <p class="text-muted fs-li">{{$product->details}}</p>
            <div><form action="#" class=" mt-2">
                <ul class="mt-5 mb-5 mp-none">
                    @foreach($product->colors as $color)
                    <li class="list-inline-item">
                        <label class="btn-colour form-label " for="colour_sidebar_Kaki"
                               style="background-color: {{$color->hex_value}};"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Kaki"
                               class="input-invisible form-control">
                    </li>
                    @endforeach
               {{--     <li class="list-inline-item">
                        <label class="btn-colour form-label" for="colour_sidebar_Blue"
                               style="background-color: rgb(38, 43, 51);"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Blue"
                               class="input-invisible form-control">
                    </li>
                    <li class="list-inline-item">
                        <label class="btn-colour form-label" for="colour_sidebar_Beige"
                               style="background-color: rgb(132, 99, 71);"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Beige"
                               class="input-invisible form-control">
                    </li>
                    <li class="list-inline-item">
                        <label class="btn-colour form-label" for="colour_sidebar_Pink"
                               style="background-color: rgb(187, 144, 131);"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Pink"
                               class="input-invisible form-control">
                    </li>
                    <li class="list-inline-item">
                        <label class="btn-colour form-label" for="colour_sidebar_Bordeaux"
                               style="background-color: rgb(85, 52, 43);"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Bordeaux"
                               class="input-invisible form-control">
                    </li>
                    <li class="list-inline-item">
                        <label class="btn-colour form-label" for="colour_sidebar_Grey"
                               style="background-color: rgb(169, 169, 169);"></label>
                        <input name="colour" type="checkbox" id="colour_sidebar_Grey"
                               class="input-invisible form-control">
                    </li>--}}

                </ul>
            </form></div>
            <p class="fsize-3 fs-bo"> &#8364; {{$product->price}}</p>
<!--
            <form action="" method="post">

                <button class="btn btn-dark text-uppercase text-center pt-2 mt-2 col-lg-6 br-none" type="submit">Add to bag </button>
            </form>

            <button  wire:click="addToCart()" class="btn btn-outline-dark mt-auto text-center" ><i class="bi bi-cart-plus fs-4"></i></button>
-->
            @livewire('add-to-cart', ['product' => $product])

            <div class="accordion mt-5 mb-5 fs-reg text-muted br-none" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button aria-controls="collapseOne" aria-expanded="false" class="accordion-button"
                                data-bs-target="#collapseOne"
                                data-bs-toggle="collapse" type="button"> Specifications
                        </button>
                    </h2>
                    <div aria-labelledby="headingOne" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample"
                         id="collapseOne">
                        <div class="accordion-body  p-3">
                            <ul class="list-unstyled ps-0">
                                @foreach($specs as $spec)
                                    <li class="mb-1">
                                        <p >
                                            {{$spec->name}}
                                        </p>

                                            <ul class=" list-unstyled fw-normal ps-4 small">
                                                @if(count($spec->childspecs))
                                                    @foreach($spec->childspecs as $childspecs)
                                                        @include('includes.sub_specs',['sub_specs'=>$childspecs])
                                                    @endforeach
                                                @endif


                                            </ul>

                                    </li>


                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button aria-controls="collapseTwo" aria-expanded="false" class="accordion-button collapsed"
                                data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                            Shipping & returns
                        </button>
                    </h2>
                    <div aria-labelledby="headingTwo" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExample"
                         id="collapseTwo">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab beatae distinctio eius
                                enim ipsa nam officiis quae rerum sint voluptatibus? Consequatur perspiciatis
                                quibusdam rerum velit? Doloremque eligendi magnam nam quam.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button aria-controls="collapseThree" aria-expanded="false" class="accordion-button collapsed"
                                data-bs-target="#collapseThree" data-bs-toggle="collapse" type="button">
                            Reviews ({{$product->productreviews->where('is_active', 1) ? ($product->productreviews->where('is_active', 1)->count()) : '0'}})</button>

                    </h2>
                    <div aria-labelledby="headingThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="collapseThree">
                        <div class="accordion-body">

                            <ul class="mp-none">
                                @foreach($product->productreviews as $review)
                                    @if($review->is_active == 1)
                                <li class="list-unstyled" >
                                    <div class=" d-flex  justify-content-between">
                                        <img style="height: 70px" class="img-fluid rounded-circle" src="{{$review->user->photo ? asset($review->user->photo->file) : 'http://via.placeholder.com/70x70' }}" alt="{{$review->user->first_name}}">
                                        <p class="fs-li ">{{$review->user->first_name}}  {{$review->user->last_name}}
                                            <br > <span class="pt-1"><i> - {{$review->created_at->diffForHumans()}}</i>
                                            <br>
                                                <option value="5">★★★★★ (5/5)</option>
                                            </span></p>

                                    </div>
                                    <p class="fs-li"> </p>


                                    <p >{{$review->body}}</p>
                                </li>
                                    @endif
                                @endforeach
                               {{-- <li>
                                    <p class="fs-li">Mirko - gekocht op 12/06/2020</p>
                                    <option value="2">★★☆☆☆ (2/5)</option>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consequatur
                                        iste numquam quos soluta! Ad animi consectetur sed temporibus? Corporis, ea,
                                        optio! Animi aperiam consequuntur officiis.</p>
                                </li>--}}
                            </ul>
                            <a class="btn reply-btn mb-2" data-bs-toggle="collapse" href="#collapseLeaveReview" role="button" aria-expanded="false" aria-controls="#collapseLeaveReview">
                                Leave a review  <i class="fas fa-reply" aria-hidden="true"></i>
                            </a>
                            <div class="collapse" id="collapseLeaveReview">
                                <div class="card card-body">
                                    <form action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$product->id}}">

                                        <div class="form-group mt-2">
                                            <textarea class="form-control" name="body" id="body" cols="20" rows="10" placeholder=" Leave a review on {{$product->name}}" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-secondary mt-1">SUBMIT <i class="fas fa-angle ml-2"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection
