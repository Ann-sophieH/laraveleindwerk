@extends('layouts/index')


@section('content')
<!--section1: highlighted article -->
<div class="container-fluid" id="designSection">
    <div class="row col-10 offset-1 margins g-2">
        <div class="text-center mb-4">
            <p class="fs-reg text-uppercase text-muted">shop latest design speakers</p>
            <h3 class="fs-reg text-uppercase mb-3">Don't sacrifice style for sound</h3>
        </div>
        <div class="col-lg-6 mi">
            <img alt="" class="w-100 h-100" src="assets/images/desgn2.jpg">
        </div>
        <div class="col-6 col-lg-3 gy-1 fsize-1">
            <div class="mi position-relative mt-1">
                <img alt="..." class="mi img-fluid" src="assets/images/highlightpic.png">
                <div class="kader position-absolute ps-1 d-none d-md-block">
                    <p class="text-uppercase mp-none ">beosound explore</p>
                    <p class="text-muted mp-none d-none d-md-block">cradle to cradle ceritfiedr</p>
                </div>
            </div>
            <div class="mi position-relative mt-2">
                <img alt="..." class="mi img-fluid " src="assets/images/all_sapekres.jpg">
                <div class="kader position-absolute ps-1 d-none d-md-block">
                    <p class="text-uppercase mp-none">beosound explore</p>
                    <p class="text-muted mp-none d-none d-md-block">Portable  speaker</p>
                </div>
            </div>

        </div>
        <div class="col-6 col-lg-3 gy-1 fsize-1">
            <div class="mi position-relative mt-1">
                <img alt="..." class="mi img-fluid" src="assets/images/design.jpg" id="highlightfix">
                <div class="kader position-absolute ps-1 d-none d-md-block">
                    <p class="text-uppercase mp-none">beosound level</p>
                    <p class="text-muted mp-none d-none d-md-block">cradle to cradle ceritfied</p>
                </div>
            </div>
            <div class="mi position-relative mt-2 shadow">
                <img alt="..." class="mi img-fluid " src="assets/images/desgn2.jpg">
                <div class="kader position-absolute ps-1 d-none d-md-block">
                    <p class="text-uppercase mp-none">beosound explore</p>
                    <p class="text-muted mp-none d-none d-md-block">Portable  speaker</p>
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
                <a class="fs-li underlined text-muted" href="">Shop Now</a>
            </div>
        </div>
    </div>
</section>
<!--end parallax -->

<!--highlighted items -->
<div class="container-fluid">
    <div class="row col-10 offset-1 mt-5 mb-5 g-2">
        <div class="col-md-6 fs-reg mt-5 mb-4">
            <p class="text-uppercase text-muted">On the go</p>
            <h3 class="text-uppercase mb-3">Our most portable items </h3>
        </div>
        <div class="col-md-6 text-end ">
            <a href="overzicht.html" class="text-muted">view more headphones</a>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class=" col-10 offset-1 g-3 ">
            <div class="carousel-inner">
                <div class="carousel-item active g-2">
                    <div class=" row row-cols-lg-3">
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class="img-fluid " src="assets/images/GG_3.jpg">
                            <div class=" kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class=" img-fluid " src="assets/images/headphonegrye.jpg">
                            <div class="kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class=" img-fluid " src="assets/images/GG_4.jpg">
                            <div class="kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item g-2">
                    <div class=" row row-cols-lg-3 ">
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class="mi img-fluid " src="assets/images/GG_3.jpg">
                            <div class=" kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class="mi img-fluid " src="assets/images/headphonegrye.jpg">
                            <div class="kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                        <div class=" mi position-relative mt-2 col-lg-4">
                            <img alt="..." class="mi img-fluid " src="assets/images/headphonegrye.jpg">
                            <div class="kader position-absolute m-1 ps-2 ">
                                <p class="text-uppercase mp-none">beosound explore</p>
                                <p class="text-muted mp-none">Portable durable speaker</p>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</div>
<!-- end highlighted items -->
@endsection
