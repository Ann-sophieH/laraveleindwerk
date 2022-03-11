<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="Ann-Sophie" name="author">
    <meta content="Webshop eindwerk" name="description">
    <meta content="Bang&Olufsen, speaker, headphone, sound, earphones" name="keywords">
    <title>Bang & Olufsen eindwerk</title>
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="nouislider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<!--navbar-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid col-10 offset-1 d-flex justify-content-between">
            <a class="navbar-brand" href="index.html"><img alt="logo"  src="assets/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <a aria-current="page" class="nav-link active text-uppercase" href="index.html">Home</a>
                    <a class="nav-link text-uppercase" href="overzicht.html">Products</a>
                    <a class="nav-link text-uppercase" href="contact.html">Contact</a>
                    <a class="nav-link text-uppercase" href="#">Blog</a>
                </div>
                <div class="nav-item dropdown d-flex justify-content-between">
                    <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-search text-muted" style="font-size: 1.3rem;"></i>
                    </a>
                    <a class="nav-link" href="cart.html"><i class="bi bi-bag fa-lg text-muted" style="font-size: 1.5rem;"></i></a>
                    <a class="nav-link" href="{{asset('admin/')}}"><i class="bi bi-person fa-lg text-muted" style="font-size: 1.5rem;"></i></a>

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
<!--hero -->
<h1 class="d-none">Bang&Olufsen speakers and headphones</h1>

<section class="container-fluid p-0" id="hero">
    <div class="row g-0">
        <section class="col-md-6 " id="heroleft">
            <div class="card bg-dark text-white br-none border-0 ">
                <img alt="..." class="card-img" src="assets/images/heroleftpic.jpg">
                <div class="card-img-overlay">
                    <div class="d-flex position-absolute pos-hero w-90 mb-5">
                        <h2 class="card-body p-0 fs-reg pt-3">Speakers</h2>
                        <a href="overzicht.html" class="btn btn-outline-light br-none fs-li mt-3 p-3 ">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>
        <section class=" col-md-6 " id="heroright">
            <div class="card bg-dark text-white br-none border-0 position-relative ">
                <img alt="..." class="card-img" src="assets/images/GG_4.jpg">
                <div class="card-img-overlay">
                    <div class="d-flex position-absolute pos-hero w-90 mb-5">
                        <h2 class="card-body p-0 fs-reg pt-3">Headphones</h2>
                        <a href="overzicht.html" class="btn btn-outline-light br-none fs-li mt-3 p-3 ">SHOP NOW</a>
                    </div>
                </div>
            </div>

        </section>
    </div>
</section>


@yield('content')

<!-- footer -->
<footer class="bg-dark bg-opacity-50 pb-0 text-white mt-5 pt-5">
    <div class="container-fluid">
        <div class="row col-lg-10 offset-lg-1 justify-content-md-around fsize-1">

            <!-- menu -->
            <div class="order-1 col-md-8 col-lg-4 text-white fs-reg ">
                <div class="row g-5 mb-3">
                    <!--<div class="col-1 pe-3">
                        <ul class="list-unstyled  align-items-center  col offset-1">
                            <div class="border-white border-1">
                                <li><a href="#!" class="text-hover-facebook socialIcons "><i class="bi bi-facebook text-white"></i></a></li>
                            </div>
                            <li><a href="#!" class="text-hover-instagram socialIcons"><i class="bi bi-instagram text-white"></i></a></li>
                            <li><a href="#!" class="text-hover-twitter socialIcons"><i class="bi bi-twitter text-white"></i></a></li>
                        </ul>
                    </div>-->
                    <div class="col">
                        <p class="mb-1 text-uppercase ">Company</p>
                        <ul class=" list-unstyled">
                            <li class=""><a href="" class="text-dark br-none">Press</a></li>
                            <li class=""><a href="" class="text-dark br-none">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <p class="mb-1 text-uppercase ">Help Center</p>
                        <ul class="list-unstyled">
                            <li class=""><a href="" class="text-dark br-none">Shipping</a></li>
                            <li class="menu-list-item "><a href="" class="text-dark br-none">Returns</a></li>
                            <li class="menu-list-item"><a href="" class="text-dark br-none">Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row order-2 order-md-3 order-lg-2 col-md-8 col-lg-4 text-white fs-reg ">
                <p class=" mb-1 text-uppercase ">Subscribe to our Newsletter !</p>
                    <div class="input-group mb-2 border-2 border-white br-none pt-2">
                        <input id="email" type="email" class="form-control shadow-none " placeholder="Your email" aria-label="Your email" aria-describedby="button-addon2">
                        <button class="btn border-white text-white pt-3 pb-3 shadow-none" type="button" id="button-addon2">Subscribe</button>
                    </div>
              <ul class="list-unstyled d-flex justify-content-between mt-5">

                        <li><a href="https://www.facebook.com/" class="text-hover-facebook socialIcons "><i class="bi bi-facebook text-white"></i></a></li>

                    <li><a href="https://www.instagram.com/" class="text-hover-instagram socialIcons"><i class="bi bi-instagram text-white"></i></a></li>
                    <li><a href="https://twitter.com/?lang=nl" class="text-hover-twitter socialIcons"><i class="bi bi-twitter text-white"></i></a></li>
                </ul>
            </div>
            <div class="order-3 order-md-2 order-lg-3 col-md-4 col-lg-3  text-white fs-reg">
                <p class=" mb-1 text-uppercase ">Payment methods</p>
                <ul class="list-unstyled d-flex mt-2 justify-content-between">
                    <li><img src="assets/images/visa@2x.png" class="img-fluid" alt="Image"></li>
                    <li><img src="assets/images/paypal@2x.png" class="img-fluid" alt="Image"></li>
                    <li><img src="assets/images/mastercard@2x.png" class="img-fluid" alt="Image"></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-5 py-2 bg-dark">
        <div class="container-fluid ">
            <div class="row align-items-center g-1">
                <div class="col-md-8">
                    <p class="small text-muted ps-3">© 2022 BANG & OLUFSEN eindwerk. Bootstrap template by <a href="" class="text-muted ">Ann-sophie</a>.</p>
                </div>
                <div class="col-md-4 text-md-right text-muted">
                    <ul class="list-unstyled d-flex justify-content-between">
                        <li>
                            <a class="small  text-muted" href="#!">Privacy Policy</a>
                        </li>
                        <li class="pe-3">
                            <a class="small  text-muted" href="#!">Terms of Use</a>
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
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
