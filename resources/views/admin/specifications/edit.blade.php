
@extends('layouts.admin')
@section('content')
    @include('includes.form_error')
    <div class="row">
        <div class="col-lg-8 col-md-10 col-12 m-auto">
            <h3 class="mt-3 mb-0 text-center">Edit specification {{$specification->name}}</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center"> Here you can edit this existing specification.
                <br> Watch out, this will edit the specification for all the products in your webshop! </p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">edit :</h6>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('specifications.update', $specification->id)}}" method="post" enctype="multipart/form-data" class="col-10 mx-auto mb-3">
                        @csrf
                        @method('PATCH')
                        <div class="input-group input-group-dynamic mt-5">
                            <input class="fs-5 form-control" type="text" onfocus="focused(this)" required
                                   onfocusout="defocused(this)" control-id="ControlID-2" id="name" name="name" value="{{$specification->name}}">
                        </div>



                        <button type="submit" class="btn btn-primary mt-5 opacity-8 ">Save changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

