<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="Ann-Sophie" name="author">
    <meta content="Webshop eindwerk" name="description">
    <meta content="Bang&Olufsen, speaker, headphone, sound, earphones" name="keywords">
    <title>Bang & Olufsen eindwerk</title>
    <link rel="icon" type="image/png" href="{{asset('./assetsfront/images/logo.png')}}">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <link crossorigin="anonymous" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css')}}"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('assetsfront/css/style.css')}}" rel="stylesheet">
    @livewireStyles

</head>
<body>
<!--navbar-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid col-10 offset-1 d-flex justify-content-between">
            <a class="navbar-brand" href="{{url('/')}}"><img alt="logo"  src="{{asset('./assetsfront/images/logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <a aria-current="page" class="nav-link active text-uppercase" href="{{url('/')}}">Home</a>
                    <a class="nav-link text-uppercase" href="{{route('products')}}">  Products</a>
<!--                    <a class="nav-link text-uppercase" href="{{route('products')}}">Speakers</a>
                    <a class="nav-link text-uppercase" href="{{route('products')}}"> headphones </a>-->


                    <a class="nav-link text-uppercase" href="{{route('contact')}}">Contact</a>
                    <a class="nav-link text-uppercase" href="{{route('blog')}}">Blog</a>
                </div>
                <div class="nav-item dropdown d-flex justify-content-between">
                    @if(Route::currentRouteName() === 'products')
                    @livewire('searchbar')
                    @endif

                    @livewire('counter')
                        @if(!Auth::user())
                    <a class="nav-link"  href="{{asset('admin/')}} " ><i class="bi bi-person fa-lg text-muted" style="font-size: 1.5rem;"></i></a>
                        @else
                            @if(Auth::user()->isClient())
                            <a class="nav-link" href="{{route('users.show', Auth::user()->id)}}" ><i class="bi bi-person fa-lg text-muted" style="font-size: 1.5rem;"></i></a>
                            @elseif(Auth::user()->isAuthor())
                                <a class="nav-link"  href="{{asset('admin/')}} " ><i class="bi bi-person fa-lg text-muted" style="font-size: 1.5rem;"></i></a>

                            @elseif(Auth::user()->isAdmin())
                                <a class="nav-link"  href="{{asset('admin/orders')}} " ><i class="bi bi-person fa-lg text-muted" style="font-size: 1.5rem;"></i></a>

                            @endif
                        @endif
                    <div class="dropdown-menu mt-0 br-none p-2 border-0" aria-labelledby="navbarDropdownMenuLink">
                        <div class="input-group mb-1">
                            <input  class="form-control fs-li text-center " type="search" placeholder="What are you looking for? ..." aria-label="Search" aria-describedby="button-addon3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon3"><i class="bi bi-search text-muted" style="font-size: 1.3rem;"></i></button>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </nav>
</header>
@include('includes.form_error')

@if(session('newsletter_message'))
<div class="container-fluid row">
    <div class="alert alert-success opacity-1 alert-dismissible text-muted mt-3 col-lg-10 offset-lg-1  fs-reg" role="alert">
        <i class="bi bi-cart-check ps-3">

        </i>
        <span class="text-sm ps-4">{{session('newsletter_message')}} </span>
        <button type="button" class="btn-close text-lg py-3 opacity-8" data-bs-dismiss="alert" aria-label="Close" >
            <span aria-hidden="true"></span>
        </button>
    </div>
</div>



@endif

@yield('content')

