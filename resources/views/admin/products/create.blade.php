@extends('layouts.admin')

@section('content')
    <div class="col-12 mt-5">
        @include('includes.form_error')
    </div>

    <div class="row p-0 m-0">
        <div class="col-lg-8 col-md-10 col-12 m-auto">
            <h3 class="mt-3 mb-0 text-center">Add a new Product</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let you add a new
                product to your site.</p>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"> product</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-10 mx-auto mb-3">
                                <div class="input-group input-group-dynamic mt-3">
                                    <label class="form-label" for="name">Product name:</label>
                                    <input class=" form-control" type="text" onfocus="focused(this)"
                                           onfocusout="defocused(this)" control-id="ControlID-2" id="name" name="name">
                                </div>

                                <div class="input-group input-group-dynamic mt-4">
                                    <label class="form-label" for="details">Product description: add rich text
                                        editor!</label>
                                    <input class=" form-control" type="text" onfocus="focused(this)"
                                           onfocusout="defocused(this)" control-id="ControlID-2" id="details"
                                           name="details">
                                </div>
                                <div class="row  d-flex mt-5">
                                    <div class="col form-group ">

<div class="d-flex">

                                    <label class="form-label form-label" for="specifications[]">Product
                                                specifications </label>
                                            <button type="button" class="btn btn-success opacity-5 mt-2 ms-5 flex-end "
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa fa-plus"> Add new specification </i>
                                            </button>
</div>
                                            <div class="form-check d-block  ps-1" id="specifications[]" multiple>
                                                <ul class="list-group row">
                                                    @foreach($specs as $spec)
                                                        <li class="list-group-item border-0 d-flex justify-content-between p-1 mb-2 border-radius-lg bg-gray-100">

                                                            <div class="d-flex ">
                                                                <input class="form-check-input" type="checkbox"
                                                                       value="{{$spec->id}}" name="specifications[]"
                                                                       id="flexCheck{{$spec->id}}">
                                                                <label class="form-check-label ps-2"
                                                                       for="flexCheck{{$spec->id}}">
                                                                    {{$spec->name}}
                                                                </label>

                                                            </div>
                                                            <div class="d-flex align-items-center text-sm">
                                                                <a class="text-xxs" data-bs-toggle="collapse"
                                                                   href="#collapse-{{$spec->id}}" aria-expanded="false"
                                                                   aria-controls="collapse-{{$spec->id}}">
                                                                    pick related specifications
                                                                    <button
                                                                        class="btn btn-link text-dark text-sm mb-0 px-0 ms-2"
                                                                        control-id="ControlID-3">
                                                                        <i class="fa fa-arrow-down text-lg position-relative me-1"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <div class="collapse" id="collapse-{{$spec->id}}">
                                                            <ul class="list-group flex-column sub-menu m-1">
                                                                @if(count($spec->childspecs))
                                                                    @foreach($spec->childspecs as $childspecs)
                                                                        @include('includes.sub_specs',['sub_specs'=>$childspecs])
                                                                    @endforeach
                                                                @endif

                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            </div>


                                    </div>
                                    <div class="form-group col ">
                                        <div class="d-flex">
                                            <label class="col-form-label form-label" for="colors[]">Product colors (CRTL
                                                + CLICK select)</label>
                                            <button type="button" class="btn btn-success opacity-5 mt-2 ms-5 flex-end"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa fa-plus"> Add new color </i>
                                            </button>
                                        </div>
                                        <div class="form-check  " id="colors[]" multiple>
                                            <ul class=" list-inline mb-0  row row-cols-4">
                                                @foreach($colors as $color)
                                                    <div class="p-2 col">
                                                 <span
                                                     class="text-secondary text-xs font-weight-bold  {{$color->name}}">
                                            {{$color->name}}      </span>
                                                        <div class="">
                                                            <label class="btn-colour form-label " for="{{$color->name}}"
                                                                   style="background-color: {{$color->hex_value}}; width: 2rem; height: 2rem;border-radius: 50%"></label>
                                                            <input name="colors[] " type="checkbox"
                                                                   id="{{$color->name}}"
                                                                   class="input-invisible shadow-primary form-control form-check-input"
                                                                   value="{{$color->id}}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6 ps-4">
                                    <label class="col  form-label" for="category">Kind of product: </label>
                                    <div class="form-check " id="category" multiple>
                                        @foreach($categories as $category)
                                            <input class="form-check-input" type="radio" name="category"
                                                   value="{{$category->id}}" id="flexRadio{{$category->id}}">
                                            <label class="form-check-label " for="flexRadio{{$category->id}}">
                                                {{$category->name}}
                                            </label>


                                        @endforeach
                                    </div>
                                </div>
                                <div class="row  mt-5">
<!--                                    <div class="form-group col ">
                                        <label class="col-form-label form-label" for="colors[]">Product colors (CRTL +
                                            CLICK multiple select)</label>
                                        <button type="button" class="btn btn-success opacity-5 mt-2 ms-5 flex-end"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-plus"> Add new color </i>
                                        </button>

                                        <select class="form-control shadow-sm " id="colors[]" name="colors[]" multiple>
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>-->


                                    <div class="row row-cols-2">
                                        <div class="form-group  mt-3 col">
                                            <div class="pt-3 ps-5">
                                                <label class="form-control form-label text-muted mb-0" for="photos">Product
                                                    photos</label>
                                                <input name="photos" type="file"
                                                       class="form-control border dropzone dz-clickable p-5" multiple
                                                       id="photos">
                                            </div>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="form-label" for="price">Product price:</label>
                                            <input type="number" min="1" step="any"
                                                   class="form-control border ps-2 " id="price" name="price"
                                                   placeholder="Product price...">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-warning mt-5 opacity-8">Add new product
                                    </button>
                                </div>

                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal COLOR CREATE -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new color to database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('colors.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Color name:</label>
                            <input type="text" class="form-control border ps-2 shadow-sm" id="name" name="name"
                                   placeholder="Color name...">
                        </div>
                        <div class="form-group mt-5 col-6 mx-auto p-2">
                            <label for="hex_value"><strong>Select your product color: </strong><br> tip: use the
                                colorpicker on the product photo </label>
                            <input type="color" class="form-control "  style="width:85%; " id="hex_value" name="hex_value" value="#ff0000">

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary opacity-8">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
