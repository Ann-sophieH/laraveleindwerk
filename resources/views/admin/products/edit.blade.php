@extends('layouts.admin')

@section('content')
    <div class="col-12 mt-5">
        @include('includes.form_error')
    </div>

    <div class="row">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit:  {{$product->name}}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mx-auto ">
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
                                        <button type="button" class="btn btn-outline-primary mt-2 ms-5 flex-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-plus"> Add new specification </i>
                                        </button>
                                        <div class="form-check " id="specifications[]"  multiple>
                                            @foreach($specifications as $spec)
                                                <input class="form-check-input" type="checkbox" value="{{$spec->id}}" name="specifications[]" id="flexCheck{{$spec->id}}"
                                                       @if($product->specifications->contains($spec->id)) checked @endif>
                                                <label class="form-check-label" for="flexCheck{{$spec->id}}">
                                                    {{$spec->name}}
                                                </label>

                                            @endforeach
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
                                        <button type="button" class="btn btn-outline-primary mt-2 ms-5 flex-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <div class="form-group ">
                                    <label for="file">Product photo:</label>
                                    <input type="file"  class="form-control border ps-2 shadow-sm" id="file" name="file" >
                                </div>
                                <button type="submit" class="btn btn-warning mt-5 opacity-8">Add new product</button>
                            </div>
                            <div class="col-3">

                                <div>
                                    <img  class=" img-fluid " src="{{$product->file ? asset($product->file) : 'http://via.placeholder.com/700x700'}}" alt="{{$product->name}}">

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
