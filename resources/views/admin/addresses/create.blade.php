@extends('layouts.admin')

@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('address_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('address_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>

    <div class="row p-0 m-0">

        <div class="col-lg-8 col-md-10 col-12 m-auto">
            <h3 class="mt-3 mb-0 text-center">Add a new address</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This allows you to add 2 types of
                addresses for <a href="{{route('users.show', $user->id)}}"> <span class="text-success"> {{$user->first_name}} {{$user->last_name}}</span></a>.</p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">address</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">


                    <div class="row mx-auto">
                        <div class="col-6  mt-4 pt-2 p-2 pb-3 mb-5 ">
                            {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminAddressesController@store'  , 'files'=>true]) !!}


                            <p class="text-sm text-center">Delivery address:
                            </p>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('name_recipient', 'Name Recipient', ['class'=>'form-label ']) !!}
                                {!! Form::text('name_recipient',null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_1', 'Street + number', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_1', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_2', 'City + postalcode', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_2',null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                                <input type="hidden" name="address_type" value="1">
                                <input type="hidden" name="user_id" value="{{$user->id}}">

                            </div>


                            <div class="form-group text-center">
                                {!! Form::submit(  ' Edit Delivery address', ['class'=>'btn bg-gradient-warning opacity-7 w-50 mx-auto mb-0  mt-5 ms-5'] ) !!}



                            </div> {!! Form::close() !!}
                        </div>
                        <div class="col-6  mt-4 pt-2 p-2 pb-3 mb-5 ">
                            {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminAddressesController@store', 'files'=>true]) !!}


                            <p class="text-sm text-center">Billing address:
                            </p>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('name_recipient', 'Name Recipient', ['class'=>'form-label ']) !!}
                                {!! Form::text('name_recipient', null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_1', 'Street + number', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_1', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_2', 'City + postalcode', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_2', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                                <input type="hidden" name="address_type" value="2">
                                <input type="hidden" name="user_id" value="{{$user->id}}">


                            </div>

                            <div class="form-group text-center">
                                {!! Form::submit('Add Billing address', ['class'=>'btn bg-gradient-warning opacity-7 w-50 mx-auto mb-0  mt-5 ms-5'] ) !!}


                            </div> {!! Form::close() !!}

                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection
