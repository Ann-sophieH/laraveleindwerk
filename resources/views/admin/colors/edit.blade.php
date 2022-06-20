
@extends('layouts.admin')
@section('content')
    @include('includes.form_error')

    <div class="row">
        <div class="col-lg-8 col-md-10 col-12 m-auto">
            <h3 class="mt-3 mb-0 text-center">Edit color {{$color->name}}</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center"> Here you can edit this existing color.
                <br> Watch out, this will edit the color for all the products in your webshop! </p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">edit :</h6>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('colors.update', $color->id)}}" method="post" enctype="multipart/form-data" class="col-10 mx-auto mb-3">
                        @csrf
                        @method('PATCH')
                        <div class="input-group input-group-dynamic mt-5">

                            <input class="fs-5 form-control" type="text" onfocus="focused(this)"
                                   onfocusout="defocused(this)" control-id="ControlID-2" id="name" required name="name" value="{{$color->name}}">
                        </div>

                        <div class="input-group input-group-dynamic mt-4">
                            <div class="form-group mt-5 col-6 mx-auto p-2">
                                <label for="hex_value"><strong>Select your product color: </strong><br> tip: use the
                                    colorpicker on the product photo </label>
                                <input type="color" class="form-control mx-auto"  style="width:20%; " id="hex_value" name="hex_value" value="{{$color->hex_value}}">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5 opacity-8 ">Save changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

