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
            <h3 class="mt-3 mb-0 text-center">Edit addresses of {{$address->users()->first()->username}}</h3>
            <p class="lead font-weight-normal opacity-8 mb-7 text-center">This allows you to edit the 2 types of
                addresses for <a href="{{route('users.show', $address->users()->first()->id)}}"> <span class="text-success"> {{$address->users()->first()->first_name}} {{$address->users()->first()->last_name}}</span></a>.</p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">


                    <div class="row">
                        <div class="col-10 mx-auto  mt-4 pt-2 p-2 pb-3 mb-5 ">


                            {!! Form::open(['method'=>'patch', 'action'=>['App\Http\Controllers\AdminAddressesController@update', $address->id]  , 'files'=>true]) !!}


                            <p class="text-sm text-center">{{$address_type->address_type}} address:
                            </p>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::text('name_recipient', $address->name_recipient, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::text('addressline_1',  $address->addressline_1,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::text('addressline_2', $address->addressline_2, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                                <input type="hidden" name="address_type" value="1">

                            </div>


                            <div class="form-group text-center">
                                {!! Form::submit(  ' Edit address', ['class'=>'btn bg-gradient-warning opacity-7 w-25 mx-auto mb-0  mt-5 ms-5'] ) !!}



                            </div>
                            {!! Form::close() !!}

                        </div>

                    </div>


                </div>
            </div>
        </div>
@endsection
