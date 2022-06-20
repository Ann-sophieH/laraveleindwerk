{{--
@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
--}}
@extends('layouts.index')
@section('content')
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/uploads/1413399939678471ea070/2c0343f7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row ">
                <div class="col-lg-12 mt-5 mb-5 text-center  fs-reg">
                    <h1 class="display-1 text-bolder text-warning mt-5">Error 404</h1>
                    <h2 class="">Erm. Page not found</h2>
                    <p class="lead ">We suggest you to go to the homepage while we solve this issue.</p>
                    <button type="button" class="btn btn-outline-white mt-4"><a class="text-dark fs-3 text-decoration-underline" href="{{url('/')}}">Go to Homepage</a></button>
                </div>
            </div>
        </div>
    </div>
@stop
