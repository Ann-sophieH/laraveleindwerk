@extends('layouts.admin')

@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('post_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('post_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>




    <div class="row p-0 m-0">
        <div class="col-lg-8 col-md-10 col-12 m-auto">
            <h3 class="mt-3 mb-0 text-center">Add a new post</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let you add a new
                post to your site.</p>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"> post</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-10 mx-auto mb-3">
                                <div class="input-group input-group-dynamic mt-3">
                                    <label class="form-label" for="name">post name:</label>
                                    <input class=" form-control" type="text" onfocus="focused(this)"
                                           onfocusout="defocused(this)" control-id="ControlID-2" id="name" name="name">
                                </div>

                                <div class="input-group input-group-dynamic mt-4">
                                    <label class="form-label" for="details">post description: add rich text
                                        editor!</label>
                                    <input class=" form-control" type="text" onfocus="focused(this)"
                                           onfocusout="defocused(this)" control-id="ControlID-2" id="details"
                                           name="details">
                                </div>
                                <div class="row  d-flex mt-5">
                                    <div class="col form-group ">




                                    </div>
                                    <div class="form-group col ">

                                    </div>
                                </div>
                                <div class="form-group col-6 ps-4">
                                    <label class="col  form-label" for="category">Kind of post: </label>
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
                                    <div class=" row-cols-2">
                                        <div class="form-group  mt-3 col">
                                            <div class="pt-3 ps-5">
                                                <label class="form-control form-label text-muted mb-0" for="photos">post
                                                    photos</label>
                                                <input name="photos[]" type="file"
                                                       class="form-control border dropzone dz-clickable p-5" multiple
                                                       id="photos[]">

                                            </div>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-warning mt-5 opacity-8">Add new post
                                    </button>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
