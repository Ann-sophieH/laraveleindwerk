{{--
@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
--}}
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center ">
        <p class="alert alert-danger display-1">This page doesn't exist!</p>
    </div>
@stop
