@extends('layouts.index')
@section('content')
    @include('includes.form_error')

    @if(session('success_message'))
        <div class="container-fluid col-lg-10 offset-lg-1 mt-3 fs-reg">
        <div class="alert alert-success opacity-5 alert-dismissible " role="alert">
            <i class="bi bi-bell text-muted ps-3">

            </i>
            <span class="text-sm ps-4 text-muted">{{session('success_message')}} </span>
            <button type="button" class="btn-close text-lg py-3 opacity-9" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                <span aria-hidden="true"></span>
            </button>
        </div>
        </div>
    @endif

<div class="container-fluid">
    <div class="row">
        <div id="parallax2">
            <div class="col-10 offset-1 ">
                <div class="row card fs-reg ">
                    <h2 class="card-title text-center text-uppercase fs-li my-2 mt-5">Contact us</h2>
                    <form action="{{action('App\Http\Controllers\ContactController@store')}}" method="POST"
                          class="card-body col-10 offset-1 mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group py-2">
                            <input type="text" class="form-control shadow-none" id="name" placeholder="Enter Full Name"
                                   name="name">
                        </div>
                        <div class="form-group py-2">
                            <input   class="form-control shadow-none" id="email" placeholder="Email" name="email">
                        </div>
                        <div class="form-group py-2">
                            <textarea name="message" id="message" placeholder="Ask away! "  class="form-control shadow-none" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-dark br-none text-center text-uppercase my-2">Send email <i class="fa fa-angle-right ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @stop
