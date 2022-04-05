@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-10 offset-1">
            <form action="{{action('App\Http\Controllers\ContactController@store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="contact-name" placeholder="Enter Full Name" name="name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="contact-email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" placeholder="Message" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
            </form>
        </div>
    </div>
    @stop
