@extends('layouts/index')
@section('content')

 @include('includes.breadcrum_top')

 @if(session('review_message'))


     <div class="alert alert-success opacity-1 alert-dismissible text-muted mt-3 col-lg-10 offset-lg-1  fs-reg" role="alert">
         <i class="bi bi-cart-check ps-3">

         </i>
         <span class="text-sm ps-4">{{session('review_message')}} </span>
         <button type="button" class="btn-close text-lg py-3 opacity-8" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
             <span aria-hidden="true"></span>
         </button>
     </div>

 @endif
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
            <div>
                <ul class="mt-5 mb-5 mp-none">
                    @foreach($product->colors as $color)
                    <li class="list-inline-item">
                        <label class="btn-colour form-option-label rounded-circle p-1" for="colour_sidebar_{{$color->name}}"
                               style="background-color: {{$color->hex_value}};"  ><span class="form-option-color rounded-circle" style="background-color:  rgb(84, 81, 66);"></span></label>


                        <input name="colour" type="checkbox" id="colour_sidebar_{{$color->name}}"
                               class="input-invisible form-control">
                    </li>
                    @endforeach


                </ul>
           </div>
            <p class="fsize-3 fs-bo"> &#8364; {{$product->price}}</p>


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
                                        <button aria-expanded="false"
                                                class="btn btn-toggle  collapsed shadow-none"
                                                data-bs-target="#specs-collapse{{$spec->id}}" data-bs-toggle="collapse">
                                            {{$spec->name}}
                                        </button>

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
                    <div aria-labelledby="headingTwo" class="accordion-collapse collapse shadow-none"
                         data-bs-parent="#accordionExample"
                         id="collapseTwo">
                        <div class="accordion-body">
                            <p> Shipping takes approximately 1 to 5 businessdays. Arrival of your package will be calculated at checkout</p>
                            <p> Returns can be made within 14 days of having the product delivered. If anything is not to your liking you can
                                email us withing 14 days of arrival.
                            </p>
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
                                        @if(($review->user->photos)->isNotEmpty())
                                            @foreach($review->user->photos as $photo)

                                                <img style="height: 54px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$review->user->username}}">
                                            @endforeach
                                        @else
                                            <img style="height: 54px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$review->user->username}}">

                                        @endif
                                        <p class="fs-li ">{{$review->user->first_name}}  {{$review->user->last_name}}
                                            <br > <span class="pt-1"><i> - {{$review->created_at->diffForHumans()}}</i>
                                            <br>
                                                <option value="{{$review->stars}}"> ({{$review->stars}}/5) @for($i=0; $i < $review->stars ; $i++)★ @endfor   </option>
                                            </span></p>

                                    </div>
                                    <p class="fs-li"> </p>


                                    <p class="fs-reg text-black">{{$review->body}}</p>
                                </li>
                                    @endif
                                @endforeach

                            </ul>
                            @if(Auth::user())
                            <a class="btn btn-outline-secondary mb-2 mt-3" data-bs-toggle="collapse" href="#collapseLeaveReview" role="button" aria-expanded="false" aria-controls="#collapseLeaveReview">
                                Leave a review  <i class="fas fa-reply" aria-hidden="true"></i>
                            </a>
                            <div class="collapse" id="collapseLeaveReview">
                                <div class="card card-body">
                                    <form action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <select class="form-select" id="stars"  name="stars" aria-label="Default select example">
                                            <option selected > Hoe vond u ons product?  </option>
                                            <option value="1">★☆☆☆☆ (1/5)</option>
                                            <option value="2">★★☆☆☆ (2/5)</option>
                                            <option value="3">★★★☆☆ (3/5)</option>
                                            <option value="4">★★★★☆ (4/5)</option>
                                            <option value="5">★★★★★ (5/5)</option>

                                        </select>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">

                                        <div class="form-group mt-2">
                                            <textarea class="form-control" name="body" id="body" cols="20" rows="10" placeholder=" Leave a review on {{$product->name}}" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-secondary mt-1" >SUBMIT <i class="fas fa-angle ml-2"></i></button>
                                    </form>
                                </div>
                            </div>
                                @else
                                <p class="text-center fsize-1 pt-2"> you can   <button type="button" class="btn p-1 shadow-none  fs-bo text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        login here</button> if you want to leave a review for {{$product->name}}  </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>





 <!--Login Modal -->


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

                             <button type="submit" class="btn btn-outline-secondary col-3 mx-auto py-2 my-3"><i
                                     class="bi bi-door-open"></i>
                                 {{ __('Login') }}
                             </button>
                             <div class="d-flex justify-content-evenly mt-4">
                                 {{-- Login with GitHub --}}
                                 <div class="  ">
                                     <a class="btn btn-outline-warning" href="{{ url('login/github') }}">
                                         <i class="bi bi-github"></i>
                                         <br>
                                         Login with GitHub
                                     </a>
                                 </div>
                                 {{-- Login with google --}}
                                 <div class="  ">
                                     <a class="btn btn-outline-primary" href="{{ url('/login/google') }}">
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
                             <a class="btn btn-link link-secondary mt-1"
                                href="{{ route('register') }}">
                                 {{ __('Are you new here? Register as a new user! ') }}
                             </a>
                         </div>
                     </form>
                 </div>


             </div>
         </div>
     </div> </div>

@endsection
