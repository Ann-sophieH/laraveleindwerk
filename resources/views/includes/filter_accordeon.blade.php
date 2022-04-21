<aside class="flex-lg-shrink-0 col-md-3 p-3 bg-white fs-reg">
    <div class="accordion mt-2 mb-5" id="accordionExample">
        <p class="fsize-1 text-uppercase">Filter : {{$products->total()}} products <br> </p>
        <p class="text-uppercase text-muted" style="font-size: 0.65rem">  {{$products->count()}} of {{$products->total()}} shown </p>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button aria-controls="collapseFour" aria-expanded="false" class="accordion-button  collapsed shadow-none"
                        data-bs-target="#collapseFour"
                        data-bs-toggle="collapse" type="button"> Filter product specifications
                </button>
            </h2>
            <div aria-labelledby="headingFour" class="accordion-collapse collapse "
                 data-bs-parent="#accordionExample"
                 id="collapseFour">
                <div class="accordion-body mp-none p-2">
                    <ul class="list-unstyled ps-0">
                        @foreach($specs as $spec)
                            <li class="mb-1">
                                <button aria-expanded="true" class="btn btn-toggle collapsed shadow-none spec-dropdown" data-bs-target="#filter-{{$spec->id}}" data-bs-toggle="collapse">
                                    {{$spec->name}}
                                </button>
                                <div class="collapse " id="filter-{{$spec->id}}">
                                    <div class="btn-toggle-nav list-unstyled fw-normal ps-4 small">
                                        @if(count($spec->childspecs))
                                            @foreach($spec->childspecs as $childspecs)
                                                @include('includes.sub_specs_filter',['sub_specs_filter'=>$childspecs])
                                            @endforeach
                                        @endif


                                    </div>
                                </div>
                            </li>


                        @endforeach
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
            <h2 class="accordion-header" id="headingOne">
                <button aria-controls="collapseOne" aria-expanded="false" class="accordion-button shadow-none"
                        data-bs-target="#collapseOne"
                        data-bs-toggle="collapse" type="button"> Filter all products by type
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
            <h2 class="accordion-header" id="headingThree">
                <button aria-controls="collapseThree" aria-expanded="false" class="accordion-button collapsed shadow-none mb-1"
                        data-bs-target="#collapseThree" data-bs-toggle="collapse" type="button">
                    Price
                </button>
            </h2>
            <div aria-labelledby="headingThree" class="accordion-collapse collapse mt-1"
                 data-bs-parent="#accordionExample"
                 id="collapseThree">
                <div class="accordion-body ">
                    <div class="range-wrap position-relative" style="width: 90%">
                        <div class="range-value mx-auto mb-4 text-border" id="rangeV">

                        </div>
                        <input id="range" class="mx-auto " type="range" min="50" max="4000" value="200" step="1" >
                    </div>
                </div>

            </div>
        </div>

    </div>
</aside>
