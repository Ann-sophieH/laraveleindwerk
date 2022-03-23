@extends('layouts/index')
@section('content')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-4">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">All products</li>
            </ol>
        </nav>

        <div class="flex-column d-md-flex flex-md-row">
            <aside class="flex-lg-shrink-0 col-md-3 p-3 bg-white fs-reg">
                <div class="accordion mt-2 mb-5" id="accordionExample">
                    <p class="fsize-1 text-uppercase">Filters</p>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button aria-controls="collapseOne" aria-expanded="false" class="accordion-button shadow-none"
                                    data-bs-target="#collapseOne"
                                    data-bs-toggle="collapse" type="button"> Filter types of products
                            </button>
                        </h2>
                        <div aria-labelledby="headingOne" class="accordion-collapse collapse show"
                             data-bs-parent="#accordionExample"
                             id="collapseOne">
                            <div class="accordion-body mp-none p-2">
                                <ul class="list-unstyled ps-0">
                                    <li class="mb-1">
                                        <button aria-expanded="true" class="btn btn-toggle collapsed shadow-none" data-bs-target="#home-collapse" data-bs-toggle="collapse">
                                            Headphones
                                        </button>
                                        <div class="collapse show" id="home-collapse">
                                            <div class="btn-toggle-nav list-unstyled fw-normal ps-4 small">
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none " id="flexCheckOverEar" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label " for="flexCheckOverEar">
                                                        Over-ear
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="flexCheckEarphones" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="flexCheckEarphones">
                                                        earphones
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="flexCheckNoiceC" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="flexCheckNoiceC">
                                                        Noise cancelling
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="border-top my-3"></li>
                                    <li class="mb-1">
                                        <button aria-expanded="true"
                                                class="btn btn-toggle  collapsed shadow-none"
                                                data-bs-target="#dashboard-collapse" data-bs-toggle="collapse">
                                            Speakers
                                        </button>
                                        <div class="collapse show" id="dashboard-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal ps-4 small">
                                                <li class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="flexCheckportable" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="flexCheckportable">
                                                        portable
                                                    </label>
                                                </li>
                                                <li class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="flexCheckHome" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="flexCheckHome">
                                                        Home audio
                                                    </label>
                                                </li>
                                                <li class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="flexChecksets" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="flexChecksets">
                                                        Speaker sets
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button aria-controls="collapseTwo" aria-expanded="false" class="accordion-button collapsed shadow-none"
                                    data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                                Color
                            </button>
                        </h2>
                        <div aria-labelledby="headingTwo" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample"
                             id="collapseTwo">
                            <div class="accordion-body">
                                <form action="#" class="text-center mt-2">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <label class="btn-colour form-label " for="colour_sidebar_Kaki"
                                                   style="background-color: rgb(84, 81, 66);"></label>
                                            <input name="colour " type="checkbox" id="colour_sidebar_Kaki"
                                                   class="input-invisible form-control">
                                        </li>
                                        <li class="list-inline-item">
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
                                        </li>
                                        <li class="list-inline-item">
                                            <label class="btn-colour form-label" for="colour_sidebar_Black"
                                                   style="background-color: rgb(0, 0, 0);"></label>
                                            <input name="colour" type="checkbox" id="colour_sidebar_Black"
                                                   class="input-invisible form-control">
                                        </li>
                                        <li class="list-inline-item">
                                            <label class="btn-colour form-label" for="colour_sidebar_Lightbrown"
                                                   style="background-color: rgb(113, 90, 77);"></label>
                                            <input name="colour" type="checkbox" id="colour_sidebar_Lightbrown"
                                                   class="input-invisible form-control">
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button aria-controls="collapseThree" aria-expanded="false" class="accordion-button collapsed shadow-none"
                                    data-bs-target="#collapseThree" data-bs-toggle="collapse" type="button">
                                Price
                            </button>
                        </h2>
                        <div aria-labelledby="headingThree" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample"
                             id="collapseThree">
                            <div class="accordion-body">
                            </div>

                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button aria-controls="collapseFour" aria-expanded="false" class="accordion-button  collapsed shadow-none"
                                    data-bs-target="#collapseFour"
                                    data-bs-toggle="collapse" type="button"> Filter all specifications
                            </button>
                        </h2>
                        <div aria-labelledby="headingFour" class="accordion-collapse collapse "
                             data-bs-parent="#accordionExample"
                             id="collapseFour">
                            <div class="accordion-body mp-none p-2">
                                <ul class="list-unstyled ps-0">
                                    <li class="mb-1">
                                        <button aria-expanded="true" class="btn btn-toggle collapsed shadow-none" data-bs-target="#filter-collapse" data-bs-toggle="collapse">
                                            Product specifications
                                        </button>
                                        <div class="collapse show" id="filter-collapse">
                                            <div class="btn-toggle-nav list-unstyled fw-normal ps-4 small">
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none " id="wifi" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label " for="wifi">
                                                        Wifi
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="wirelessCharg" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="wirelessCharg">
                                                        Wireless charging
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="Bluethooth" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="Bluethooth">
                                                        Bluethooth
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="noiceCancelling" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="noiceCancelling">
                                                        Noice cancelling
                                                    </label>
                                                </div>
                                                <div class="form-check checkshop">
                                                    <input class="form-check-input shadow-none" id="Wearable" type="checkbox"
                                                           value="">
                                                    <label class="form-check-label" for="Wearable">
                                                        Wearable
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </li>



                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="ms-3 mt-2 " id="productOverzicht">
                <h1 class=" fsize-5 ">All products</h1>
                <div class="row row-cols-md-2 row-cols-lg-3 g-3 fs-reg ">


                    <article class="card d-inline-block border-0"> <a href="./detail.html" class="br-none">
                            <div class="position-relative card-img-top">
                                <img alt="product" class=" position-relative img-first card-img-top " src="{{asset('/assetsfront/images/products/BL20_greey_front_2.jpg')}}">

                                <img alt="product" class=" position-absolute img-second card-img-top" src="{{asset('/assetsfront/images/products/BL20_grey_chaarging_e8.jpg')}}">
                            </div>

                            <div class="card-body align-bottom ">
                                <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                                <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                            </div>

