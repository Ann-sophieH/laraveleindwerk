<aside class="flex-lg-shrink-0 col-md-3 p-3 bg-white fs-reg">
    <div class=" mt-2 mb-5 ">
        <p class="fsize-1 text-uppercase">filtered products: {{$products->total()}}  <br> </p>
        <p class="text-uppercase text-muted" style="font-size: 0.65rem">  {{$products->count()}} of {{$products->total()}} shown </p>


            <h2 class="fsize-2 text-uppercase fs-bo">
                  specifications
            </h2>
            <div class="mt-3 mb-2 ">
                <div class=" mp-none p-2">
                    <ul class="list-unstyled ps-0">
                        @foreach($specs as $spec)
                            <li class="mb-1">
                                <button aria-expanded="true" class="btn btn-toggle collapsed shadow-none spec-dropdown" data-bs-target="#filter-{{$spec->id}}" data-bs-toggle="collapse">
                                    {{$spec->name}}
                                </button>
                                <div class="collapse show " id="filter-{{$spec->id}}">
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

        <div class="mt-3 mb-2 ">
            <h2 class="fsize-2 text-uppercase fs-bo mb-4" >
                    Color
            </h2>
                <div class="mt-2 mb-2">
                        <section class="flex-wrap d-flex mb-0">

                            @foreach($colors  as $color)
                            <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                <input wire:model="colorsfilter.{{ $color->name }}" type="checkbox" id="colour_sidebar_{{$color->name}}"
                                       class="form-check-input shadow-none">
                            <label class="btn-colour form-option-label rounded-circle p-1" for="colour_sidebar_{{$color->name}}"
                                    style="background-color: {{$color->hex_value}};"  ><span class="form-option-color rounded-circle" style="background-color:  rgb(84, 81, 66);"></span></label>

                            </div>
                            @endforeach
                        </section>
                </div>
            </div>

<!--        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button aria-controls="collapseOne" aria-expanded="false" class="accordion-button shadow-none"
                        data-bs-target="#collapseOne"
                        data-bs-toggle="collapse" type="button"> Filter all products by type
                </button>
            </h2>
            <div aria-labelledby="headingOne" class="accordion-collapse collapse "
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
        </div>-->


        <div class="mt-4 mb-2 ">
            <div class="d-flex justify-content-between">
                <h2 class="fsize-2 text-uppercase mb-5 fs-bo" >
                    maximum price: <span class="ps-5"> &euro; {{$maxPrice}}</span>
                </h2>

            </div>

            <div >
                <div class=" ">
                    <div class="range-wrap position-relative" style="width: 90%">
                        <div class="range-value mx-auto mb-4 text-border" id="rangeV">

                        </div>
                        <input wire:model.debounce.500ms="maxPrice"  id="range" class="mx-auto " type="range" min="50" max="4000" value="200" step="1"  >
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-outline-secondary m-2" type="submit">
            <a href="{{route('products')}}"> Reset filters</a>
        </button>

    </div>


</aside>
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
