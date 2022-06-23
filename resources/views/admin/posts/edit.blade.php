@extends('layouts.admin')

@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('product_message'))
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
    <div class="row">
        <div class="col-11 mx-auto mt-5">
            <h3 class="mt-3 mb-0 text-center">Edit  {{$post->name}}</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This will let you change the information of post {{$post->name}} .</p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit post here:</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">

                        <div class="row mx-auto justify-content-evenly">
                            <div class="col-8  mb-3">
                                <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                <div class="form-group mt-3">
                                    <label for="title">Post title:</label>
                                    <input type="text" class="form-control border ps-2 shadow-sm" id="name" name="title" value="{{$post->title}}" placeholder="post title...">
                                </div>
                                    <div class="form-group mt-4">
                                        <label for="body_short">Post body short:</label>
                                        <textarea type="text" class="form-control border ps-2 shadow-sm" id="body_short" name="body_short"  placeholder="{{$post->body_short}}">{{$post->body_short}}</textarea>
                                    </div>
                                <div class="form-group mt-4">
                                    <label for="body_long">Post body long:</label>
                                    <textarea type="text" class="form-control border ps-2 shadow-sm" id="body_long" name="body_long"  placeholder="{{$post->body_short}}">{{$post->body_long}}</textarea>
                                </div>
                                    <div class="form-group mt-4">
                                        <label for="blockquote">Post blockquote (optional) :</label>
                                        <input type="text" class="form-control border ps-2 shadow-sm" id="blockquote" name="blockquote" value="{{$post->blockquote}}" placeholder="post blockquote...">
                                    </div>

                                    <div class="form-group mt-3">

                                    </div>
                                    <div class="form-group col-6 mt-3">
                                        <label class="col-form-label" for="category">Kind of post: </label>

                                        <div class="form-check " id="category"  >
                                            @foreach($categories as $category)
                                                <input class="form-check-input" type="radio" name="category" value="{{$category->id}}" id="flexRadio{{$category->id}}"
                                                       @if($post->category_id == $category->id) checked @endif>
                                                <label class="form-check-label" for="flexRadio{{$category->id}}">
                                                    {{$category->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                <div class="row justify-content-between mt-5">


                                </div>
                                <div class="form-group  ">
                                    <label class="col-form-label" for="sticky">Post highlighted at top?: </label>
                                    <div class="form-check " id="sticky"  >
                                            <input class="form-check-input" type="radio" name="sticky" value="1" id="flexRadioYes"
                                                   >
                                            <label class="form-check-label me-5" for="flexRadioYes">
                                                yes
                                            </label>
                                        <input class="form-check-input" type="radio" name="sticky" value="0" id="flexRadioNo"
                                                >
                                        <label class="form-check-label" for="flexRadioNo">
                                            no
                                        </label>
                                    </div>
                                      </div>
                                <div class="form-group  mt-3 col">
                                    <div class="pt-3 ps-5">
                                        <label class="form-control form-label text-muted mb-0" for="photos">post
                                            photos</label>
                                        <input name="photos[]" type="file"
                                               class="form-control border dropzone dz-clickable p-5" multiple
                                               id="photos[]">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning mt-5 opacity-8">Edit this post</button>
                                </form>
                            </div>
                            <div class="col-3 ">

                                <div>
                                    @if(($post->photos)->isNotEmpty())
                                        @foreach($post->photos as $photo)
                                            <div class="d-flex">
                                            <form method="post" action="{{route('photos.destroy', $photo)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn  text-danger" type="submit"><i
                                                        class="fa fa-close "></i></button>
                                            </form>
                                            <img style="height: 162px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/700x700' : asset($photo->file) }}" alt="{{$post->name}}">
                                            </div>
                                        @endforeach
                                    @else
                                        <img style="height: 170px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/700x700" alt="{{$post->name}}">

                                    @endif
                                </div>



                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>



@endsection
