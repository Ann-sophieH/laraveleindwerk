@extends('layouts/index')
@section('content')

{{--    optional blog here  https://themes.getbootstrap.com/preview/?theme_id=59250--}}
{{--    https://themes.getbootstrap.com/preview/?theme_id=59250 1 post--}}
<!--
https://preview.colorlib.com/#magdesign
-->


    <section class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <h1 class="fs-1 fs-reg text-uppercase ">Blog</h1>
                </div>
                <div class="col-md-6 text-md-right ">
                    <div class="nav nav-tabs lavalamp"><div class="d-block position-absolute  ease" style="transition-duration: 0.2s; width: 102.797px; height: 44px; transform: translate(0px, 0px);"></div>
                        <a class="nav-item nav-link active shadow-none lavalamp-item" data-filter="all" style="z-index: 5; position: relative;">All articles</a>
                        <a class="nav-item nav-link lavalamp-item" data-filter="1" style="z-index: 5; position: relative;">Fashion</a>
                        <a class="nav-item nav-link lavalamp-item" data-filter="2" style="z-index: 5; position: relative;">Culture</a>
                        <a class="nav-item nav-link lavalamp-item" data-filter="3" style="z-index: 5; position: relative;">News</a>
                    </div>
                </div>
            </div>

        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>
            <!-- posts -->
            <div class="row g-2 filtr-blog imagesloaded p-0 position-relative w-100" style="  width: 100%; display: flex; flex-wrap: wrap; height: 967.531px;">
<!--
                <div class="col-12 filtr-item" data-category="1" data-sort="value" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;">
                    <div class="card card-tile">
                        <figure class="card-image equal vh-75">
                            <span class="image" style="background-image: url({{asset('assetsfront/images/parallax.jpg')}})"></span>
                        </figure>
                        <div class="card-footer p-lg-5 text-white">
                            <ul class="list list&#45;&#45;horizontal list&#45;&#45;separated text-uppercase fs-14 mb-1">
                                <li><a href="" class="underline">News</a></li>
                                <li><time datetime="2019-08-24 20:00" class="text-muted">24th Aug, 2019</time></li>
                            </ul>
                            <h2 class="card-title text-uppercase mb-2">Summer 2019 Release</h2>
                            <a href="" class="btn btn-outline-white">Read More</a>
                        </div>
                    </div>
                </div>
--><div class="col-lg-4">
        <div class="post-entry d-block small-post-entry-v">
            <div class="thumbnail">
                <a href="single.html">
                    <img src="images/ximg_4.jpg.pagespeed.ic.2DwdgZu3vw.webp" alt="Image" class="img-fluid" data-pagespeed-url-hash="3740298349" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </a>
            </div>
            <div class="content">
                <div class="post-meta mb-1">
                    <a href="#" class="category">Business</a>, <a href="#" class="category">Travel</a> —
                    <span class="date">July 2, 2020</span>
                </div>
                <h2 class="heading mb-3"><a href="#">Your most unhappy customers are your greatest source of learning.</a></h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <a href="#" class="post-author d-flex align-items-center">
                    <div class="author-pic">
                        <img src="images/xperson_1.jpg.pagespeed.ic.Zebptmx_f8.webp" alt="Image" data-pagespeed-url-hash="1813383360" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                    <div class="text">
                        <strong>Sergy Campbell</strong>
                        <span>CEO and Founder</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

                <div class="col-md-6 filtr-item" data-category="2,3" data-sort="value" style="opacity: 1; transform: scale(1) translate3d(0px, 279.5px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;">
                    <div class="card card-post">
                        <a href="" class="card-img-top">
                            <img src="assets/images/demo/image-1.jpg" alt="Image">
                        </a>
                        <div class="card-body">
                            <ul class="list list--horizontal list--separated text-uppercase fs-14">
                                <li><a href="" class="underline">News</a></li>
                                <li><time datetime="2019-08-24 20:00" class="text-muted">24th Aug, 2019</time></li>
                            </ul>
                            <h2 class="card-title fs-20"><a href="">Get ready for tennis</a></h2>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 filtr-item" data-category="1,2" data-sort="value" style="opacity: 1; transform: scale(1) translate3d(580px, 279.5px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;">
                    <div class="card card-post">
                        <a href="" class="card-img-top">
                            <img src="assets/images/demo/image-3.jpg" alt="Image">
                        </a>
                        <div class="card-body">
                            <ul class="list list--horizontal list--separated text-uppercase fs-14">
                                <li><a href="" class="underline">News</a></li>
                                <li><time datetime="2019-08-24 20:00" class="text-muted">24th Aug, 2019</time></li>
                            </ul>
                            <h2 class="card-title fs-20"><a href="">New summer look is here</a></h2>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pagination -->
            <div class="row">
                <div class="col">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#!">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item"><a class="page-link" href="#!">4</a></li>
                            <li class="page-item"><a class="page-link" href="#!">5</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
    </section>

@endsection