<!-- footer -->
<footer class=" bg-gray-500 pb-0 text-white  pt-5">
    <div class="container-fluid">
        <div class="row col-lg-10 offset-lg-1 justify-content-md-around fsize-1">

            <!-- menu -->
            <div class="order-1 col-md-8 col-lg-4 text-white fs-reg ">
                <div class="row mb-3">
                    <!--<div class="col-1 pe-3">
                        <ul class="list-unstyled  align-items-center  col offset-1">
                            <div class="border-white border-1">
                                <li><a href="#!" class="text-hover-facebook socialIcons "><i class="bi bi-facebook text-white"></i></a></li>
                            </div>
                            <li><a href="#!" class="text-hover-instagram socialIcons"><i class="bi bi-instagram text-white"></i></a></li>
                            <li><a href="#!" class="text-hover-twitter socialIcons"><i class="bi bi-twitter text-white"></i></a></li>
                        </ul>
                    </div>-->
                    <div class="col-6">
                        <p class="mb-1 text-uppercase ">Help Center</p>
                        <ul class="list-unstyled ">
                            <li class=""><a href="{{route('faq')}}" class="text-dark br-none">Shipping & Returns</a></li>
                            <li class="menu-list-item"><a href="{{route('faq')}}" class="text-dark br-none">Payment</a></li>
                            <li class=""><a href="{{route('contact')}}" class="text-dark br-none">Contact</a></li>

                        </ul>
                    </div>
                    <div class="col-6 ">
                        <p class="mb-1 text-uppercase ">Follow us </p>

                        <ul class="list-unstyled d-flex justify-content-between  pt-3 ">

                            <li><a href="https://www.facebook.com/" class="text-hover-facebook socialIcons "><i class="bi bi-facebook text-white"></i></a></li>

                            <li><a href="https://www.instagram.com/" class="text-hover-instagram socialIcons"><i class="bi bi-instagram text-white"></i></a></li>
                            <li><a href="https://twitter.com/?lang=nl" class="text-hover-twitter socialIcons"><i class="bi bi-twitter text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row order-2 order-md-3 order-lg-2 col-md-8 col-lg-4 text-white fs-reg ">
                <p class=" mb-1 text-uppercase ">Subscribe to our Newsletter and get 20% off!</p>
                <form method="POST" enctype="multipart/form-data" action="{{route('newsletter')}}">
                    @csrf
                    <div class="input-group mb-2 border-2 border-white br-none ">
                        <input id="email" type="email" class="form-control shadow-none " name="email" placeholder="Your email" aria-label="Your email" aria-describedby="button-addon2">
                        <button class="btn border-white text-white pt-2 pb-2 shadow-none" type="submit" id="button-addon2">Subscribe</button>
                    </div>
                </form>


            </div>
            <div class="order-3 order-md-2 order-lg-3 col-md-4 col-lg-3  text-white fs-reg">
                <p class=" mb-1 text-uppercase ">Payment methods</p>
                <ul class="list-unstyled d-flex mt-2 justify-content-between pt-3 ">
                    <li>
                        <img src="{{asset('assetsfront/images/payment_icons/bancontact@2x.png')}}" class="img-fluid" alt="bancontact"></li>
                    <li><img src="{{asset('assetsfront/images/payment_icons/paypal@2x.png')}}" class="img-fluid" alt="paypal"></li>
                    <li><img src="{{asset('assetsfront/images/payment_icons/ideal@2x.png')}}" class="img-fluid" alt="ideal"></li>
                    <li><img src="{{asset('assetsfront/images/payment_icons/creditcard@2x.png')}}" class="img-fluid" alt="creditcard"></li>

                </ul>
            </div>
        </div>
    </div>

    <div class="mt-5 py-2 bg-gray-800">
        <div class="container-fluid ">
            <div class="row align-items-center g-1">
                <div class="col-md-8">
                    <p class="small text-muted ps-3">© 2022 BANG & OLUFSEN eindwerk. Bootstrap template by <a href="" class="text-muted ">Ann-sophie</a>.</p>
                </div>
                <div class="col-md-4 text-md-right text-muted">
                    <ul class="list-unstyled d-flex justify-content-between">
                        <li>
                            <a class="small  text-muted" href="{{route('faq')}}">Privacy Policy</a>
                        </li>
                        <li class="pe-3">
                            <a class="small  text-muted" href="{{route('faq')}}">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->



<script crossorigin="anonymous"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assetsfront/js/script.js')}}"></script>
@livewireScripts
</body>
</html>