</a>
                     </article>

                    <article class="card border-0 shadow-sm"><a href="./detail.html" class="br-none">
                            <img alt="product" class="card-img-top " src="./assetsfront/images/products/BL20_ant_Hero_2.jpg">
                            <div class="card-body">
                                <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                                <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                            </div></a>
                    </article>
                    <article class="card border-0 shadow-sm"><a href="./detail.html" class="br-none">
                            <img alt="product" class="card-img-top " src="./assetsfront/images/products/BL20_greey_front_2.jpg">
                            <div class="card-body">
                                <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                                <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                            </div></a>
                    </article>
                    <article class="card border-0 shadow-sm">
                        <img alt="product" class="card-img-top " src="./assetsfront/images/products/BL20_Grey_iphone_2.jpg">
                        <div class="card-body">
                            <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                            <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                        </div>
                    </article>
                    <article class="card border-0 shadow-sm">
                        <img alt="product" class="card-img-top " src="./assetsfront/images/products/BL20_greey_front_2.jpg">
                        <div class="card-body">
                            <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                            <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                        </div>
                    </article>
                    <article class="card border-0 shadow-sm">
                        <img alt="product" class="card-img-top " src="./assetsfront/images/products/01_Hero_BeosoundLevelGoldenOak.jpg">
                        <div class="card-body ">
                            <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                            <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                        </div>
                    </article>
                    <article class="card border-0 shadow-sm">
                        <img alt="product" class="card-img-top " src="./assetsfront/images/products/BL20_ant_Hero_2.jpg">
                        <div class="card-body ">
                            <h2 class="card-title fsize-2">BEOSOUND LEVEL</h2>
                            <p class="card-text text-muted fsize-1">Portable WiFi speaker</p>
                        </div>
                    </article>
                </div>
            </div>

        </div>

        <aside aria-label="Page navigation example" class=" mt-5">
            <ul class="pagination  justify-content-center">
                <li class="page-item ">
                    <a class="page-link shadow-none " href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link shadow-none" href="#">1</a></li>
                <li class="page-item"><a class="page-link shadow-none" href="#">2</a></li>
                <li class="page-item"><a class="page-link shadow-none" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link shadow-none" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
@endsection
