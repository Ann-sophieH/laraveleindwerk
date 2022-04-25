@extends('layouts.admin')

@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('product_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('product_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>
    <div class="row">
        <div class="col-11 mx-auto mt-5">
            <h3 class="mt-3 mb-0 text-center">Edit  {{$product->name}}</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This will let you change the information of product {{$product->name}} .</p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit product here:</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mx-auto justify-content-evenly">
                            <div class="col-8  mb-3">
                                <div class="form-group mt-3">
                                    <label for="name">Product name:</label>
                                    <input type="text" class="form-control border ps-2 shadow-sm" id="name" name="name" value="{{$product->name}}" placeholder="Product name...">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="details">Product description: add rich text editor!</label>
                                    <input type="text" class="form-control border ps-2 shadow-sm" id="details" name="details" value="{{$product->details}}" placeholder="Product details...">
                                </div>

                                    <!--                                    <div class="form-group col">
                                                                            <label for="color">Select your product color:</label>
                                                                            <input type="color" class="form-control" id="color" name="color" value="#ff0000"><br><br>

                                                                        </div>-->
                                    <div class="form-group mt-3">
                                        <label class="col-form-label" for="specifications[]">Product specifications </label>
                                        <button type="button" class="btn btn-success opacity-5 mt-2 ms-5 flex-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-plus"> Add new specification </i>
                                        </button>
                                        <div class="form-check " id="specifications[]"  multiple>
                                            <ul class="list-group row">
                                                @foreach($specs as $spec)
                                                    <li class="list-group-item border-0 d-flex justify-content-between p-1 mb-2 border-radius-lg bg-gray-100">

                                                        <div class="d-flex ">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{$spec->id}}" name="specifications[]"
                                                                   id="flexCheck{{$spec->id}}"   @if($product->specifications->contains($spec->id)) checked @endif>
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
                                                    <div class="collapse p-0" id="collapse-{{$spec->id}}">
                                                        <ul class="list-group flex-column sub-menu m-1 p-1 bg-gray-100">
                                                            @if(count($spec->childspecs))
                                                                @foreach($spec->childspecs as $childspecs)
                                                                    @include('includes.sub_specs_filter',['sub_specs_filter'=>$childspecs])
                                                                @endforeach
                                                            @endif

                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="form-group col-6 mt-3">
                                        <label class="col-form-label" for="category">Kind of product: </label>

                                        <div class="form-check " id="category"  multiple>
                                            @foreach($categories as $category)
                                                <input class="form-check-input" type="radio" name="category" value="{{$category->id}}" id="flexRadio{{$category->id}}"
                                                       @if($product->category_id == $category->id) checked @endif>
                                                <label class="form-check-label" for="flexRadio{{$category->id}}">
                                                    {{$category->name}}
                                                </label>


                                            @endforeach
                                        </div>


                                    </div>

                                <div class="row justify-content-between mt-5">
                                    <div class="form-group col ">
                                        <label class="col-form-label" for="colors[]">Product colors (CRTL + CLICK multiple select)</label>
                                        <button type="button" class="btn btn-success opacity-5 mt-2 ms-5 flex-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-plus"> Add new color </i>
                                        </button>
                                        <select class="form-control shadow-sm " id="colors[]" name="colors[]" multiple>
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}" @if($product->colors->contains($color->id)) selected @endif>{{$color->name}}</option>
                                            @endforeach
                                        </select>


                                    </div>

                                </div>
                                <div class="form-group  mt">
                                    <label for="price">Product price:</label>
                                    <input type="number" min="1" step="any " value="{{$product->price}}" class="form-control border ps-2 shadow-sm" id="price" name="price" placeholder="Product price...">
                                </div>
                                <div class="form-group  mt-3 col">
                                    <div class="pt-3 ps-5">
                                        <label class="form-control form-label text-muted mb-0" for="photos">Product
                                            photos</label>
                                        <input name="photos[]" type="file"
                                               class="form-control border dropzone dz-clickable p-5" multiple
                                               id="photos[]">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning mt-5 opacity-8">Edit this product</button>
                            </div>
                            <div class="col-3 ">

                                <div>
                                    @if(($product->photos)->isNotEmpty())
                                        @foreach($product->photos as $photo)
                                            <div class="d-flex">
                                            <form method="post" action="{{route('photos.destroy', $photo)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn  text-danger" type="submit"><i
                                                        class="fa fa-close "></i></button>
                                            </form>
                                            <img style="height: 162px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/700x700' : asset($photo->file) }}" alt="{{$product->name}}">
                                            </div>
                                        @endforeach
                                    @else
                                        <img style="height: 170px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/700x700" alt="{{$product->name}}">

                                    @endif
                                </div>



                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new color to database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Color name:</label>
                            <input type="text" class="form-control border ps-2 shadow-sm" id="name" name="name" placeholder="Color name...">
                        </div>
                        <div class="form-group mt-5 col-6 mx-auto p-2">
                            <label for="color"><strong>Select your product color: </strong><br> tip: open the product photo and use the colorpicker</label>
                            <input type="color" class="form-control " id="color" name="color" value="#ff0000">

                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
